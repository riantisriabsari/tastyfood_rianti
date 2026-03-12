@extends('admin.layouts.app')

@section('title', 'Data Tentang')

@section('content')
<div class="p-6">

    <h2 class="text-lg font-semibold mb-4">Data Tentang</h2>

    <a href="{{ route('admin.tentang.create') }}"
       class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded text-sm">
        + Tambah Data
    </a>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Section</th>
                    <th class="border px-3 py-2">Deskripsi</th>
                    <th class="border px-3 py-2">Gambar</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($tentangs as $index => $tentang)
                <tr>
                    <td class="border px-3 py-2 text-center">
                        {{ $index + 1 }}
                    </td>

                    <td class="border px-3 py-2">
                        {{ $tentang->section }}
                    </td>

                    <td class="border px-3 py-2">
                        {{ $tentang->deskripsi }}
                    </td>

<td class="border px-3 py-2">
    <div class="w-20 h-20 bg-gray-200 rounded overflow-hidden mx-auto flex items-center justify-center">
        <img src="{{ asset('storage/' . $tentang->gambar) }}"
             class="w-full h-full object-cover">
    </div>
</td>


                    <td class="border px-3 py-2 text-center">
                        <a href="{{ route('admin.tentang.edit', $tentang->id) }}"
                           class="text-blue-600 hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.tentang.destroy', $tentang->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline ml-2">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        Data belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
