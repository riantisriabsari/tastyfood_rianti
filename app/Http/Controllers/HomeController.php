<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(5)->get();
        $galleries = Gallery::latest()->take(6)->get();

        return view('frontend.home', compact('beritas', 'galleries'));
    }
}
