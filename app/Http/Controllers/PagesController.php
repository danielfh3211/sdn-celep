<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Kepsek;
use App\Models\KataPengantar;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function profil()
    {
        return view('pages.profil');
    }

    public function kegiatan()
    {
        return view('pages.kegiatan');
    }

    public function kombel()
    {
        return view('pages.kombel');
    }

    public function ekskul()
    {
        return view('pages.ekskul');
    }

    public function prestasi()
    {
        return view('pages.prestasi');
    }

    public function homeSlider()
    {
        $slides = SliderImage::where('is_active', true)
            ->orderBy('order')
            ->get();
        
        return view('pages.home.slider', compact('slides'));
    }

    public function storeSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048' // max:2048 = 2MB
        ], [
            'image.max' => 'The image size must not exceed 2MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.'
        ]);

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img/slider'), $filename);

        SliderImage::create([
            'image' => 'assets/img/slider/' . $filename,
            'order' => SliderImage::max('order') + 1
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }

    public function deleteSlider($id)
    {
        $slide = SliderImage::findOrFail($id);
        
        if (file_exists(public_path($slide->image))) {
            unlink(public_path($slide->image));
        }
        
        $slide->delete();

        return redirect()->back()->with('success', 'Image deleted successfully');
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // max:2048 = 2MB
        ], [
            'image.max' => 'The image size must not exceed 2MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.'
        ]);

        $slide = SliderImage::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image
            if (file_exists(public_path($slide->image))) {
                unlink(public_path($slide->image));
            }

            // Store new image
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/slider'), $filename);
            
            $slide->image = 'assets/img/slider/' . $filename;
            $slide->save();
        }

        return response()->json(['success' => true]);
    }

    public function homeKataPengantar()
    {
        return view('pages.home.kata-pengantar');
    }

    public function storeKataPengantar(Request $request)
    {
        // Implement kata pengantar creation logic
    }

    public function updateKataPengantar(Request $request)
    {
        // Implement kata pengantar update logic
    }

    public function kataPengantar()
    {
        $kataPengantar = KataPengantar::first();
        return view('pages.home.kata-pengantar', compact('kataPengantar'));
    }

    public function kataPengantarStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'content' => 'required'
        ]);

        KataPengantar::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function kataPengantarEdit($id)
    {
        $kataPengantar = KataPengantar::findOrFail($id);
        return response()->json($kataPengantar);
    }

    public function kataPengantarUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'content' => 'required'
        ]);

        $kataPengantar = KataPengantar::findOrFail($id);
        $kataPengantar->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    // Profile Management Methods
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
        $kepsek = Kepsek::first();
        return view('pages.profil.kepsek', compact('kepsek'));
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

        // Store new image
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img/kepsek'), $filename);

        Kepsek::create([
            'image' => 'assets/img/kepsek/' . $filename,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // max:2048 = 2MB
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'motivation' => 'required'
        ], [
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'image.mimes' => 'Format file harus JPG, JPEG, atau PNG',
        ]);

        $kepsek = Kepsek::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (file_exists(public_path($kepsek->image))) {
                unlink(public_path($kepsek->image));
            }

            // Store new image
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/kepsek'), $filename);
            
            $kepsek->image = 'assets/img/kepsek/' . $filename;
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
        
        // Delete image file
        if (file_exists(public_path($kepsek->image))) {
            unlink(public_path($kepsek->image));
        }
        
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
