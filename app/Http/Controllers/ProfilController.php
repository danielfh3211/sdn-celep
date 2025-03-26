<?php

namespace App\Http\Controllers;

use App\Models\Kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        return view('pages.profil.visi-misi');
    }

    public function sekolah()
    {
        return view('pages.profil.sekolah');
    }

    public function kepsek()
    {
        $kepseks = Kepsek::all();
        return view('pages.profil.kepsek', compact('kepseks'));
    }

    public function kepsekEdit($id)
    {
        $kepsek = Kepsek::findOrFail($id);
        return response()->json($kepsek);
    }

    public function kepsekStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'motivation' => 'required'
        ]);

        $image = $request->file('image')->store('profile/kepsek', 'public');

        Kepsek::create([
            'image' => $image,
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'motivation' => $request->motivation
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function kepsekUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'motivation' => 'required'
        ]);

        $kepsek = Kepsek::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($kepsek->image);
            $image = $request->file('image')->store('profile/kepsek', 'public');
            $kepsek->image = $image;
        }

        $kepsek->update([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'motivation' => $request->motivation
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function kepsekDestroy($id)
    {
        $kepsek = Kepsek::findOrFail($id);
        Storage::disk('public')->delete($kepsek->image);
        $kepsek->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function guruKaryawan()
    {
        return view('pages.profil.guru-karyawan');
    }

    public function komite()
    {
        return view('pages.profil.komite');
    }

    public function sarpras()
    {
        return view('pages.profil.sarpras');
    }
}
