<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Response;

class SiswaController extends Controller
{
    public function dataNilai()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
    
        if (!$siswa) {
            dd('Data siswa tidak ditemukan untuk username: ' . $user->username);
        }
    
        $nilai = $siswa->nilai()->with('mataPelajaran')->get();
    
        return view('siswa.data-nilai', compact('siswa', 'nilai'));
    }
}
