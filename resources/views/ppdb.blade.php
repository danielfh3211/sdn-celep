<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/135aca43fe.js" crossorigin="anonymous"></script>
    <title>PPDB - SDN 3 CELEP</title>
</head>

<body class="flex flex-col min-h-screen">
    <x-navbar />
    <x-page-header title="PPDB" subtitle="" backgroundImage="/assets/img/bg-header.jpg" />

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="space-y-8">
            @foreach ($newsItems as $news)
                <x-card-news video-url="{{ $news['video_url'] }}" title="{{ $news['title'] }}"
                    description="{{ $news['description'] }}" />
            @endforeach
        </div>
    </main>

    <x-footer />
</body>

</html>
