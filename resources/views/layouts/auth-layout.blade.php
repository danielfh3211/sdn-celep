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
    <!-- Fullscreen Page Loader -->
    <div id="page-loader"
        class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50 opacity-100 transition-opacity duration-500">

        <!-- Loading Spinner -->
        <div class="relative w-16 h-16">
            <div
                class="absolute inset-0 border-4 border-blue-500 border-solid border-t-transparent rounded-full animate-spin">
            </div>
            <div
                class="absolute inset-0 border-4 border-gray-300 border-solid border-t-transparent rounded-full opacity-30">
            </div>
        </div>

        <!-- Loading Text -->
        <p class="mt-4 text-gray-600 text-sm animate-pulse">Memuat halaman...</p>
    </div>

    <div class="w-full max-w-md bg-white p-8 rounded shadow">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SDN 3 CELEP" class="h-20 w-auto">
        </div>
        {{-- Content --}}
        @yield('content')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.getElementById("page-loader");
            // Fade out setelah halaman selesai dimuat
            loader.classList.add("opacity-0");
            setTimeout(() => {
                loader.style.display = "none";
            }, 500);
        });

        // Tampilkan loader saat pengguna klik link
        document.addEventListener("click", function(event) {
            const target = event.target.closest("a"); // Pastikan link
            if (target && target.href && !target.href.includes("#") && target.target !== "_blank") {
                event.preventDefault(); // Cegah pindah langsung
                const loader = document.getElementById("page-loader");
                loader.style.display = "flex";
                loader.classList.remove("opacity-0");
                setTimeout(() => {
                    window.location.href = target.href; // Redirect setelah efek muncul
                }, 300);
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
