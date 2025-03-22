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
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full mt-1 p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="w-full mt-1 p-2 border rounded" required>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
            Login
        </button>
    </form>

    {{-- Link ke Register --}}
    <p class="text-center text-sm text-gray-600 mt-4">
        Belum punya akun? <a href="{{ route('register') }}" class="text-green-500 hover:underline">Daftar di sini</a>
    </p>
@endsection

@push('scripts')
    <script>
        function closePopup() {
            const popup = document.getElementById('errorPopup');
            if (popup) {
                popup.style.display = 'none';
            }
        }
    </script>
@endpush
