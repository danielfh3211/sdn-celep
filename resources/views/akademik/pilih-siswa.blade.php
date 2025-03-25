@extends('layouts.dash-layout')

@section('title', 'Pilih Siswa')

@section('content')
    <div class="bg-white p-6 md:p-8 rounded-lg shadow">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 space-y-3 md:space-y-0">
            <h1 class="text-2xl font-bold text-gray-800">Pilih Siswa</h1>
            <p class="text-sm text-gray-600">Pilih siswa untuk melihat nilai yang telah diinputkan.</p>
        </div>

        {{-- Tabel Data Siswa --}}
        <div class="overflow-x-auto">
            <table id="dataTable" class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                        <th class="border border-gray-300 px-2 md:px-4 py-2 text-left">NIS</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Siswa</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Kelas</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $item)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->username }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nama_siswa }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nama_kelas }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('akademik.nilai-siswa', $item->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-200 inline-flex items-center">
                                    <i class="fas fa-eye mr-1"></i> Lihat Nilai
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $siswa->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
