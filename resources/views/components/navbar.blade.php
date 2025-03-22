<nav x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 0)"
    :class="{ 'bg-[#212121]': scrolled, 'bg-transparent': !scrolled }"
    class="fixed w-full z-30 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center">
                    <img class="h-8 w-auto" src="/assets/img/logo.png" alt="SDN CELEP 3">
                    <span class="ml-2 text-xl font-bold text-white">SDN CELEP 3</span>
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Existing Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-1 lg:space-x-2">
                    <a href="/"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('/') ? 'text-green-300' : 'text-white' }}">
                        Home
                    </a>

                    <!-- Dropdown for Profil -->
                    <div x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false" class="relative">
                        <div class="group">
                            <button
                                class="px-3 py-2 text-sm font-medium hover:text-green-300 inline-flex items-center {{ request()->is('profil*') ? 'text-green-300' : 'text-white' }}">
                                <span>Profil</span>
                                <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="absolute h-2 w-full -bottom-2"></div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="bg-[#212121] absolute top-full pt-2 w-48 rounded-md shadow-lg z-20">
                                <div class="py-2">
                                    <a href="/profil/visi-misi"
                                        class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('profil/visi-misi*') ? 'text-green-300' : 'text-white' }}">
                                        Visi Misi Tujuan
                                    </a>
                                    <a href="/profil/profil-sekolah"
                                        class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('profil/profil-sekolah*') ? 'text-green-300' : 'text-white' }}">
                                        Profil Sekolah
                                    </a>
                                    <a href="/profil/kepala-sekolah"
                                        class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('profil/kepala-sekolah*') ? 'text-green-300' : 'text-white' }}">
                                        Kepala Sekolah
                                    </a>
                                    <a href="/profil/guru-karyawan"
                                        class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('profil/guru-karyawan*') ? 'text-green-300' : 'text-white' }}">
                                        Guru dan Karyawan
                                    </a>
                                    <a href="/profil/komite-sekolah"
                                        class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('profil/komite-sekolah*') ? 'text-green-300' : 'text-white' }}">
                                        Komite Sekolah
                                    </a>
                                    <a href="/profil/sarana-prasarana"
                                        class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('profil/sarana-prasarana*') ? 'text-green-300' : 'text-white' }}">
                                        Sarana dan Prasarana
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown for Kegiatan -->
                    <div x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false" class="relative">
                        <div class="group">
                            <button
                                class="px-3 py-2 text-sm font-medium hover:text-green-300 inline-flex items-center {{ request()->is('kegiatan*') ? 'text-green-300' : 'text-white' }}">
                                <span>Kegiatan</span>
                                <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="absolute h-2 w-full -bottom-2"></div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="bg-[#212121] absolute top-full pt-2 w-48 rounded-md shadow-lg z-20">
                                <a href="/kegiatan/akademi"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('kegiatan/akademi*') ? 'text-green-300' : 'text-white' }}">
                                    Kegiatan Akademi
                                </a>
                                <a href="/kegiatan/pembiasaan"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('kegiatan/pembiasaan*') ? 'text-green-300' : 'text-white' }}">
                                    Kegiatan Pembiasaan
                                </a>
                                <a href="/kegiatan/kemitraan"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('kegiatan/kemitraan*') ? 'text-green-300' : 'text-white' }}">
                                    Kemitraan
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="/kombel"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('kombel') ? 'text-green-300' : 'text-white' }}">
                        Kombel
                    </a>

                    <!-- Dropdown for Ekskul -->
                    <div x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false" class="relative">
                        <div class="group">
                            <button
                                class="px-3 py-2 text-sm font-medium hover:text-green-300 inline-flex items-center {{ request()->is('ekskul*') ? 'text-green-300' : 'text-white' }}">
                                <span>Ekskul</span>
                                <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="absolute h-2 w-full -bottom-2"></div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="bg-[#212121] absolute top-full pt-2 w-48 rounded-md shadow-lg z-20">
                                <a href="/ekskul/pramuka"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/pramuka*') ? 'text-green-300' : 'text-white' }}">
                                    Pramuka
                                </a>
                                <a href="/ekskul/seni-tari"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/seni-tari*') ? 'text-green-300' : 'text-white' }}">
                                    Seni Tari
                                </a>
                                <a href="/ekskul/seni-rupa"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/seni-rupa*') ? 'text-green-300' : 'text-white' }}">
                                    Seni Rupa
                                </a>
                                <a href="/ekskul/seni-teater"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/seni-teater*') ? 'text-green-300' : 'text-white' }}">
                                    Seni Teater
                                </a>
                                <a href="/ekskul/renang"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/renang*') ? 'text-green-300' : 'text-white' }}">
                                    Renang
                                </a>
                                <a href="/ekskul/bola-voli"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/bola-voli*') ? 'text-green-300' : 'text-white' }}">
                                    Bola Voli
                                </a>
                                <a href="/ekskul/tahfidz"
                                    class="block px-4 py-2 text-sm hover:text-green-300 {{ request()->is('ekskul/tahfidz*') ? 'text-green-300' : 'text-white' }}">
                                    Tahfidz
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="/prestasi"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('prestasi') ? 'text-green-300' : 'text-white' }}">
                        Prestasi
                    </a>

                    <a href="/ppdb"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('ppdb') ? 'text-green-300' : 'text-white' }}">
                        PPDB
                    </a>

                    <a href="/kekancan"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('kekancan') ? 'text-green-300' : 'text-white' }}">
                        Kekancan
                    </a>

                    <a href="/kritik-saran"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('kritik-saran') ? 'text-green-300' : 'text-white' }}">
                        Kritik Saran
                    </a>
                </div>

                <!-- Login Button -->
                <a href="/login"
                    class="hidden md:inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600 transition">
                    Login
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="fixed top-4 right-4 z-50 p-2 rounded-md text-white hover:text-green-300 focus:outline-none bg-[#212121]">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="sr-only" x-text="mobileMenuOpen ? 'Close menu' : 'Open menu'"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 w-1/2 md:hidden transform z-10 bg-[#212121]">

        <div class="h-full overflow-y-auto">
            <div class="px-2 pt-8 pb-3 space-y-1 sm:px-3">
                <!-- Home -->
                <a href="/"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                    Home
                </a>

                <!-- Mobile Profil Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium flex justify-between items-center {{ request()->is('profil*') ? 'text-green-300' : 'text-white' }}">
                        <span class="hover:text-green-300">Profil</span>
                        <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 py-2 space-y-1">
                        <a href="/profil/visi-misi"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('profil/visi-misi*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Visi Misi Tujuan
                        </a>
                        <a href="/profil/profil-sekolah"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('profil/profil-sekolah*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Profil Sekolah
                        </a>
                        <a href="/profil/kepala-sekolah"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('profil/kepala-sekolah*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Kepala Sekolah
                        </a>
                        <a href="/profil/guru-karyawan"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('profil/guru-karyawan*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Guru dan Karyawan
                        </a>
                        <a href="/profil/komite-sekolah"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('profil/komite-sekolah*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Komite Sekolah
                        </a>
                        <a href="/profil/sarana-prasarana"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('profil/sarana-prasarana*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Sarana dan Prasarana
                        </a>
                    </div>
                </div>

                <!-- Mobile Kegiatan Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium flex justify-between items-center {{ request()->is('kegiatan*') ? 'text-green-300' : 'text-white' }}">
                        <span class="hover:text-green-300">Kegiatan</span>
                        <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 py-2 space-y-1">
                        <a href="/kegiatan/akademi"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('kegiatan/akademi*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Kegiatan Akademi
                        </a>
                        <a href="/kegiatan/pembiasaan"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('kegiatan/pembiasaan*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Kegiatan Pembiasaan
                        </a>
                        <a href="/kegiatan/kemitraan"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('kegiatan/kemitraan*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Kemitraan
                        </a>
                    </div>
                </div>

                <!-- Mobile Ekskul Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium flex justify-between items-center {{ request()->is('ekskul*') ? 'text-green-300' : 'text-white' }}">
                        <span class="hover:text-green-300">Ekskul</span>
                        <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 py-2 space-y-1">
                        <a href="/ekskul/pramuka"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/pramuka*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Pramuka
                        </a>
                        <a href="/ekskul/seni-tari"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/seni-tari*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Seni Tari
                        </a>
                        <a href="/ekskul/seni-rupa"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/seni-rupa*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Seni Rupa
                        </a>
                        <a href="/ekskul/seni-teater"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/seni-teater*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Seni Teater
                        </a>
                        <a href="/ekskul/renang"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/renang*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Renang
                        </a>
                        <a href="/ekskul/bola-voli"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/bola-voli*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Bola Voli
                        </a>
                        <a href="/ekskul/tahfidz"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->is('ekskul/tahfidz*') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                            Tahfidz
                        </a>
                    </div>
                </div>

                <!-- Other menu items -->
                <a href="/prestasi"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('prestasi') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                    Prestasi
                </a>
                <a href="/ppdb"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('ppdb') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                    PPDB
                </a>
                <a href="/kekancan"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('kekancan') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                    Kekancan
                </a>
                <a href="/kritik-saran"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('kritik-saran') ? 'text-green-300' : 'text-white' }} hover:text-green-300">
                    Kritik Saran
                </a>
            </div>
        </div>
    </div>

    <!-- Backdrop overlay (removing click handler) -->
    <div x-show="mobileMenuOpen" class="fixed inset-0 w-screen h-screen md:hidden">
        <div class="absolute right-0 w-full h-full bg-black/50 backdrop-blur-xs transition-all"></div>
    </div>
</nav>

<!-- Make sure Alpine.js is included -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
