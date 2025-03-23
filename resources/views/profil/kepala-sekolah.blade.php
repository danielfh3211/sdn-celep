<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/135aca43fe.js" crossorigin="anonymous"></script>
    <title>SDN 3 CELEP</title>
</head>

<body>
    <x-navbar />
    <x-page-header title="Kepala Sekolah" subtitle="" backgroundImage="/assets/img/bg-header.jpg" />

    <div class="px-4 sm:px-20 lg:px-40">
        @if ($kepsek)
            <div class="flex justify-start items-start gap-8 flex-wrap">
                <div class="max-w-[500px] w-full">
                    <div class="p-8 flex justify-center">
                        <img src="{{ asset($kepsek->image) }}" alt="Kepala Sekolah"
                            class="w-full h-full object-cover shadow-lg">
                    </div>
                </div>
                <div class="w-full md:w-[500px] px-4 md:px-0">
                    <h1 class="text-2xl font-bold mt-5">Profil {{ $kepsek->name }}</h1>
                    <h2 class="mt-3 mb-4 text-lg font-semibold">{{ $kepsek->position }}</h2>
                    <p class="leading-8 text-justify">{!! nl2br(e($kepsek->description)) !!}</p>
                    <p class="font-bold italic text-center w-full mt-6 text-gray-700">
                        "{{ $kepsek->motivation }}"
                    </p>
                </div>
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500">Data kepala sekolah belum tersedia.</p>
            </div>
        @endif
    </div>

    <x-footer />
</body>

</html>
