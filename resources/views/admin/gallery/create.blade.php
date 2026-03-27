<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Gallery</title>

<style>

*{
box-sizing:border-box;
margin:0;
padding:0;
}

body{
font-family: Arial, sans-serif;
background:#FFD747;
padding:20px;
}

/* CARD */
.card{
background:#ffffff;
max-width:450px;
width:100%;
margin:40px auto;
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
input,
textarea{
width:100%;
padding:10px;
margin-bottom:14px;
border-radius:6px;
border:1px solid #ddd;
font-size:14px;
}

textarea{
resize:vertical;
min-height:100px;
}

/* ERROR */
.error{
background:#fee2e2;
color:#991b1b;
padding:10px;
border-radius:6px;
margin-bottom:15px;
font-size:13px;
}

/* BUTTON GROUP */
.btn-group{
display:flex;
gap:10px;
margin-top:10px;
}

/* SAVE BUTTON */
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
margin:20px auto;
padding:20px;
}

.btn-group{
flex-direction:column;
}

h2{
font-size:20px;
}

}

</style>
</head>

<body>

<div class="card">

<h2>📷 Tambah Gallery</h2>

{{-- TAMPILKAN ERROR --}}
@if ($errors->any())
<div class="error">
<ul>
@foreach ($errors->all() as $error)
<li>• {{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form 
action="{{ route('admin.gallery.store') }}" 
method="POST" 
enctype="multipart/form-data"
>

@csrf

<label>Judul</label>
<input type="text" name="judul" value="{{ old('judul') }}" required>

<label>Gambar</label>
<input type="file" name="gambar" required>

<label>Deskripsi</label>
<textarea name="description" required>{{ old('description') }}</textarea>

<div class="btn-group">

<button type="submit" class="btn">
💾 Simpan
</button>

<a href="{{ route('admin.gallery.index') }}" class="btn-close">
Tutup
</a>

</div>

</form>

</div>

</body>
</html>

