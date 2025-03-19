<footer class="max-w-[1500px] mx-auto ">
    <div class="sm:px-40 px-10 py-10 bg-white flex flex-col sm:flex-row sm:justify-between items-center gap-8 ">
        <div class="h-60 w-60 ">
            <img src="/assets/img/logo.png" alt="">
        </div>
        <div class="flex sm:flex-col gap-10 justify-start items-center">
            <a href="">
                <i class="fa-brands fa-youtube fa-2xl"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-instagram fa-2xl"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-square-facebook fa-2xl"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-tiktok fa-2xl"></i>
            </a>
        </div>
        <div class="flex flex-col gap-4">
            <a href="/profil"
                class="font-bold hover:text-green-300 {{ request()->is('profil') ? 'text-green-300' : 'text-black' }}">Profil</a>
            <a href="/kegiatan"
                class="font-bold hover:text-green-300 {{ request()->is('kegiatan') ? 'text-green-300' : 'text-black' }}">kegiatan</a>
            <a href="/ekskul"
                class="font-bold hover:text-green-300 {{ request()->is('ekskul') ? 'text-green-300' : 'text-black' }}">Ekstra
                Kurikuler</a>
            <a href="/prestasi"
                class="font-bold hover:text-green-300 {{ request()->is('prestasi') ? 'text-green-300' : 'text-black' }}">Prestasi</a>
            <a href="/kombel"
                class="font-bold hover:text-green-300 {{ request()->is('kombel') ? 'text-green-300' : 'text-black' }}">Kombel</a>
            <a href="/ppdb"
                class="font-bold hover:text-green-300 {{ request()->is('ppdb') ? 'text-green-300' : 'text-black' }}">PPDB</a>
        </div>
        <div>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="300" height="350" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=-7.522934712701035%2C+110.99567332062503&t=&z=17&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 350px;
                            width: 300px;
                        }
                    </style>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 350px;
                            width: 300px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center py-15">©copyright 2024 by admin_sdncelep 3</div>
</footer>
