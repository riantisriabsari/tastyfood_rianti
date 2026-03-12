@extends('admin.layouts.app')


@section('title', 'Gallery')


@section('content')


<style>
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 18px;
    }


    .card {
        background: white;
        border-radius: 16px;
        padding: 12px;
        transition: 0.2s;
        display: flex;
        flex-direction: column;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    }


    .card:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 28px rgba(0,0,0,0.15);
    }


    .card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
    }


    .title {
        font-weight: 600;
        margin-top: 10px;
        font-size: 15px;
    }


    .desc {
        font-size: 13px;
        color: #6b7280;
        margin: 6px 0 14px;
        flex: 1;
    }


    .actions {
        display: flex;
        gap: 8px;
    }


    .btn-edit {
        flex: 1;
        background: #22c55e;
        color: white;
        border-radius: 20px;
        text-align: center;
        font-size: 12px;
        padding: 7px;
        text-decoration: none;
        font-weight: 600;
    }


    .btn-delete {
        flex: 1;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 20px;
        font-size: 12px;
        padding: 7px;
        font-weight: 600;
    }
</style>


{{-- HEADER --}}
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">📷 Gallery</h2>


    <a href="{{ route('admin.gallery.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">
        ➕ Tambah Foto
    </a>
</div>


{{-- EMPTY --}}
@if($galleries->count() === 0)
    <p class="text-gray-500">Belum ada data gallery.</p>
@endif


{{-- GRID --}}
<div class="gallery">
    @foreach($galleries as $g)
        <div class="card">
            <img src="{{ asset('storage/'.$g->gambar) }}" alt="">


            <div class="title">{{ $g->judul }}</div>
            <div class="desc">{{ $g->description }}</div>


            <div class="actions">
                <a href="{{ route('admin.gallery.edit', $g->id) }}"
                   class="btn-edit">✏️ Edit</a>


                <form action="{{ route('admin.gallery.destroy', $g->id) }}"
                      method="POST"
                      onsubmit="return confirm('Hapus data?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">🗑️ Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>


@endsection
