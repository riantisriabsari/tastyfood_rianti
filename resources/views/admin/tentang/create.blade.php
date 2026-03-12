<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tentang</title>

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

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #0b5ed7;
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
