<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Tentang;
use App\Models\Gallery;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BeritaUserController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\TentangController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', function () { 
$tentangs = Tentang::all();
return view('frontend.tentang', compact('tentangs'));
})->name('tentang');

Route::get('/gallery', function () {
    $galleries = Gallery::latest()->paginate(8);
    return view('frontend.gallery', compact('galleries'));
})->name('gallery');


Route::get('/berita', [BeritaUserController::class, 'index'])
    ->name('berita.user');

Route::get('/berita/{id}', fn ($id) =>
    view('frontend.berita-detail', compact('id'))
);

Route::get('/kontak', fn () => view('frontend.kontak'))->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

/*
|--------------------------------------------------------------------------
| DASHBOARD (BREEZE)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', fn () => redirect('/admin'))
    ->middleware('auth')
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');

Route::resource('berita', BeritaController::class)
    ->parameters([
        'berita' => 'berita'
    ]);
        Route::resource('gallery', AdminGalleryController::class);
Route::resource('tentang', TentangController::class);

        Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
        Route::delete('/kontak/{id}', [ContactController::class, 'destroy'])->name('kontak.destroy');

        Route::post('/logout', function () {
            Auth::logout();
            return redirect('/');
        })->name('logout');
    });

require __DIR__.'/auth.php';
