<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaUserController extends Controller
{
    public function index()
    {
        $headline = Berita::latest()->first();

        $berita = Berita::latest()
            ->where('id', '!=', optional($headline)->id)
            ->paginate(8); // ← SESUAI FOTO (4 x 2)

        return view('frontend.berita', compact('headline', 'berita'));
    }

    public function show(Berita $berita)
{
    return view('frontend.berita.show', compact('berita'));
}
   }