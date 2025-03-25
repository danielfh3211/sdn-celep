<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexSiswa()
    {
        $users = User::where('role', 'siswa')->paginate(10); // Pagination 10 data per halaman
        return view('users.siswa', compact('users'));
    }

    public function indexGuru()
    {
        $users = User::where('role', 'guru')->paginate(10); // Pagination 10 data per halaman
        return view('users.guru', compact('users'));
    }

    public function indexAdmin()
    {
        $users = User::where('role', 'admin')->paginate(10); // Pagination 10 data per halaman
        return view('users.admin', compact('users'));
    }

    public function create(Request $request)
    {
        $role = $request->query('role'); // Ambil role dari query string
        return view('users.create', compact('role'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|string',
        ]);

        // Simpan data ke database
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('users.' . $request->role)->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('users.edit', compact('user')); // Kirim data user ke view
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id, // Validasi untuk kolom username
            'role' => 'required|in:siswa,guru,admin',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username, // Perbarui kolom username
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('users.' . $user->role)->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with(['success' => 'User berhasil dihapus.', 'alert-type' => 'danger']);
    }
}