@extends('admin.layouts.app')

@section('title','Edit Berita')

@section('content')

<div class="p-6">

<div class="max-w-lg mx-auto bg-white rounded-xl shadow-lg p-8">

<h2 class="text-2xl font-bold text-gray-800 text-center mb-6">
Edit Data Berita
</h2>

<form action="{{ route('admin.berita.update',$berita->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<!-- JUDUL -->
<div class="mb-5">
<label class="block text-gray-700 font-semibold mb-2">
Judul
</label>

<input type="text"
name="judul"
value="{{ $berita->judul }}"
class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-400 outline-none"
required>
</div>


<!-- ISI -->
<div class="mb-5">
<label class="block text-gray-700 font-semibold mb-2">
Isi
</label>

<textarea name="isi"
rows="5"
class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-400 outline-none"
required>{{ $berita->isi }}</textarea>
</div>


<!-- GAMBAR -->
@if ($berita->gambar)

<div class="mb-5">

<label class="block text-gray-700 font-semibold mb-2">
Gambar Saat Ini
</label>

<img src="{{ asset('storage/'.$berita->gambar) }}"
class="w-40 rounded-lg shadow">

</div>

@endif


<!-- GANTI GAMBAR -->
<div class="mb-6">

<label class="block text-gray-700 font-semibold mb-2">
Ganti Gambar
</label>

<input type="file"
name="gambar"
class="w-full border border-gray-300 rounded-lg p-2">

</div>


<!-- BUTTON -->
<div class="flex justify-between">

<a href="{{ route('admin.berita.index') }}"
class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
Kembali
</a>

<button class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">
Update
</button>

</div>

</form>

</div>

</div>

@endsection