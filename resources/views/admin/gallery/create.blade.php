<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Gallery</title>

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

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        .btn {
            width: 100%;
            background: #16a34a;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #15803d;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 12px;
            font-size: 13px;
            text-decoration: none;
            color: #2563eb;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 8px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="card">

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

    <button type="submit" class="btn">💾 Simpan</button>
</form>

<a href="{{ route('admin.gallery.index') }}" class="back">
    ← Kembali ke Gallery
</a>

</div>

</body>
</html>
