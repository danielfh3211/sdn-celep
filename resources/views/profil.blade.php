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
    <div>
        <x-navbar />
        <!-- Header Banner (optional) - displays the large SDN Celep 3 text seen in your screenshot -->
        <x-page-header title="Profil" subtitle="" backgroundImage="/assets/img/bg-header.jpg" />

        <main class="flex-grow">
            <div class="">
                <div class="bg-[#138174] py-20">
                    @php
                        $menuItems = [
                            [
                                'title' => 'Kepala Sekolah',
                                'href' => '/profil/kepala-sekolah',
                            ],
                            [
                                'title' => 'Profil Sekolah',
                                'href' => '/profil/profil',
                            ],
                            [
                                'title' => 'Visi Misi',
                                'href' => '/profil/visi-misi',
                            ],
                            [
                                'title' => 'Guru dan Karyawan',
                                'href' => '/profil/guru-karyawan',
                            ],
                            [
                                'title' => 'Komite Sekolah',
                                'href' => '/profil/komite',
                            ],
                            [
                                'title' => 'Sarana Prasarana',
                                'href' => '/profil/sarana-prasarana',
                            ],
                        ];
                    @endphp

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 place-items-center max-w-7xl mx-auto">
                        @foreach ($menuItems as $item)
                            <x-card-menu title="{{ $item['title'] }}" href="{{ $item['href'] }}" background-image="" />
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </div>
</body>

</html>
