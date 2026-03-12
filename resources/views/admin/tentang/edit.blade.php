<!DOCTYPE html>
<html>
<head>
    <title>Edit Tentang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 60px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #444;
        }

        textarea,
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .preview {
            margin-bottom: 15px;
        }

        .preview img {
            width: 120px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background: #198754;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #157347;
        }

        .btn-back {
            text-decoration: none;
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-back:hover {
            background: #5c636a;
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
