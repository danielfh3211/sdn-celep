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
                    class="w-full mt-1 p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="w-full mt-1 p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="w-full mt-1 p-2 border rounded" required>
                    <option value="siswa" {{ $user->role === 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password (Opsional)</label>
                <input type="password" name="password" id="password" class="w-full mt-1 p-2 border rounded">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password.</small>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update
            </button>
        </form>
    </div>
@endsection
