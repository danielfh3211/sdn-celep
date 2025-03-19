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
    <!-- Header Banner (optional) - displays the large SDN Celep 3 text seen in your screenshot -->
    <x-page-header title="Komite Sekolah" subtitle="" backgroundImage="/assets/img/bg-header.jpg" />

    <div class="px-10 sm:px-40">
        <!-- Foto Kontent komite -->
    </div>

    <div>
        <div class=" px-10 sm:px-40 py-10">
            <div class="bg-blue-950 py-5 px-10 max-w-[810px]">
                <h1 class="text-5xl font-semibold text-white border-b-1 pb-1">Komite Sekolah</h1>
                <div class="flex justify-between items-start gap-10 pt-5 flex-wrap">
                    <p class="text-xl text-white font-semibold text-left w-80">Komite Sekolah adalah wadah komunitas
                        orang
                        tua siswa -
                        siswi SD Negeri Celep 3. Sebagai Salah
                        Satu stakeholder dari bagian sekolah yang berfungsi mendukung sekolah dalam meningkatkan mutu
                        dan kualitas, sehingga menghasilkan anak didik yang berkualitas</p>
                    <div class="bg-blue-700 w-80 h-72"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-10 sm:px-40 py-10">
        @foreach ($newsItems as $news)
            <x-card-news video-url="{{ $news['video_url'] }}" title="{{ $news['title'] }}"
                description="{{ $news['description'] }}" />
        @endforeach
    </div>
    <x-footer />
</body>

</html>
