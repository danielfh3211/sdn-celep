@extends('layouts.dash-layout')

@section('title', 'Laporan Nilai')

@section('content')
    <div class="bg-white p-6 md:p-8 rounded-lg shadow">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 space-y-3 md:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Laporan Nilai</h1>
                <p class="text-sm text-gray-600">Berikut adalah nilai siswa: <strong>{{ $siswa->nama_siswa }}</strong></p>
                <p class="text-sm text-gray-600">Kelas: <strong>{{ $siswa->nama_kelas }}</strong></p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('akademik.pilih-siswa') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
                <a href="{{ route('akademik.download-nilai') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">
                    Download Nilai
                </a>
            </div>
        </div>

        {{-- Tabel Nilai --}}
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Mata Pelajaran</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nilai</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Semester</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tahun Ajaran</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $item->mataPelajaran->nama_mapel }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nilai }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->semester }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->tahun_ajaran }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('akademik.delete-nilai', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-200">
                                        <i class="fas fa-trash-alt mr-1 md:mr-2"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
