@extends('layouts.dash-layout')

@section('title', 'Manage Kepala Sekolah')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Data Kepala Sekolah</h2>
            <button onclick="editData({{ $kepsek->id ?? 0 }})"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 cursor-pointer">
                <i class="fas fa-edit mr-2"></i>Edit Data
            </button>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Motivasi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if ($kepsek)
                        <tr>
                            <td class="px-6 py-4">
                                <img src="{{ asset($kepsek->image) }}" class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">{{ $kepsek->name }}</td>
                            <td class="px-6 py-4">{{ $kepsek->position }}</td>
                            <td class="px-6 py-4">{{ Str::limit($kepsek->description, 50) }}</td>
                            <td class="px-6 py-4">{{ Str::limit($kepsek->motivation, 50) }}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">Belum ada data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Form --}}
    <div id="formModal" class="fixed inset-0 backdrop-blur-xs bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold" id="modalTitle">Edit Data Kepala Sekolah</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 cursor-pointer">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="p-6">
                <form id="kepsekForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="methodField"></div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto (Max. 2MB)</label>
                        <div id="currentImage" class="hidden mb-4">
                            <img src="" class="w-32 h-32 object-cover rounded-lg shadow" id="previewImage">
                        </div>
                        <input type="file" name="image" accept="image/*" id="imageInput"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer">
                        <p class="mt-1 text-sm text-gray-500">Format: JPG, JPEG, PNG (Maksimal 2MB)</p>
                        <div id="imageError" class="hidden mt-2 bg-red-50 border-l-4 border-red-400 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-red-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700" id="imageErrorText"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input type="text" name="name"
                                class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 focus:ring-blue-500 outline-none focus:border-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                            <input type="text" name="position"
                                class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 focus:ring-blue-500 outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="description" rows="4"
                            class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 focus:ring-blue-500 outline-none focus:border-blue-500"></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Motivasi</label>
                        <textarea name="motivation" rows="4"
                            class="w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-1 focus:ring-blue-500 outline-none focus:border-blue-500"></textarea>
                    </div>

                    <div class="sticky bottom-0 bg-gray-50 -m-6 p-6 flex justify-end space-x-2">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring-1 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function openModal() {
                document.getElementById('formModal').classList.remove('hidden');
                document.getElementById('formModal').classList.add('flex');
            }

            function closeModal() {
                document.getElementById('formModal').classList.add('hidden');
                document.getElementById('formModal').classList.remove('flex');
                document.getElementById('kepsekForm').reset();
            }

            function editData(id) {
                fetch(`/admin/pages/profil/kepsek/${id}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        openModal();

                        document.getElementById('modalTitle').textContent = 'Edit Data Kepala Sekolah';
                        document.getElementById('kepsekForm').action = `/admin/pages/profil/kepsek/${id}`;
                        document.getElementById('methodField').innerHTML = '@method('PUT')';

                        // Show current image
                        const currentImage = document.getElementById('currentImage');
                        const previewImage = document.getElementById('previewImage');
                        currentImage.classList.remove('hidden');
                        previewImage.src = data.image.startsWith('/') ? data.image : '/' + data.image;

                        // Populate form fields
                        const form = document.getElementById('kepsekForm');
                        form.querySelector('input[name="name"]').value = data.name || '';
                        form.querySelector('input[name="position"]').value = data.position || '';
                        form.querySelector('textarea[name="description"]').value = data.description || '';
                        form.querySelector('textarea[name="motivation"]').value = data.motivation || '';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error loading data');
                    });
            }

            function validateImage(file, errorDiv, errorText) {
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes

                if (file.size > maxSize) {
                    const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                    errorText.textContent = `Ukuran file (${sizeMB}MB) melebihi batas maksimal 2MB`;
                    errorDiv.classList.remove('hidden');
                    return false;
                }

                if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                    errorText.textContent = 'Format file harus JPG, JPEG, atau PNG';
                    errorDiv.classList.remove('hidden');
                    return false;
                }

                errorDiv.classList.add('hidden');
                return true;
            }

            // Add file input validation
            document.getElementById('imageInput').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const errorDiv = document.getElementById('imageError');
                    const errorText = document.getElementById('imageErrorText');
                    if (!validateImage(file, errorDiv, errorText)) {
                        this.value = ''; // Clear the input
                    } else {
                        // Preview the image
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const previewImage = document.getElementById('previewImage');
                            const currentImage = document.getElementById('currentImage');
                            previewImage.src = e.target.result;
                            currentImage.classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                    }
                }
            });

            // Add form validation before submit
            document.getElementById('kepsekForm').addEventListener('submit', function(e) {
                const fileInput = document.getElementById('imageInput');

                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    const errorDiv = document.getElementById('imageError');
                    const errorText = document.getElementById('imageErrorText');

                    if (!validateImage(file, errorDiv, errorText)) {
                        e.preventDefault();
                        fileInput.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }
            });
        </script>
    @endpush
@endsection
