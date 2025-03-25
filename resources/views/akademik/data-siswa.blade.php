@extends('layouts.dash-layout')

@section('title', 'Data Siswa')

@section('content')
    {{-- Alert Section --}}
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

    {{-- Main Section --}}
    <div class="bg-white p-6 md:p-8 rounded-lg shadow">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 space-y-3 md:space-y-0">
            <h1 class="text-2xl font-bold text-gray-800">Data Siswa</h1>
            <button onclick="openModal('addModal')"
                class="bg-blue-950 text-white px-4 py-2 rounded hover:bg-blue-900 transition duration-200 inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Siswa
            </button>
        </div>

        {{-- Tabel Data Siswa --}}
        <div class="overflow-x-auto">
            <table id="dataTable" class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">NIS</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Siswa</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Kelas</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Jenis Kelamin</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $s)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $loop->iteration + ($siswa->currentPage() - 1) * $siswa->perPage() }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $s->username }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $s->nama_siswa }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $s->nama_kelas }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $s->jenis_kelamin }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <div class="flex flex-col md:flex-row justify-center items-center gap-2">
                                    <button
                                        onclick="openEditModal({{ $s->id }}, '{{ $s->username }}', '{{ $s->nama_siswa }}', '{{ $s->nama_kelas }}', '{{ $s->jenis_kelamin }}')"
                                        class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition duration-200 inline-flex items-center justify-center">
                                        <i class="fas fa-edit mr-1 md:mr-2"></i> Edit
                                    </button>
                                    <form action="{{ route('akademik.delete-siswa', $s->id) }}" method="POST"
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

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $siswa->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="addModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-30 backdrop-blur-sm flex items-center justify-center hidden transition-opacity">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/3">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Siswa</h2>
            <form action="{{ route('akademik.store-siswa') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                    <select name="username" id="username"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="" disabled selected>Pilih NIS</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->username }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-6">
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                    <select name="nama_kelas" id="nama_kelas"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
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
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Siswa</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="edit_username" class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                    <select name="username" id="edit_username"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="" disabled>Pilih NIS</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->username }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="edit_nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="edit_nama_siswa"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-6">
                    <label for="edit_nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                    <select name="nama_kelas" id="edit_nama_kelas"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="" disabled>Pilih Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="edit_jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis
                        Kelamin</label>
                    <select name="jenis_kelamin" id="edit_jenis_kelamin"
                        class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
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
        setTimeout(function() {
            let alertBox = document.querySelector('[role="alert"]');
            if (alertBox) {
                alertBox.style.transition = 'opacity 0.5s ease, transform 0.5s ease'; // Animasi transisi
                alertBox.style.opacity = '0';
                alertBox.style.transform = 'translateY(-10px)'; // Geser sedikit ke atas

                // Setelah animasi selesai, hapus elemen dari DOM
                setTimeout(() => alertBox.remove(), 500);
            }
        }, 2000); // 2 detik sebelum mulai menghilang
    </script>

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

        function openEditModal(id, username, namaSiswa, namaKelas, jenisKelamin) {
            const editForm = document.getElementById('editForm');
            const editUsername = document.getElementById('edit_username');
            const editNamaSiswa = document.getElementById('edit_nama_siswa');
            const editNamaKelas = document.getElementById('edit_nama_kelas');
            const editJenisKelamin = document.getElementById('edit_jenis_kelamin');

            // Set form action URL
            editForm.action = `/akademik/data-siswa/${id}`;

            // Set values for the fields
            editNamaSiswa.value = namaSiswa;

            // Set selected value for Username dropdown
            let usernameFound = false;
            Array.from(editUsername.options).forEach(option => {
                if (option.value === username) {
                    option.selected = true;
                    usernameFound = true;
                } else {
                    option.selected = false;
                }
            });

            // Jika username tidak ditemukan di dropdown, tambahkan opsi baru
            if (!usernameFound) {
                const newOption = new Option(username, username, true, true);
                editUsername.add(newOption);
            }

            // Set selected value for Nama Kelas dropdown
            Array.from(editNamaKelas.options).forEach(option => {
                option.selected = option.value === namaKelas;
            });

            // Set selected value for Jenis Kelamin dropdown
            Array.from(editJenisKelamin.options).forEach(option => {
                option.selected = option.value === jenisKelamin;
            });

            openModal('editModal');
        }
    </script>
@endpush
