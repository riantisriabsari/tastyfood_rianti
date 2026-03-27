<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'description' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        $gambar = $request->file('gambar')->store('gallery', 'public');

        Gallery::create([
            'judul' => $request->judul,
            'description' => $request->description,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul' => 'required',
            'description' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        // kalau upload gambar baru
        if ($request->hasFile('gambar')) {
            if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
                Storage::disk('public')->delete($gallery->gambar);
            }

            $gallery->gambar = $request->file('gambar')->store('gallery', 'public');
        }

        $gallery->update([
            'judul' => $request->judul,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Data berhasil diupdate');
    }

    
    public function destroy(Gallery $gallery)
    {
        if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
