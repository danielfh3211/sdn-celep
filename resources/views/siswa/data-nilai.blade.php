@extends('layouts.dash-layout')

@section('title', 'Dashboard Siswa')

@section('content')
    <div class="bg-white p-6 md:p-8 rounded-lg shadow">
        {{-- Informasi Siswa --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ $siswa->nama_siswa }}</h1>
            <p class="text-sm text-gray-600">Berikut adalah informasi dan nilai Anda:</p>
        </div>

        {{-- Data Siswa --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Siswa</h2>
            <table class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">NIS</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $siswa->username }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $siswa->nama_siswa }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kelas</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $siswa->nama_kelas }}</td>
                </tr>
            </table>
        </div>

        {{-- Data Nilai --}}
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Data Nilai</h2>

                {{-- Tombol Download Nilai --}}
                <form action="{{ route('akademik.download-nilai', $siswa->id) }}" method="POST" target="_blank">
                    @csrf
                    <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">
                        Download Nilai
                    </button>
                </form>
            </div>

            <table class="table-auto w-full border-collapse border border-gray-300 text-sm md:text-base">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Mata Pelajaran</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nilai</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Semester</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $item->mataPelajaran->nama_mapel }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nilai }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->semester }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->tahun_ajaran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
