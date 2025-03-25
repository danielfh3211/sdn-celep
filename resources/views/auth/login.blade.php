@extends('layouts.auth-layout')

@section('title', 'Login - SDN 3 CELEP')

@section('content')
    {{-- Judul --}}
    <h1 class="text-2xl font-bold text-center mb-6">Login</h1>

    {{-- Popup Error --}}
    @if ($errors->any())
        <div id="errorPopup" class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded relative">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
            <button type="button" class="absolute top-0 right-0 px-4 py-3" onclick="closePopup()">
                <span class="text-red-500 hover:text-red-800">&times;</span>
            </button>
        </div>
    @endif

    {{-- Form Login --}}
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Login Sebagai</label>
            <select name="role" id="role" class="w-full mt-1 p-2 border rounded" required>
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">NIS/NIP</label>
            <input type="text" name="username" id="username" class="w-full mt-1 p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="relative">
                <input type="password" name="password" id="password" class="w-full mt-1 p-2 border rounded pr-10" required>
                <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-2 flex items-center px-2 text-gray-600 text-sm">
                    <i id="toggleIcon" class="fa fa-eye"></i>
                </button>
            </div>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
            Login
        </button>
    </form>
@endsection

@push('scripts')
    <script>
        function togglePassword() {
            let passwordField = document.getElementById('password');
            let toggleIcon = document.getElementById('toggleIcon');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

        function closePopup() {
            const popup = document.getElementById('errorPopup');
            if (popup) {
                popup.style.display = 'none';
            }
        }
    </script>
@endpush
