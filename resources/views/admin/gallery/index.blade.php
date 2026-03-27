
@extends('admin.layouts.app')


@section('title', 'Gallery')


@section('content')


<style>

.gallery{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    gap:20px;
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

.card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 28px rgba(0,0,0,0.15);
}

/* IMAGE */
.card img{
    width:100%;
    height:170px;
    object-fit:cover;
    border-radius:12px;
}

/* TITLE */
.title{
    font-weight:600;
    margin-top:10px;
    font-size:15px;
}

/* DESCRIPTION */
.desc{
    font-size:13px;
    color:#6b7280;
    margin:6px 0 14px;
    flex:1;
}

/* ACTION BUTTON */
.actions{
    display:flex;
    gap:8px;
}

/* EDIT BUTTON */
.btn-edit{
    flex:1;
    background:#facc15;
    color:white;
    border-radius:20px;
    text-align:center;
    font-size:12px;
    padding:7px;
    text-decoration:none;
    font-weight:600;
    transition:0.2s;
}

.btn-edit:hover{
    background:#eab308;
}

/* DELETE BUTTON */
.btn-delete{
    flex:1;
    background:#ef4444;
    color:white;
    border:none;
    border-radius:20px;
    font-size:12px;
    padding:7px;
    font-weight:600;
    cursor:pointer;
}

.btn-delete:hover{
    background:#dc2626;
}

/* RESPONSIVE */
@media (max-width:768px){

.gallery{
    grid-template-columns:repeat(auto-fill,minmax(160px,1fr));
}

.card img{
    height:140px;
}

.title{
    font-size:14px;
}

.desc{
    font-size:12px;
}

}

</style>


{{-- HEADER --}}
<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3 mb-6">

    <h2 class="text-xl md:text-2xl font-bold text-yellow-500">
        📷 Gallery
    </h2>

    <a href="{{ route('admin.gallery.create') }}"
       class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg shadow transition">
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
class="btn-edit">
✏️ Edit
</a>

<form action="{{ route('admin.gallery.destroy', $g->id) }}"
method="POST"
onsubmit="return confirm('Hapus data?')">

@csrf
@method('DELETE')

<button class="btn-delete">
🗑️ Hapus
</button>

</form>

</div>

</div>

@endforeach

</div>

@endsection
