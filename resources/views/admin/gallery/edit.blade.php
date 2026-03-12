<!DOCTYPE html>
<html>
<head>
    <title>Edit Gallery</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            padding: 30px;
        }

        .card {
            background: #ffffff;
            max-width: 420px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        img {
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .btn {
            width: 100%;
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 13px;
            text-decoration: none;
            color: #2563eb;
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

         <label>Gambar Sekarang</label><br>
        <img src="{{ asset('storage/'.$gallery->gambar) }}" width="100">

        <label>Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar">

        <label>Deskripsi</label>
        <textarea name="description" required>{{ $gallery->description }}</textarea>

       

        <button type="submit" class="btn">💾 Update</button>
    </form>

   <a href="{{ route('admin.gallery.index') }}" class="back">
    ← Kembali ke Gallery
</a>
</div>

</body>
</html>
