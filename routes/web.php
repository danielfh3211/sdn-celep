<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomiteSekolahController;
use App\Http\Controllers\PPDBController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Route
Route::get('/', function () {
    return view('homepage');
});

// Profile Routes
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
        return view('profil.kepala-sekolah');
    });
    Route::get('/guru-karyawan', function () {
        return view('profil.guru-karyawan');
    });
    Route::get('/komite-sekolah', [KomiteSekolahController::class, 'index'])->name('profil.komite-sekolah');
    Route::get('/sarana-prasarana', function () {
        return view('profil.sarana-prasarana');
    });
});

// Kegiatan Routes
Route::prefix('kegiatan')->group(function () {
    Route::get('/', function () {
        return view('kegiatan');
    });
    Route::get('/akademi', function () {
        return view('kegiatan.akademi');
    });
    Route::get('/pembiasaan', function () {
        return view('kegiatan.pembiasaan');
    });
    Route::get('/kemitraan', function () {
        return view('kegiatan.kemitraan');
    });
});

// Kombel Route
Route::get('/kombel', function () {
    return view('kombel');
});

// Ekskul Routes
Route::prefix('ekskul')->group(function () {
    Route::get('/', function () {
        return view('ekskul');
    });
    Route::get('/pramuka', function () {
        return view('ekskul.pramuka');
    });
    Route::get('/seni-tari', function () {
        return view('ekskul.seni-tari');
    });
    Route::get('/seni-rupa', function () {
        return view('ekskul.seni-rupa');
    });
    Route::get('/seni-teater', function () {
        return view('ekskul.seni-teater');
    });
    Route::get('/renang', function () {
        return view('ekskul.renang');
    });
    Route::get('/bola-voli', function () {
        return view('ekskul.bola-voli');
    });
    Route::get('/tahfidz', function () {
        return view('ekskul.tahfidz');
    });
});

// Other Routes
Route::get('/prestasi', function () {
    return view('prestasi');
});

Route::get('/ppdb', [PPDBController::class, 'index'])->name('ppdb');

Route::get('/kekancan', function () {
    return view('kekancan');
});

Route::get('/kritik-saran', function () {
    return view('kritik-saran');
});
