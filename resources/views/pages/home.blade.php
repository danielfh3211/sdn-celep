@extends('layouts.dash-layout')

@section('title', 'Manage Home Page')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-2xl font-bold mb-4">Manage Home Page</h2>

        <div class="flex justify-start gap-10 flex-wrap">
            <x-dash-card-menu title="Slider" href="{{ route('pages.home.slider') }}" :active="request()->routeIs('pages.home.slider')" />

            <x-dash-card-menu title="Kata Pengantar" href="{{ route('pages.home.kata-pengantar') }}" :active="request()->routeIs('pages.home.kata-pengantar')" />
        </div>
    </div>
@endsection
