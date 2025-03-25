@extends('layouts.dash-layout')

@section('title', 'Data Admin')

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
        {{-- Header dengan judul dan tombol tambah akun --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4 space-y-3 md:space-y-0">
            <h1 class="text-xl md:text-2xl font-bold">Data Admin</h1>
            <a href="{{ route('users.create', ['role' => 'admin']) }}"
                class="bg-blue-950 text-white px-3 md:px-4 py-2 rounded hover:bg-blue-900 transition duration-200 inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Akun
            </a>
        </div>

        {{-- Tabel Data Admin --}}
        <div class="overflow-x-auto">
            <table id="dataTable" class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">No</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">Nama</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">Username</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">Tanggal Dibuat</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-2 md:px-4 py-2">
                                {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                            </td>
                            <td class="border border-gray-300 px-2 md:px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-2 md:px-4 py-2">{{ $user->username }}</td>
                            <td class="border border-gray-300 px-2 md:px-4 py-2">{{ $user->created_at->format('d-m-Y') }}
                            </td>
                            <td class="border border-gray-300 px-2 md:px-4 py-2 text-center">
                                <div class="flex flex-col md:flex-row justify-center items-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition duration-200 inline-flex items-center justify-center">
                                        <i class="fas fa-edit mr-1 md:mr-2"></i> Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
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
            {{ $users->links('pagination::tailwind') }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                },
                paging: false, // Nonaktifkan pagination bawaan DataTables
                info: false // Nonaktifkan informasi bawaan DataTables
            });
        });

        function confirmDelete(userId) {
            if (confirm('Apakah Anda yakin ingin menghapus akun ini?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endpush
