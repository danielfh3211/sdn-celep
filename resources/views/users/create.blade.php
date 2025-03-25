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
    </div>
@endsection
