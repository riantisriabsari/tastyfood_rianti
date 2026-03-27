<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Tentang</title>

<style>

*{
box-sizing:border-box;
}

body{
    font-family: Arial, sans-serif;
    background:#FFD747;
    margin:0;
    padding:20px;
}

/* CONTAINER */
.container{
    max-width:500px;
    width:100%;
    margin:70px auto;
    background:white;
    padding:35px;
    border-radius:12px;
    box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

/* TITLE */
h1{
    text-align:center;
    margin-bottom:30px;
    color:#333;
}

/* LABEL */
label{
    font-weight:bold;
    color:#444;
    display:block;
    margin-bottom:6px;
}

/* INPUT */
textarea,
select,
input[type="file"]{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:6px;
    margin-bottom:18px;
    font-size:14px;
}

textarea{
    resize:vertical;
}

/* IMAGE PREVIEW */
.preview{
    margin-bottom:15px;
}

.preview img{
    width:130px;
    max-width:100%;
    border-radius:8px;
    border:2px solid #eee;
}

/* BUTTON GROUP */
.btn-group{
    display:flex;
    justify-content:space-between;
    gap:10px;
    margin-top:25px;
}

/* BUTTON UPDATE */
button{
    background:#FFD747;
    color:#333;
    border:none;
    padding:12px 24px;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#ffca1a;
}

/* BUTTON BACK */
.btn-back{
    text-decoration:none;
    background:#333;
    color:white;
    padding:12px 24px;
    border-radius:8px;
    font-weight:bold;
    transition:0.3s;
}

.btn-back:hover{
    background:#555;
}

/* RESPONSIVE */
@media (max-width:600px){

.container{
    margin:30px auto;
    padding:25px;
}

h1{
    font-size:22px;
}

.btn-group{
    flex-direction:column;
}

button,
.btn-back{
    width:100%;
    text-align:center;
}

}

</style>
</head>

<body>

<div class="container">

<h1>Edit Data Tentang</h1>

<form action="{{ route('admin.tentang.update', $tentang->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Section</label>
<select name="section" required>
<option value="tasty_food" {{ $tentang->section == 'tasty_food' ? 'selected' : '' }}>Tasty Food</option>
<option value="visi" {{ $tentang->section == 'visi' ? 'selected' : '' }}>Visi</option>
<option value="misi" {{ $tentang->section == 'misi' ? 'selected' : '' }}>Misi</option>
</select>

<label>Deskripsi</label>
<textarea name="deskripsi" rows="5" required>{{ $tentang->deskripsi }}</textarea>

<label>Foto</label>

@if ($tentang->gambar)
<div class="preview">
<img src="{{ asset('storage/' . $tentang->gambar) }}">
</div>
@endif

<input type="file" name="gambar">

<div class="btn-group">
<button type="submit">💾 Update</button>
<a href="{{ route('admin.tentang.index') }}" class="btn-back">⬅ Kembali</a>
</div>

</form>

</div>

</body>
</html>

