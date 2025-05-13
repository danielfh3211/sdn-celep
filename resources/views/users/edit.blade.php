@extends('layouts.dash-layout')

@section('title', 'Edit User')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('username') border-red-500 @enderror"
                    required>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <div class="relative">
                    <select name="role" id="role"
                        class="w-full mt-1 p-3 pr-10 border rounded-lg shadow-sm appearance-none focus:ring-blue-500 focus:border-blue-500 @error('role') border-red-500 @enderror"
                        required>
                        <option value="siswa" {{ $user->role === 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>

                    <!-- Icon panah -->
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password (Opsional)</label>
                <input type="password" name="password" id="password"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password.</small>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ url()->previous() }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
