@extends('layouts.dash-layout')

@section('title', 'Tambah Akun')

@section('content')
    <div class="relative bg-white p-6 md:p-8 rounded shadow-lg max-w-2xl mx-auto">
        {{-- Navigasi Kembali --}}
        <div class="absolute top-4 left-4">
            <a href="{{ url()->previous() }}"
                class="bg-gray-200 text-gray-700 px-3 py-2 rounded-full shadow hover:bg-gray-300 transition duration-200 inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        {{-- Judul Form --}}
        <h1 class="text-3xl font-bold text-center text-blue-950 mb-6">Tambah Akun {{ ucfirst($role) }}</h1>

        {{-- Form Tambah Akun --}}
        <form action="{{ route('users.store') }}" method="POST" class="space-y-3">
            @csrf

            {{-- Input Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                    placeholder="Masukkan nama" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Username/NIP/NIS --}}
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                    @if ($role === 'guru')
                        NIP
                    @elseif ($role === 'siswa')
                        NIS
                    @else
                        Username
                    @endif
                </label>
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="w-full p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('username') border-red-500 @enderror"
                    placeholder="Masukkan data" required>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                    placeholder="Masukkan password" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Konfirmasi Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password_confirmation') border-red-500 @enderror"
                    placeholder="Masukkan ulang password" required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hidden Input Role --}}
            <input type="hidden" name="role" value="{{ $role }}">

            {{-- Tombol Submit --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-950 text-white px-6 py-2 mt-4 rounded-lg font-semibold hover:bg-blue-900 transition duration-200">
                    Tambah Akun
                </button>
            </div>
        </form>

        {{-- Form Import Excel --}}
        <div class="mt-10 border-t pt-8">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2 text-blue-900">
                Import Akun {{ ucfirst($role) }} via Excel
            </h2>
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <input type="hidden" name="role" value="{{ $role }}">
                <div>
                    <label for="excel_file" class="block text-base font-semibold text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 10l5 5 5-5"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15V3"></path>
                            </svg>
                            File Excel
                        </span>
                    </label>
                    <input type="file" name="excel_file" id="excel_file" accept=".xlsx,.xls"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-50 file:text-green-700
                        hover:file:bg-green-100
                        @error('excel_file') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                        required>
                    @error('excel_file')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-2">Format kolom: <span class="font-semibold">nama</span>, <span
                            class="font-semibold">username/nip/nis</span>, <span class="font-semibold">password</span></p>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-2 rounded-lg font-semibold shadow hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
                        Import Excel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
