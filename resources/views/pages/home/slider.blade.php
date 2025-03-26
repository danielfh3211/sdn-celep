@extends('layouts.dash-layout')

@section('title', 'Manage Slider')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Slider Images</h2>
            <button onclick="openModal()"
                class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                <i class="fas fa-plus mr-2"></i>Add Image
            </button>
        </div>

        <!-- Image Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($slides as $slide)
                <div class="relative group">
                    <img src="{{ asset($slide->image) }}" alt="Slider Image" class="w-full h-48 object-cover rounded-lg">
                    <div
                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:backdrop-blur-xs rounded-lg flex items-center justify-center space-x-2">
                        <button type="button" onclick="openEditModal('{{ $slide->id }}', '{{ asset($slide->image) }}')"
                            class="text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 cursor-pointer">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </button>
                        <form action="{{ route('pages.home.slider.delete', $slide->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="text-white cursor-pointer bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 delete-button">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="uploadModal" class="fixed inset-0 backdrop-blur-xs bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg w-full max-w-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Upload New Image</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('pages.home.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Select Image (Max. 2MB)
                    </label>
                    <input type="file" name="image" accept="image/*" required id="uploadInput"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer">
                    <p class="mt-1 text-sm text-gray-500">Accepted formats: JPG, JPEG, PNG (Max size: 2MB)</p>
                    <div id="uploadError" class="hidden mt-2 bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700" id="uploadErrorText"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 cursor-pointer text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Upload Image
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 backdrop-blur-xs bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg w-full max-w-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Edit Slider Image</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <img id="currentImage" src="" alt="Current Image"
                        class="w-full h-48 object-cover rounded-lg mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Change Image (Max. 2MB)
                    </label>
                    <input type="file" name="image" accept="image/*" id="editInput"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="mt-1 text-sm text-gray-500">Accepted formats: JPG, JPEG, PNG (Max size: 2MB)</p>
                    <div id="editError" class="hidden mt-2 bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700" id="editErrorText"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 backdrop-blur-xs bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Confirm Delete</h3>
            <p class="mb-6">Are you sure you want to delete this image?</p>
            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Toast -->
    <div id="successToast"
        class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg transform translate-y-full transition-transform duration-300 hidden">
        <span id="successMessage"></span>
    </div>

    @if (session('success'))
        <div id="alert" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('uploadModal');
            const openModalBtn = document.querySelector('[onclick="openModal()"]');
            const closeModalBtn = document.querySelector('[onclick="closeModal()"]');

            window.openModal = function() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            window.closeModal = function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }

            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Auto-hide alert
            const alert = document.getElementById('alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000);
            }

            // Delete confirmation functionality
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            let currentDeleteUrl = '';

            window.confirmDelete = function(url) {
                currentDeleteUrl = url;
                deleteForm.action = url;
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
            }

            window.closeDeleteModal = function() {
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }

            // Update delete buttons to use confirmation
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.closest('form').getAttribute('action');
                    confirmDelete(url);
                });
            });

            // Success toast functionality
            const successToast = document.getElementById('successToast');
            const successMessage = document.getElementById('successMessage');

            function showToast(message) {
                successMessage.textContent = message;
                successToast.classList.remove('hidden', 'translate-y-full');
                setTimeout(() => {
                    successToast.classList.add('translate-y-full');
                }, 3000);
            }

            // Handle form submission
            const uploadForm = document.querySelector('#uploadModal form');
            uploadForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                try {
                    const formData = new FormData(this);
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        }
                    });

                    if (response.ok) {
                        closeModal();
                        showToast('Image uploaded successfully!');
                        location.reload(); // Refresh to show new image
                    } else {
                        throw new Error('Upload failed');
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });

            // Edit Modal functionality
            const editModal = document.getElementById('editModal');
            const editForm = document.getElementById('editForm');
            const currentImage = document.getElementById('currentImage');

            window.openEditModal = function(id, imageUrl) {
                currentImage.src = imageUrl;
                editForm.action = `{{ route('pages.home.slider.update', '') }}/${id}`;
                editModal.classList.remove('hidden');
                editModal.classList.add('flex');
            }

            window.closeEditModal = function() {
                editModal.classList.add('hidden');
                editModal.classList.remove('flex');
            }

            // Handle edit form submission
            editForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                try {
                    const formData = new FormData(this);
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content
                        }
                    });

                    if (response.ok) {
                        closeEditModal();
                        showToast('Image updated successfully!');
                        location.reload();
                    } else {
                        throw new Error('Update failed');
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });

            function validateImage(file, errorDiv, errorText) {
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes

                if (file.size > maxSize) {
                    const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                    errorText.textContent = `File size (${sizeMB}MB) exceeds maximum limit of 2MB`;
                    errorDiv.classList.remove('hidden');
                    return false;
                }

                if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                    errorText.textContent = 'Only JPG, JPEG, and PNG files are allowed';
                    errorDiv.classList.remove('hidden');
                    return false;
                }

                errorDiv.classList.add('hidden');
                return true;
            }

            // Add file input validation
            document.getElementById('uploadInput')?.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const errorDiv = document.getElementById('uploadError');
                    const errorText = document.getElementById('uploadErrorText');
                    if (!validateImage(file, errorDiv, errorText)) {
                        this.value = ''; // Clear the input
                    }
                }
            });

            document.getElementById('editInput')?.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const errorDiv = document.getElementById('editError');
                    const errorText = document.getElementById('editErrorText');
                    if (!validateImage(file, errorDiv, errorText)) {
                        this.value = ''; // Clear the input
                    }
                }
            });
        });
    </script>
@endpush
