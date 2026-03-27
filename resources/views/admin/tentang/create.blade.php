<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Tentang</title>

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
    max-width:520px;
    width:100%;
    margin:60px auto;
    background:#ffffff;
    padding:35px;
    border-radius:12px;
    box-shadow:0 15px 40px rgba(0,0,0,0.15);
}

/* TITLE */
h1{
    text-align:center;
    margin-bottom:30px;
    color:#333;
}

/* LABEL */
label{
    font-weight:600;
    color:#444;
    display:block;
    margin-bottom:6px;
}

/* INPUT */
textarea,
select,
input[type="file"]{
    width:100%;
    padding:12px;
    margin-bottom:18px;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
    transition:0.2s;
}

textarea{
    resize:vertical;
}

/* INPUT FOCUS */
textarea:focus,
select:focus,
input:focus{
    outline:none;
    border-color:#FFD747;
    box-shadow:0 0 0 3px rgba(255,215,71,0.3);
}

/* BUTTON GROUP */
.btn-group{
    display:flex;
    justify-content:space-between;
    gap:10px;
    margin-top:25px;
}

/* BUTTON SIMPAN */
button{
    background:#FFD747;
    color:#333;
    border:none;
    padding:12px 22px;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
    flex:1;
    transition:0.3s;
}

button:hover{
    background:#ffc107;
}

/* BUTTON BACK */
.btn-back{
    text-decoration:none;
    background:#333;
    color:white;
    padding:12px 22px;
    border-radius:8px;
    font-weight:bold;
    text-align:center;
    flex:1;
    transition:0.3s;
}

.btn-back:hover{
    background:#555;
}

/* RESPONSIVE */
@media(max-width:600px){

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

}

</style>
</head>

<body>

<div class="container">

<h1>Tambah Data Tentang</h1>

<form action="{{ route('admin.tentang.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<label>Section</label>
<select name="section" required>
<option value="">-- Pilih Section --</option>
<option value="tasty_food">Tasty Food</option>
<option value="visi">Visi</option>
<option value="misi">Misi</option>
</select>

<label>Deskripsi</label>
<textarea name="deskripsi" rows="5" required></textarea>

<label>Foto</label>
<input type="file" name="gambar">

<div class="btn-group">
<button type="submit">💾 Simpan</button>
<a href="{{ route('admin.tentang.index') }}" class="btn-back">⬅ Kembali</a>
</div>

</form>

</div>

</body>
</html>

