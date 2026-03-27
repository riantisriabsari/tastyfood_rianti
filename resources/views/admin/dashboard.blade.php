@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')

<div class="p-6">

<!-- HEADER -->
<div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white p-6 rounded-xl shadow mb-8 flex justify-between items-center">

<div>
<h1 class="text-2xl font-bold">Dashboard Tasty Food</h1>
<p class="text-sm opacity-90">Panel admin untuk mengelola website Tasty Food</p>
</div>

<div class="text-right">
<p class="text-sm opacity-90">Tanggal</p>
<p class="font-semibold text-lg">{{ date('d F Y') }}</p>
</div>

</div>


<!-- CARD STATISTIK -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

<div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-400">
<p class="text-gray-500 text-sm">Total Berita</p>
<h2 class="text-3xl font-bold text-yellow-500">
{{ \App\Models\Berita::count() }}
</h2>
</div>

<div class="bg-white rounded-xl shadow p-5 border-l-4 border-orange-400">
<p class="text-gray-500 text-sm">Total Gallery</p>
<h2 class="text-3xl font-bold text-orange-500">
{{ \App\Models\Gallery::count() }}
</h2>
</div>

<div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-500">
<p class="text-gray-500 text-sm">Pesan Masuk</p>
<h2 class="text-3xl font-bold text-yellow-600">
{{ \App\Models\Contact::count() }}
</h2>
</div>

<div class="bg-white rounded-xl shadow p-5 border-l-4 border-orange-500">
<p class="text-gray-500 text-sm">Tentang</p>
<h2 class="text-3xl font-bold text-orange-600">
{{ \App\Models\Tentang::count() }}
</h2>
</div>

</div>
<!-- MENU CEPAT -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

<!-- Kelola Berita -->
<div class="bg-white rounded-xl shadow p-6 border-t-4 border-yellow-400">
<h3 class="font-bold text-lg mb-2">Kelola Berita</h3>

<p class="text-sm text-gray-500 mb-4">
Tambah dan edit berita website
</p>

<a href="{{ route('admin.berita.index') }}"
class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg">
Kelola
</a>
</div>


<!-- Kelola Gallery -->
<div class="bg-white rounded-xl shadow p-6 border-t-4 border-orange-400">
<h3 class="font-bold text-lg mb-2">Kelola Gallery</h3>

<p class="text-sm text-gray-500 mb-4">
Upload foto makanan dan kegiatan
</p>

<a href="{{ route('admin.gallery.index') }}"
class="inline-block bg-orange-400 hover:bg-orange-500 text-white text-sm px-4 py-2 rounded-lg">
Kelola
</a>
</div>


<!-- Pesan Pengunjung -->
<div class="bg-white rounded-xl shadow p-6 border-t-4 border-yellow-500">
<h3 class="font-bold text-lg mb-2">Kelola Tentang</h3>

<p class="text-sm text-gray-500 mb-4">
Lihat tentang pengunjung
</p>

<a href="{{ route('admin.tentang.index') }}"
class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-4 py-2 rounded-lg">
Kelola
</a>
</div>

</div>


<!-- PESAN TERBARU -->
<div class="bg-white rounded-xl shadow p-6">

<div class="flex justify-between mb-4">
<h3 class="font-bold">Pesan Terbaru 📞 </h3>

<a href="{{ route('admin.kontak.index') }}" 
class="text-yellow-500 font-semibold text-sm">
Lihat Semua →
</a>

</div>

<table class="w-full text-sm">

<thead class="border-b">
<tr class="text-gray-500">
<th class="py-2 text-left">Nama</th>
<th>Email</th>
<th>Pesan</th>
</tr>
</thead>

<tbody>

@foreach(\App\Models\Contact::latest()->take(5)->get() as $pesan)

<tr class="border-b hover:bg-gray-50">

<td class="py-3 font-medium">
{{ $pesan->nama }}
</td>

<td>
{{ $pesan->email }}
</td>

<td>
{{ Str::limit($pesan->pesan,40) }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection