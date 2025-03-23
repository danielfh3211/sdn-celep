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
            'email' => 'required|email', // Email harus valid
            'password' => 'required|min:8', // Password minimal 8 karakter
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('email', 'password');

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard jika login berhasil
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput(); // Mengembalikan input sebelumnya
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}