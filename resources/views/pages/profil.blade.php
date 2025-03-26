@extends('layouts.dash-layout')

@section('title', 'Manage Home Page')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-2xl font-bold mb-4">Manage Profil Page</h2>

        <div class="flex justify-start gap-10 flex-wrap">
            <x-dash-card-menu title="Visi & Misi" href="{{ route('pages.profil.visi-misi') }}" :active="request()->routeIs('pages.profil.visi-misi')"
                icon="fas fa-bullseye" />
            <x-dash-card-menu title="Profil Sekolah" href="{{ route('pages.profil.sekolah') }}" :active="request()->routeIs('pages.profil.sekolah')"
                icon="fas fa-school" />
            <x-dash-card-menu title="Kepala Sekolah" href="{{ route('pages.profil.kepsek') }}" :active="request()->routeIs('pages.profil.kepsek')"
                icon="fas fa-user-tie" />
            <x-dash-card-menu title="Guru & Karyawan" href="{{ route('pages.profil.guru-karyawan') }}" :active="request()->routeIs('pages.profil.guru-karyawan')"
                icon="fas fa-users" />
            <x-dash-card-menu title="Komite Sekolah" href="{{ route('pages.profil.komite') }}" :active="request()->routeIs('pages.profil.komite')"
                icon="fas fa-users-cog" />
            <x-dash-card-menu title="Sarana & Prasarana" href="{{ route('pages.profil.sarpras') }}" :active="request()->routeIs('pages.profil.sarpras')"
                icon="fas fa-building" />
        </div>
    </div>
@endsection
