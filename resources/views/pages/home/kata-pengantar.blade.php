@extends('layouts.dash-layout')

@section('title', 'Manage Kata Pengantar')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        {{-- Add success message display --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Kata Pengantar</h2>
            @if (!$kataPengantar)
                <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    <i class="fas fa-plus mr-2"></i>Tambah Data
                </button>
            @else
                <button onclick="editData({{ $kataPengantar->id }})"
                    class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    <i class="fas fa-edit mr-2"></i>Edit Data
                </button>
            @endif
        </div>

        {{-- Content Display --}}
        <div class="bg-gray-50 rounded-lg p-6">
            @if ($kataPengantar)
                <div class="mb-4">
                    <h3 class="font-semibold text-lg mb-2">{{ $kataPengantar->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $kataPengantar->position }}</p>
                    <div class="text-gray-700 whitespace-pre-line">{{ $kataPengantar->content }}</div>
                </div>
            @else
                <p class="text-gray-500 text-center">Belum ada data kata pengantar.</p>
            @endif
        </div>
    </div>

    {{-- Modal Form --}}
    <div id="formModal" class="fixed inset-0 backdrop-blur-xs bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold" id="modalTitle">Tambah Kata Pengantar</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 cursor-pointer">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="p-6">
                <form id="kataPengantarForm" method="POST">
                    @csrf
                    <div id="methodField"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input type="text" name="name" required
                                class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                            <input type="text" name="position" required
                                class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kata Pengantar</label>
                        <textarea name="content" rows="8" required
                            class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <div class="sticky bottom-0 bg-gray-50 -m-6 p-6 flex justify-end space-x-2">
                        <button type="button" onclick="closeModal()"
                            class="cursor-pointer px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg">
                            Batal
                        </button>
                        <button type="submit"
                            class="cursor-pointer px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal() {
            const form = document.getElementById('kataPengantarForm');
            const modalTitle = document.getElementById('modalTitle');

            form.reset();
            form.action = "{{ route('pages.home.kata-pengantar.store') }}";
            modalTitle.textContent = 'Tambah Kata Pengantar';
            document.getElementById('methodField').innerHTML = '';

            document.getElementById('formModal').classList.remove('hidden');
            document.getElementById('formModal').classList.add('flex');
        }

        function editData(id) {
            const form = document.getElementById('kataPengantarForm');
            const modalTitle = document.getElementById('modalTitle');

            fetch(`/admin/pages/home/kata-pengantar/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    form.action = `/admin/pages/home/kata-pengantar/${id}`;
                    modalTitle.textContent = 'Edit Kata Pengantar';
                    document.getElementById('methodField').innerHTML = '@method('PUT')';

                    form.querySelector('input[name="name"]').value = data.name;
                    form.querySelector('input[name="position"]').value = data.position;
                    form.querySelector('textarea[name="content"]').value = data.content;

                    document.getElementById('formModal').classList.remove('hidden');
                    document.getElementById('formModal').classList.add('flex');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading data');
                });
        }

        function closeModal() {
            document.getElementById('formModal').classList.add('hidden');
            document.getElementById('formModal').classList.remove('flex');
        }
    </script>
@endpush
