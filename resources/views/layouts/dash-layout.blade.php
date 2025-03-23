<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SDN 3 CELEP')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/135aca43fe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-50 md:w-56 lg:w-64 bg-blue-950 text-white flex flex-col min-h-full transition-transform transform md:translate-x-0 -translate-x-full md:relative fixed z-50">
            <!-- Close Button for Small Screens -->
            <button id="closeSidebar" class="text-white text-2xl absolute top-4 right-4 md:hidden">
                &times;
            </button>

            <!-- User Info -->
            <div class="p-4 md:p-6 flex items-center border-b border-gray-700">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gray-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white text-lg md:text-xl"></i>
                </div>
                <div class="ml-3 md:ml-4">
                    <h2 class="text-base md:text-lg font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-xs md:text-sm capitalize text-gray-300">{{ Auth::user()->role }}</p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-1 px-4 md:px-6 py-4 space-y-3 md:space-y-4">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-3 hover:bg-blue-900 rounded">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>

                <!-- Akademik Dropdown -->
                @if (Auth::user()->role === 'guru' || Auth::user()->role === 'siswa' || Auth::user()->role === 'admin')
                    <div>
                        <button id="akademikDropdown"
                            class="w-full text-left py-2 px-3 font-semibold hover:bg-blue-900 rounded flex items-center justify-between cursor-pointer">
                            <span><i class="fas fa-book mr-3"></i> Akademik</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div id="akademikMenu" class="hidden pl-6 space-y-2 mt-2">
                            <a href="#" class="block py-2 px-3 hover:bg-blue-900 rounded">Data Siswa</a>
                            <a href="#" class="block py-2 px-3 hover:bg-blue-900 rounded">Data Kelas</a>
                            <a href="#" class="block py-2 px-3 hover:bg-blue-900 rounded">Naik Kelas</a>
                            <a href="#" class="block py-2 px-3 hover:bg-blue-900 rounded">Mata Pelajaran</a>
                            <a href="#" class="block py-2 px-3 hover:bg-blue-900 rounded">Data Nilai</a>
                            <a href="#" class="block py-2 px-3 hover:bg-blue-900 rounded">Laporan Rapot</a>
                        </div>
                    </div>
                @endif

                <!-- Pages Dropdown -->
                @if (Auth::user()->role === 'guru' || Auth::user()->role === 'admin')
                    <div>
                        <button id="pagesDropdown"
                            class="w-full text-left py-2 px-3 font-semibold hover:bg-blue-900 rounded flex items-center justify-between cursor-pointer">
                            <span><i class="fas fa-file-alt mr-3"></i> Pages</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div id="pagesMenu" class="hidden pl-6 space-y-2 mt-2">
                            <a href="{{ route('pages.home.index') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Home</a>
                            <a href="{{ route('pages.profil.index') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Profil</a>
                            <a href="{{ route('pages.kegiatan') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Kegiatan</a>
                            <a href="{{ route('pages.kombel') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Kombel</a>
                            <a href="{{ route('pages.ekskul') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Ekskul</a>
                            <a href="{{ route('pages.prestasi') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Prestasi</a>
                        </div>
                    </div>
                @endif

                <!-- Users Dropdown -->
                @if (Auth::user()->role === 'admin')
                    <div>
                        <button id="usersDropdown"
                            class="w-full text-left py-2 px-3 font-semibold hover:bg-blue-900 rounded flex items-center justify-between cursor-pointer">
                            <span><i class="fas fa-users mr-3"></i> Users</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div id="usersMenu" class="hidden pl-6 space-y-2 mt-2">
                            <a href="{{ route('users.siswa') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Siswa</a>
                            <a href="{{ route('users.guru') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Guru</a>
                            <a href="{{ route('users.admin') }}"
                                class="block py-2 px-3 hover:bg-blue-900 rounded">Admin</a>
                        </div>
                    </div>
                @endif
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-blue-950 text-white flex items-center justify-between p-3 md:p-4">
                <button id="hamburger" class="text-white text-2xl md:hidden">&#9776;</button>
                <div class="relative flex items-center space-x-2 md:space-x-3">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SDN 3 CELEP" class="h-10 md:h-12 w-auto">
                    <h1 class="text-sm md:text-lg font-bold">SD Negeri 3 Celep</h1>
                </div>

                <div class="relative">
                    <button id="profileDropdown" class="bg-orange-500 px-3 md:px-4 py-2 rounded flex items-center">
                        <i class="fas fa-user-circle mr-2"></i>
                        <span class="text-sm md:text-base">{{ Auth::user()->name }}</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu"
                        class="absolute right-0 mt-2 w-40 md:w-48 bg-white text-black rounded shadow hidden">
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-4 md:p-6 bg-gray-100 flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div id="uploadModal" class="fixed inset-0 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg w-full max-w-md" onclick="event.stopPropagation()">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Upload New Image</h3>
                <button type="button" onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- ...rest of your modal content... -->
        </div>
    </div>

    <script>
        // Script untuk tombol hamburger dan dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebar = document.getElementById('sidebar');
            const dropdowns = [{
                    button: 'akademikDropdown',
                    menu: 'akademikMenu'
                },
                {
                    button: 'pagesDropdown',
                    menu: 'pagesMenu'
                },
                {
                    button: 'usersDropdown',
                    menu: 'usersMenu'
                },
            ];
            const profileDropdown = document.getElementById('profileDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            // Toggle sidebar
            hamburger.addEventListener('click', function() {
                sidebar.classList.remove('-translate-x-full');
            });

            closeSidebar.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
            });

            // Toggle dropdown menus
            dropdowns.forEach(({
                button,
                menu
            }) => {
                const dropdownButton = document.getElementById(button);
                const dropdownMenu = document.getElementById(menu);

                dropdownButton?.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });
            });

            // Toggle profile dropdown
            profileDropdown.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
