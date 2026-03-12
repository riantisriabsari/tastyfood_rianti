@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Total Pesan -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Total Pesan</h2>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\Contact::count() }}</p>
            </div>
            <a href="{{ route('admin.kontak.index') }}" 
               class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded">
               Kelola
            </a>
        </div>

        <!-- Total Gallery -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Total Gallery</h2>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\Gallery::count() }}</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" 
               class="mt-4 inline-block bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded">
               Kelola
            </a>
        </div>

        <!-- Total Berita -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Total Berita</h2>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\Berita::count() }}</p>
            </div>
            <a href="{{ route('admin.berita.index') }}" 
               class="mt-4 inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-4 py-2 rounded">
               Kelola
            </a>
        </div>

        <!-- Total Tentang -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <div>
                <h2 class="text-gray-500 text-sm">Total Tentang</h2>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\Tentang::count() }}</p>
            </div>
            <a href="{{ route('admin.tentang.index') }}" 
               class="mt-4 inline-block bg-purple-500 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded">
               Kelola
            </a>
        </div>

    </div>
</div>
@endsection