<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Gallery</title>

<style>

*{
box-sizing:border-box;
}

body{
font-family: Arial, sans-serif;
background:#FFD747;
padding:20px;
margin:0;
}

/* CARD */
.card{
background:white;
max-width:420px;
margin:auto;
padding:25px;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

/* TITLE */
h2{
text-align:center;
margin-bottom:20px;
color:#333;
}

/* LABEL */
label{
font-size:14px;
font-weight:bold;
display:block;
margin-bottom:5px;
}

/* INPUT */
input, textarea{
width:100%;
padding:10px;
margin-bottom:14px;
border-radius:6px;
border:1px solid #ddd;
font-size:14px;
}

/* IMAGE */
img{
border-radius:8px;
margin-bottom:12px;
max-width:100%;
}

/* BUTTON GROUP */
.btn-group{
display:flex;
gap:10px;
margin-top:10px;
}

/* UPDATE BUTTON */
.btn{
flex:1;
background:#FFD747;
color:#333;
border:none;
padding:11px;
border-radius:8px;
cursor:pointer;
font-weight:bold;
transition:0.3s;
}

.btn:hover{
background:#ffca1a;
}

/* CLOSE BUTTON */
.btn-close{
flex:1;
text-decoration:none;
background:#333;
color:white;
text-align:center;
padding:11px;
border-radius:8px;
font-weight:bold;
transition:0.3s;
}

.btn-close:hover{
background:#555;
}

/* RESPONSIVE */
@media(max-width:600px){

.card{
padding:20px;
}

h2{
font-size:20px;
}

.btn-group{
flex-direction:column;
}

}

</style>
</head>

<body>

<div class="card">

<h2>✏️ Edit Gallery</h2>

<form action="{{ route('admin.gallery.update', $gallery->id) }}" 
method="POST" 
enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Judul</label>
<input type="text" name="judul" value="{{ $gallery->judul }}" required>

<label>Gambar Sekarang</label>
<img src="{{ asset('storage/'.$gallery->gambar) }}" width="120">

<label>Ganti Gambar (Opsional)</label>
<input type="file" name="gambar">

<label>Deskripsi</label>
<textarea name="description" required>{{ $gallery->description }}</textarea>

<div class="btn-group">

<button type="submit" class="btn">
💾 Update
</button>

<a href="{{ route('admin.gallery.index') }}" class="btn-close">
Tutup
</a>

</div>

</form>

</div>

</body>
</html>

