@extends('layouts.auth-layout')

@section('title', 'Register - SDN 3 CELEP')

@section('content')
    {{-- Judul --}}
    <h1 class="text-2xl font-bold text-center mb-6">Register</h1>

    {{-- Form Register --}}
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full mt-1 p-2 border rounded @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full mt-1 p-2 border rounded @error('email') border-red-500 @enderror" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password"
                class="w-full mt-1 p-2 border rounded @error('password') border-red-500 @enderror" required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full mt-1 p-2 border rounded @error('password_confirmation') border-red-500 @enderror" required>
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Daftar Sebagai</label>
            <select name="role" id="role"
                class="w-full mt-1 p-2 border rounded @error('role') border-red-500 @enderror" required>
                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
            </select>
            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
            Register
        </button>
    </form>

    {{-- Link ke Login --}}
    <p class="text-center text-sm text-gray-600 mt-4">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-green-500 hover:underline">Login di sini</a>
    </p>
@endsection
