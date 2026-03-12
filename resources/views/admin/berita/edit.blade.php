@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">✏️ Edit Berita</h2>

    <form action="{{ route('admin.berita.update', $berita) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul</label>
            <input name="judul"
                   value="{{ $berita->judul }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Isi</label>
            <textarea name="isi"
                      rows="5"
                      class="w-full border p-2 rounded"
                      required>{{ $berita->isi }}</textarea>
        </div>

        @if ($berita->gambar)
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Gambar Saat Ini</label>
                <img src="{{ asset('storage/'.$berita->gambar) }}"
                     class="w-48 rounded">
            </div>
        @endif

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Ganti Gambar</label>
            <input type="file" name="gambar">
        </div>

        <div class="flex justify-end">
            <button class="px-4 py-2 bg-green-600 text-white rounded">
                🔄 Update
            </button>
        </div>
    </form>
</div>
@endsection
