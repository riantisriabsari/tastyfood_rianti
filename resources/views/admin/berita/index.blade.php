@extends('admin.layouts.app')

@section('title', 'Data Berita')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <h2 class="text-2xl sm:text-3xl font-bold text-yellow-500">
            Data Berita
        </h2>

        <a href="{{ route('admin.berita.create') }}"
           class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-xl shadow transition text-sm sm:text-base">
            + Tambah Berita
        </a>

    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200">

        <div class="overflow-x-auto">

            <table class="min-w-full text-base">

                <!-- HEADER TABLE -->
                <thead class="bg-yellow-500 text-white text-sm sm:text-base">
                    <tr>
                        <th class="px-6 py-4 border text-center">No</th>
                        <th class="px-6 py-4 border text-center">Gambar</th>
                        <th class="px-6 py-4 border text-left">Judul</th>
                        <th class="px-6 py-4 border text-left">Isi</th>
                        <th class="px-6 py-4 border text-center">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="text-gray-700">

                @forelse ($beritas as $index => $berita)

                <tr class="hover:bg-yellow-50 transition">

                    <!-- NO -->
                    <td class="px-6 py-4 border text-center font-medium">
                        {{ $index + 1 }}
                    </td>

                    <!-- GAMBAR -->
                    <td class="px-6 py-4 border">
                        <div class="w-24 h-24 mx-auto rounded-xl overflow-hidden shadow bg-gray-100">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}"
                                     class="w-full h-full object-cover">
                            @else
                                -
                            @endif
                        </div>
                    </td>

                    <!-- JUDUL -->
                    <td class="px-6 py-4 border font-semibold">
                        {{ $berita->judul }}
                    </td>

                    <!-- ISI -->
                    <td class="px-6 py-4 border text-gray-600 max-w-md leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4 border">

                        <div class="flex justify-center gap-3 flex-wrap">

                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow text-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow text-sm">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center py-10 text-gray-500 text-lg">
                        Data berita belum tersedia
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
