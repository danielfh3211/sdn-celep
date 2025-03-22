@extends('layouts.dash-layout')

@section('title', 'Tambah Akun')

@section('content')
    <div class="bg-white p-6 rounded shadow-lg max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-blue-950 mb-6">Tambah Akun {{ ucfirst($role) }}</h1>
        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
            @csrf
            {{-- Input Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                    placeholder="Masukkan nama" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                    placeholder="Masukkan email" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                    placeholder="Masukkan password" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Konfirmasi Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password_confirmation') border-red-500 @enderror"
                    placeholder="Masukkan ulang password" required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hidden Input Role --}}
            <input type="hidden" name="role" value="{{ $role }}">

            {{-- Tombol Submit --}}
            <div>
                <button type="submit"
                    class="w-full bg-blue-950 text-white py-3 rounded-lg font-semibold hover:bg-blue-900 transition duration-200">
                    Tambah Akun
                </button>
            </div>
        </form>
    </div>
@endsection
