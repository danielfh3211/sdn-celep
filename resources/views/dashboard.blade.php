@extends('layouts.dash-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4 capitalize">{{ Auth::user()->role }} Dashboard</h1>
        <p class="text-lg">Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
    </div>
@endsection
