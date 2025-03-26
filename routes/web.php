<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomiteSekolahController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
<<<<<<< HEAD
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\SiswaController;
=======
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Models\Kepsek;
>>>>>>> 81270828faee1012df870654b0551cc3824d0137

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin & Guru Routes
    Route::prefix('pages')->name('pages.')->middleware(['role:admin,guru'])->group(function () {
        // Home Management
        Route::prefix('home')->name('home.')->group(function () {
            Route::get('/', [PagesController::class, 'home'])->name('index');
            
            // Slider Management
            Route::get('/slider', [PagesController::class, 'homeSlider'])->name('slider');
            Route::post('/slider', [PagesController::class, 'storeSlider'])->name('slider.store');
            Route::delete('/slider/{id}', [PagesController::class, 'deleteSlider'])->name('slider.delete');
            Route::put('/slider/{id}', [PagesController::class, 'updateSlider'])->name('slider.update');
            
            // Kata Pengantar Management
            Route::get('/kata-pengantar', [PagesController::class, 'kataPengantar'])->name('kata-pengantar');
            Route::post('/kata-pengantar', [PagesController::class, 'kataPengantarStore'])->name('kata-pengantar.store');
            Route::get('/kata-pengantar/{id}/edit', [PagesController::class, 'kataPengantarEdit'])->name('kata-pengantar.edit');
            Route::put('/kata-pengantar/{id}', [PagesController::class, 'kataPengantarUpdate'])->name('kata-pengantar.update');
        });

        // Profile Management
        Route::prefix('profil')->name('profil.')->group(function () {
            Route::get('/', [PagesController::class, 'profil'])->name('index');
            Route::get('/kepsek', [PagesController::class, 'kepsek'])->name('kepsek');
            Route::get('/kepsek/{id}/edit', [PagesController::class, 'kepsekEdit'])->name('kepsek.edit');
            Route::put('/kepsek/{id}', [PagesController::class, 'kepsekUpdate'])->name('kepsek.update');
            Route::get('/visi-misi', [PagesController::class, 'visiMisi'])->name('visi-misi');
            Route::get('/sekolah', [PagesController::class, 'sekolah'])->name('sekolah');
            Route::get('/guru-karyawan', [PagesController::class, 'guruKaryawan'])->name('guru-karyawan');
            Route::get('/komite', [PagesController::class, 'komite'])->name('komite');
            Route::get('/sarana-prasarana', [PagesController::class, 'sarpras'])->name('sarpras');
        });

        // Other Pages Management
        Route::get('/kegiatan', [PagesController::class, 'kegiatan'])->name('kegiatan');
        Route::get('/kombel', [PagesController::class, 'kombel'])->name('kombel');
        Route::get('/ekskul', [PagesController::class, 'ekskul'])->name('ekskul');
        Route::get('/prestasi', [PagesController::class, 'prestasi'])->name('prestasi');
    });

    // Admin Only Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/siswa', [UserController::class, 'indexSiswa'])->name('siswa');
            Route::get('/guru', [UserController::class, 'indexGuru'])->name('guru');
            Route::get('/admin', [UserController::class, 'indexAdmin'])->name('admin');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });
    });
});

// Public Content Routes
Route::prefix('profil')->group(function () {
    Route::get('/', function () {
        return view('profil');
    });
    Route::get('/profil-sekolah', function () {
        return view('profil.sekolah');
    });
    Route::get('/visi-misi', function () {
        return view('profil.visi-misi');
    });
    Route::get('/kepala-sekolah', function () {
        $kepsek = Kepsek::first();
        return view('profil.kepala-sekolah', compact('kepsek'));
    })->name('profil.kepala-sekolah');
    Route::get('/guru-karyawan', function () {
        return view('profil.guru-karyawan');
    });
    Route::get('/komite-sekolah', [KomiteSekolahController::class, 'index'])->name('profil.komite-sekolah');
    Route::get('/sarana-prasarana', function () {
        return view('profil.sarana-prasarana');
    });
});

// Other Public Routes
Route::get('/ppdb', [PPDBController::class, 'index'])->name('ppdb');
Route::get('/kekancan', function () {
    return view('kekancan');
});
Route::get('/kritik-saran', function () {
    return view('kritik-saran');
});

<<<<<<< HEAD
// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Dashboard (hanya untuk pengguna yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/siswa', [UserController::class, 'indexSiswa'])->name('users.siswa');
            Route::get('/guru', [UserController::class, 'indexGuru'])->name('users.guru');
            Route::get('/admin', [UserController::class, 'indexAdmin'])->name('users.admin');

            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
        });
    });

    Route::prefix('akademik')->group(function () {
        Route::get('/data-siswa', [AkademikController::class, 'dataSiswa'])->name('akademik.data-siswa');
        Route::post('/data-siswa', [AkademikController::class, 'storeSiswa'])->name('akademik.store-siswa');
        Route::put('/data-siswa/{id}', [AkademikController::class, 'updateSiswa'])->name('akademik.update-siswa');
        Route::delete('/data-siswa/{id}', [AkademikController::class, 'deleteSiswa'])->name('akademik.delete-siswa');

        Route::get('/data-kelas', [AkademikController::class, 'dataKelas'])->name('akademik.data-kelas');
        Route::post('/data-kelas', [AkademikController::class, 'storeKelas'])->name('akademik.store-kelas');
        Route::put('/data-kelas/{id}', [AkademikController::class, 'updateKelas'])->name('akademik.update-kelas');
        Route::delete('/data-kelas/{id}', [AkademikController::class, 'deleteKelas'])->name('akademik.delete-kelas');

        Route::get('/mata-pelajaran', [AkademikController::class, 'mataPelajaran'])->name('akademik.mata-pelajaran');
        Route::post('/mata-pelajaran', [AkademikController::class, 'storeMapel'])->name('akademik.store-mapel');
        Route::put('/mata-pelajaran/{id}', [AkademikController::class, 'updateMapel'])->name('akademik.update-mapel');
        Route::delete('/mata-pelajaran/{id}', [AkademikController::class, 'deleteMapel'])->name('akademik.delete-mapel');

        Route::get('/naik-kelas', [AkademikController::class, 'naikKelas'])->name('akademik.naik-kelas');
        Route::post('/naik-kelas-proses', [AkademikController::class, 'naikKelasProses'])->name('akademik.naik-kelas-proses');
        
        Route::get('/pilih-siswa-input-nilai', [AkademikController::class, 'pilihSiswaInputNilai'])->name('akademik.pilih-siswa-input-nilai');
        Route::get('/input-nilai/{id}', [AkademikController::class, 'inputNilai'])->name('akademik.input-nilai');
        Route::get('/data-nilai', [AkademikController::class, 'dataNilai'])->name('akademik.data-nilai');
        Route::post('/data-nilai', [AkademikController::class, 'storeNilai'])->name('akademik.store-nilai');
        
        Route::get('/pilih-siswa', [AkademikController::class, 'pilihSiswa'])->name('akademik.pilih-siswa');
        Route::get('/nilai-siswa/{id}', [AkademikController::class, 'nilaiSiswa'])->name('akademik.nilai-siswa');
        Route::delete('/nilai/{id}', [AkademikController::class, 'deleteNilai'])->name('akademik.delete-nilai');
        Route::get('/download-nilai', [AkademikController::class, 'downloadNilai'])->name('akademik.download-nilai');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/data-nilai', [SiswaController::class, 'dataNilai'])
            ->name('siswa.data-nilai');
    });
    
});



=======
>>>>>>> 81270828faee1012df870654b0551cc3824d0137
