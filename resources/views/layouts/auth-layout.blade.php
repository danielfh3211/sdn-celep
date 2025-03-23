<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/135aca43fe.js" crossorigin="anonymous"></script>
    <title>@yield('title', 'SDN 3 CELEP')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded shadow">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SDN 3 CELEP" class="h-20 w-auto">
        </div>
        {{-- Content --}}
        @yield('content')
    </div>
</body>

</html>
