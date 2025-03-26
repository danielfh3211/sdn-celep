@extends('layouts.dash-layout')

@section('title', 'Manage Visi & Misi')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-2xl font-bold mb-4">Manage Visi & Misi</h2>

        <div class="mb-6">
            <form action="#" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Visi</label>
                    <textarea name="visi" rows="4" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Misi</label>
                    <textarea name="misi" rows="6" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
