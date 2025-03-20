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
    <x-page-header title="Kegiatan" subtitle="" backgroundImage="/assets/img/bg-header.jpg" />

    <div class="sm:px-20 px-10 bg-[#138174] py-20 ">
        @php
            $menuItems = [
                [
                    'title' => 'Pembiasaan',
                    'href' => '/kegiatan/pembiasaan',
                ],
                [
                    'title' => 'Kemitraan',
                    'href' => '/kegiatan/kemitraan',
                ],
                [
                    'title' => 'Akademik',
                    'href' => '/kegiatan/akademik',
                ],
            ];
        @endphp

        <div class="flex flex-wrap justify-center items-center gap-8">
            @foreach ($menuItems as $item)
                <x-card-menu title="{{ $item['title'] }}" href="{{ $item['href'] }}" backgroundImage="" />
            @endforeach
        </div>
    </div>

    <x-footer />
</body>

</html>
