<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function index()
    {
        $tentangs = Tentang::orderBy('section')->get();
        return view('admin.tentang.index', compact('tentangs'));
    }

    public function create()
    {
        return view('admin.tentang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section'   => 'required|in:tasty_food,visi,misi',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->only(['section', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        Tentang::create($data);

        return redirect()
            ->route('admin.tentang.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Tentang $tentang)
    {
        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
        $request->validate([
            'section'   => 'required|in:tasty_food,visi,misi',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->only(['section', 'deskripsi']);

        if ($request->hasFile('gambar')) {

            if ($tentang->gambar) {
                Storage::disk('public')->delete($tentang->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        $tentang->update($data);

        return redirect()
            ->route('admin.tentang.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Tentang $tentang)
    {
        if ($tentang->gambar) {
            Storage::disk('public')->delete($tentang->gambar);
        }

        $tentang->delete();

        return redirect()
            ->route('admin.tentang.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
