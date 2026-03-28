@extends('admin.layouts.app')

@section('title', 'Data Tentang')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <h2 class="text-2xl sm:text-3xl font-bold text-yellow-500">
            Data Tentang
        </h2>

        <a href="{{ route('admin.tentang.create') }}"
           class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-xl shadow transition text-sm sm:text-base">
            + Tambah Data
        </a>

    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full text-sm sm:text-base">

                <!-- HEADER TABLE -->
                <thead class="bg-yellow-500 text-white">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 border text-center w-16">No</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 border text-left">Section</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 border text-left">Deskripsi</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 border text-center">Gambar</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 border text-center w-40">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="text-gray-700">

                    @forelse ($tentangs as $index => $tentang)

                    <tr class="hover:bg-yellow-50 transition duration-200">

                        <!-- NO -->
                        <td class="px-4 sm:px-6 py-4 border text-center font-medium">
                            {{ $index + 1 }}
                        </td>

                        <!-- SECTION -->
                        <td class="px-4 sm:px-6 py-4 border font-semibold">
                            {{ $tentang->section }}
                        </td>

                        <!-- DESKRIPSI -->
                        <td class="px-4 sm:px-6 py-4 border text-gray-600 max-w-xs sm:max-w-md leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($tentang->deskripsi, 100) }}
                        </td>

                        <!-- GAMBAR -->
                        <td class="px-4 sm:px-6 py-4 border">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-xl overflow-hidden shadow bg-gray-100">
                                @if ($tentang->gambar)
                                    <img src="{{ asset('storage/' . $tentang->gambar) }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </div>
                        </td>

                        <!-- AKSI -->
                        <td class="px-4 sm:px-6 py-4 border">
                            <div class="flex justify-center gap-2 sm:gap-3 flex-wrap">

                                <a href="{{ route('admin.tentang.edit', $tentang->id) }}"
                                   class="px-3 sm:px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow text-xs sm:text-sm transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.tentang.destroy', $tentang->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 sm:px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow text-xs sm:text-sm transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-500 text-lg">
                            Data belum tersedia
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection