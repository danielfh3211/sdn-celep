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

            <!-- Desktop Navigation (hidden on mobile) -->
            <div class="hidden md:flex md:items-center md:space-x-1 lg:space-x-2">
                <a href="/"
                    class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('/') ? 'text-green-300' : 'text-white' }}">
                    Home
                </a>

                <!-- Dropdown for Profil -->
                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button @click="open = !open"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 inline-flex items-center {{ request()->is('profil*') ? 'text-green-300' : 'text-white' }}">
                        <span>Profil</span>
                        <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition x-cloak
                        class="bg-[#212121] absolute mt-2 py-2 w-48 rounded-md shadow-lg z-20">
                        <!-- Add x-cloak to hide initially -->
                        <a href="/profil/visi-misi"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300  cursor-pointer">
                            <!-- Tambahkan cursor-pointer -->
                            Visi Misi Tujuan
                        </a>
                        <a href="/profil/profil-sekolah"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300  cursor-pointer">
                            <!-- Tambahkan cursor-pointer -->
                            Profil Sekolah
                        </a>
                        <a href="/profil/kepala-sekolah"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300  cursor-pointer">
                            Kepala Sekolah
                        </a>
                        <a href="/profil/guru-karyawan"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300  cursor-pointer">
                            Guru dan Karyawan
                        </a>
                        <a href="/profil/komite-sekolah"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300  cursor-pointer">
                            Komite Sekolah
                        </a>
                        <a href="/profil/sarana-prasarana"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300  cursor-pointer">
                            Sarana dan Prasarana
                        </a>
                    </div>
                </div>

                <!-- Dropdown for Kegiatan -->
                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button @click="open = !open"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 inline-flex items-center {{ request()->is('kegiatan*') ? 'text-green-300' : 'text-white' }}">
                        <span>Kegiatan</span>
                        <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="absolute  mt-2 py-2 w-48 rounded-md shadow-lg z-10"
                        style="background-color: #212121;">
                        <!-- Add dropdown items here -->
                        <a href="/kegiatan/akademi"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Kegiatan Akademi</a>
                        <a href="/kegiatan/pembiasaan"
                            class="block px-4 py-2 text-sm
                            text-white hover:text-green-300 ">Kegiatan
                            Pembiasaan</a>
                        <a href="/kegiatan/kemitraan"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Kemitraan</a>
                    </div>
                </div>

                <a href="/kombel"
                    class="px-3 py-2 text-sm font-medium hover:text-green-300 {{ request()->is('kombel') ? 'text-green-300' : 'text-white' }}">
                    Kombel
                </a>

                <!-- Dropdown for Ekskul -->
                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button @click="open = !open"
                        class="px-3 py-2 text-sm font-medium hover:text-green-300 inline-flex items-center {{ request()->is('ekskul*') ? 'text-green-300' : 'text-white' }}">
                        <span>Ekskul</span>
                        <svg :class="{ 'rotate-180': open }" class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="absolute  mt-2 py-2 w-48 rounded-md shadow-lg z-10"
                        style="background-color: #212121;">
                        <!-- Add dropdown items here -->
                        <a href="/ekskul/pramuka"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Pramuka
                        </a>
                        <a href="/ekskul/seni-tari"
                            class="block px-4 py-2 text-sm
                            text-white hover:text-green-300 ">Seni
                            Tari</a>
                        <a href="/ekskul/seni-rupa"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Seni
                            Rupa</a>
                        <a href="/ekskul/seni-teater"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Seni
                            Teater</a>
                        <a href="/ekskul/renang"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Renang</a>
                        <a href="/ekskul/bola-voli"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Bola Voli</a>
                        <a href="/ekskul/tahfidz"
                            class="block px-4 py-2 text-sm text-white hover:text-green-300 ">Tahfidz</a>
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
        x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 w-1/2 md:hidden transform z-10"
        style="background-color: #212121;">
        <div class="h-full overflow-y-auto">
            <!-- Add close button at the top -->
            <button @click="mobileMenuOpen = false"
                class="absolute top-4 right-4 p-2 text-white hover:text-green-300">

            </button>
            <div class="px-2 pt-8 pb-3 space-y-1 sm:px-3">
                <a href="/"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'text-green-300' : 'text-white' }} ">
                    Home
                </a>

                <!-- Mobile dropdown for Profil -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium {{ request()->is('profil*') ? 'text-green-300' : 'text-white' }}  flex justify-between items-center">
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
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300 ">Visi Misi
                            Tujuan</a>
                        <a href="/profil/profil-sekolah"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">Profil
                            Sekolah</a>
                        <a href="/profil/kepala-sekolah"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">Kepala
                            Sekolah</a>
                        <a href="/profil/guru-karyawan"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">Guru dan
                            Karyawan</a>
                        <a href="/profil/komite-sekolah"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">Komite
                            Sekolah</a>
                        <a href="/profil/sarana-prasarana"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">Sarana dan
                            Prasarana</a>
                    </div>
                </div>

                <!-- Mobile dropdown for Kegiatan -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium {{ request()->is('kegiatan*') ? 'text-green-300' : 'text-white' }}  flex justify-between items-center">
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
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Kegiatan Akademi
                        </a>
                        <a href="/kegiatan/pembiasaan"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Kegiatan Pembiasaan
                        </a>
                        <a href="/kegiatan/kemitraan"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Kemitraan
                        </a>
                    </div>
                </div>

                <a href="/kombel"
                    class="hover:text-green-300 block px-3 py-2 rounded-md text-base font-medium  {{ request()->is('kombel') ? 'text-green-300' : 'text-white' }} ">
                    Kombel
                </a>

                <!-- Mobile dropdown for Ekskul -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium {{ request()->is('ekskul*') ? 'text-green-300' : 'text-white' }}  flex justify-between items-center">
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
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Pramuka
                        </a>
                        <a href="/ekskul/seni-tari"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Seni Tari
                        </a>
                        <a href="/ekskul/seni-rupa"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Seni Rupa
                        </a>
                        <a href="/ekskul/seni-teater"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Seni Teater
                        </a>
                        <a href="/ekskul/renang"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Renang
                        </a>
                        <a href="/ekskul/bola-voli"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Bola Voli
                        </a>
                        <a href="/ekskul/tahfidz"
                            class="block px-3 py-2 rounded-md text-sm text-white hover:text-green-300">
                            Tahfidz
                        </a>
                    </div>
                </div>

                <a href="/prestasi"
                    class="hover:text-green-300 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('prestasi') ? 'text-green-300' : 'text-white' }} ">
                    Prestasi
                </a>

                <a href="/ppdb"
                    class="hover:text-green-300 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('ppdb') ? 'text-green-300' : 'text-white' }} ">
                    PPDB
                </a>

                <a href="/kekancan"
                    class="hover:text-green-300 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('kekancan') ? 'text-green-300' : 'text-white' }} ">
                    kekancan
                </a>

                <a href="/kritik-saran"
                    class="hover:text-green-300 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('kritik-saran') ? 'text-green-300' : 'text-white' }} ">
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
