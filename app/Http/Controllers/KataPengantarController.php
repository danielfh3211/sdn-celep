<?php

namespace App\Http\Controllers;

use App\Models\KataPengantar;
use Illuminate\Http\Request;

class KataPengantarController extends Controller
{
    public function index()
    {
        $kataPengantar = KataPengantar::first();
        return view('pages.home.kata-pengantar', compact('kataPengantar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'content' => 'required'
        ]);

        KataPengantar::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $kataPengantar = KataPengantar::findOrFail($id);
        return response()->json($kataPengantar);
    }

    public function update(Request $request, $id)
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
}
