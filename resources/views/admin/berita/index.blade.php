@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <h3 class="mb-4">📰 Data Berita</h3>

    <div class="mb-3">
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            ➕ Tambah Berita
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="120">Gambar</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($beritas as $berita)
                    <tr>
                        <td>
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}"
                                     width="100"
                                     class="rounded">
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            <strong>{{ $berita->judul }}</strong>
                        </td>

                        <td>
                            {{ \Illuminate\Support\Str::limit($berita->isi, 80) }}
                        </td>

                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                               class="btn btn-sm btn-warning mb-1">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                                  method="POST"
                                  style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus data ini?')">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Belum ada data berita
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
