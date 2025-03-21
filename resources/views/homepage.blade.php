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

    </div>

    <x-navbar />
    <!-- Header Banner (optional) - displays the large SDN Celep 3 text seen in your screenshot -->
    <x-page-header title="SDN Celep 3" subtitle="Cerdas dan Berkarakter" backgroundImage="/assets/img/homapage.jpeg" />

    <div class="sm:px-40 px-10 mb-20 mt-10">
        <div>
            <marquee behavior="scroll" direction="left" class="text-white font-bold text-2xl  p-2"
                style="background-color: #0000FF">
                Selamat Datang di Website Resmi SD Negeri Celep 3 Kedawung Sekolah Adiwiyata Nasional</marquee>
        </div>
        <x-carousel slides="" />
    </div>
    <div>
        <div class="sm:px-40 px-10 mb-20 flex flex-wrap sm:flex-nowrap gap-20 justify-center">
            <x-KataPengantar />
            <div class="flex flex-col gap-10 ">
                <a href="/ppdb" class="w-80 h-80 "><img src="/assets/img/home/home-ppdb.png" alt=""></a>
                <a href="/kritik-saran" class="w-80 h-80 "><img src="/assets/img/home/home-saran.jpg"
                        alt=""></a>
            </div>
        </div>
    </div>
    <div>
        <x-footer />
    </div>
</body>

</html>
