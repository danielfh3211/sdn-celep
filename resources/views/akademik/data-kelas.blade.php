@extends('layouts.dash-layout')

@section('title', 'Data Kelas')

@section('content')
    @if (session('success'))
        @php
            $alertType = session('alert-type') ?? 'success'; // Default ke 'success' jika tidak ada 'alert-type'
            $alertColors = [
                'success' => 'bg-green-100 border-green-400 text-green-700',
                'danger' => 'bg-red-100 border-red-400 text-red-700',
            ];
            $alertColor = $alertColors[$alertType] ?? $alertColors['success'];
        @endphp
        <div class="{{ $alertColor }} px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                onclick="this.parentElement.style.display='none';">
                <span class="text-green-500">&times;</span>
            </button>
        </div>
    @endif

    <div class="bg-white p-4 md:p-6 rounded shadow">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4 space-y-3 md:space-y-0">
            <h1 class="text-xl md:text-2xl font-bold">Data Kelas</h1>
            <button onclick="openModal('addModal')"
                class="bg-blue-950 text-white px-3 md:px-4 py-2 rounded hover:bg-blue-900 transition duration-200 inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Kelas
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="dataTable" class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">No</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">Nama Kelas</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $index => $k)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-2 md:px-4 py-2">
                                {{ $loop->iteration + ($kelas->currentPage() - 1) * $kelas->perPage() }}
                            </td>
                            <td class="border border-gray-300 px-2 md:px-4 py-2">{{ $k->nama_kelas }}</td>
                            <td class="border border-gray-300 px-2 md:px-4 py-2 text-center">
                                <div class="flex flex-col md:flex-row justify-center items-center gap-2">
                                    <button onclick="openEditModal({{ $k->id }}, '{{ $k->nama_kelas }}')"
                                        class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition duration-200 inline-flex items-center justify-center">
                                        <i class="fas fa-edit mr-1 md:mr-2"></i> Edit
                                    </button>
                                    <form action="{{ route('akademik.delete-kelas', $k->id) }}" method="POST"
                                        class="w-full md:w-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                            class="bg-red-500 text-white px-2 md:px-3 py-1 rounded hover:bg-red-600 transition duration-200 inline-flex items-center">
                                            <i class="fas fa-trash-alt mr-1 md:mr-2"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $kelas->links('pagination::tailwind') }}
        </div>
    </div>


    <!-- Modal Tambah -->
    <div id="addModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-30 backdrop-blur-sm flex items-center justify-center hidden transition-opacity">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/3">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Kelas</h2>
            <form action="{{ route('akademik.store-kelas') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('addModal')"
                        class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">Batal</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-30 backdrop-blur-sm flex items-center justify-center hidden transition-opacity">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/3">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Kelas</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="edit_nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="edit_nama_kelas"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('editModal')"
                        class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">Batal</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            modal.classList.add('modal-enter');
            setTimeout(() => {
                modal.classList.remove('modal-enter');
                modal.classList.add('modal-enter-active');
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('modal-exit');
            setTimeout(() => {
                modal.classList.remove('modal-exit');
                modal.classList.add('hidden');
            }, 300);
        }

        function openEditModal(id, namaKelas) {
            const editForm = document.getElementById('editForm');
            const editNamaKelas = document.getElementById('edit_nama_kelas');

            editForm.action = `/akademik/data-kelas/${id}`;
            editNamaKelas.value = namaKelas;

            openModal('editModal');
        }
    </script>
@endpush
