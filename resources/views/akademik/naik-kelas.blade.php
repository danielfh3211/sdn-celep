@extends('layouts.dash-layout')

@section('title', 'Naik Kelas')

@section('content')
    <h1 class="text-xl font-bold mb-4">Naik Kelas</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('akademik.naik-kelas-proses') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="mb-6">
            <label for="kelas_baru" class="block text-sm font-medium text-gray-700 mb-2">Pilih Kelas Baru</label>
            <select name="kelas_baru" id="kelas_baru" class="border border-gray-300 p-3 rounded-lg w-full" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Siswa</label>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300 text-sm">
                    <thead class="bg-blue-950 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">
                                <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                            </th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nama Siswa</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Kelas Saat Ini</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $s)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="checkbox" name="siswa_ids[]" value="{{ $s->id }}">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $s->nama_siswa }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $s->nama_kelas }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $siswa->links('pagination::tailwind') }}
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600">
                Naikkan Kelas
            </button>
        </div>
    </form>


@endsection

@push('scripts')
    <script>
        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('input[name="siswa_ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        }

        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="siswa_ids[]"]');
            const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

            if (!isAnyChecked) {
                alert('Harap pilih setidaknya satu siswa untuk dipindahkan.');
                return false; // Mencegah pengiriman form
            }

            // Tampilkan dialog konfirmasi
            const confirmation = confirm('Apakah Anda yakin ingin menaikkan kelas siswa yang dipilih?');
            return confirmation; // Jika pengguna memilih "OK", form akan dikirim
        }
    </script>
@endpush
