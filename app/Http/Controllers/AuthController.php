<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required', // NIP/NIS
            'password' => 'required|min:8',
            'role' => 'required|in:siswa,guru,admin', // Role harus siswa atau guru atau admin
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('username', 'password');

        // Tambahkan kondisi role
        $credentials['role'] = $request->role;

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard jika login berhasil
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username, password, atau role salah.',
        ])->withInput(); // Mengembalikan input sebelumnya
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}