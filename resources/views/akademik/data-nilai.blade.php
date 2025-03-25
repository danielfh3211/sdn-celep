@extends('layouts.dash-layout')

@section('title', 'Input Nilai')

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

    <div class="bg-white p-6 md:p-8 rounded-lg shadow">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 space-y-3 md:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Input Nilai</h1>
                <p class="text-sm text-gray-600">Masukkan nilai untuk siswa berikut:</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-600"><strong>Nama Siswa:</strong> {{ $siswa->nama_siswa }}</p>
                <p class="text-sm text-gray-600"><strong>Kelas:</strong> {{ $siswa->nama_kelas }}</p>
            </div>
        </div>

        {{-- Tampilkan pesan error jika ada --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Input Nilai --}}
        <form action="{{ route('akademik.store-nilai') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

            {{-- Mata Pelajaran --}}
            <div class="form-group">
                <label for="mapel_id" class="block text-sm font-medium text-gray-700 mb-2">Mata Pelajaran</label>
                <select name="mapel_id" id="mapel_id" class="form-control w-full border-gray-300 rounded-md shadow-sm p-2"
                    required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach ($mapel as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Nilai --}}
            <div class="form-group">
                <label for="nilai" class="block text-sm font-medium text-gray-700 mb-2">Nilai</label>
                <input type="number" name="nilai" id="nilai"
                    class="form-control w-full border-gray-300 rounded-md shadow-sm p-2" min="0" max="100"
                    required>
            </div>

            {{-- Semester --}}
            <div class="form-group">
                <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">Semester</label>
                <input type="text" name="semester" id="semester"
                    class="form-control w-full border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            {{-- Tahun Ajaran --}}
            <div class="form-group">
                <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mb-2">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" id="tahun_ajaran"
                    class="form-control w-full border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            {{-- Tombol Simpan --}}
            <div class="flex space-x-2">
                <a href="{{ route('akademik.pilih-siswa-input-nilai') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
