<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:20480'
        ]);

        // DEFAULT GAMBAR
        $gambar = 'berita/default.png';

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil disimpan');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:20480'
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && $berita->gambar !== 'berita/default.png') {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $berita->gambar
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && $berita->gambar !== 'berita/default.png') {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return back()->with('success', 'Berita dihapus');
    }
}
