@extends('admin.layouts.app')

@section('title', 'Pesan Kontak')

@section('content')
<div class="p-4 md:p-6">

    <h1 class="text-xl md:text-2xl font-bold mb-6 text-yellow-500">
        Pesan Masuk
    </h1>

    @if(session('success'))
        <div class="bg-yellow-100 text-yellow-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-lg shadow text-sm md:text-base">

            <thead class="bg-yellow-400 text-white">
                <tr>
                    <th class="p-2 md:p-3 border text-left">Nama</th>
                    <th class="p-2 md:p-3 border text-left">Email</th>
                    <th class="p-2 md:p-3 border text-left">Pesan</th>
                    <th class="p-2 md:p-3 border w-28 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($contacts as $item)

                    <tr class="hover:bg-yellow-50 transition">

                        <td class="p-2 md:p-3 border break-words">
                            {{ $item->nama }}
                        </td>

                        <td class="p-2 md:p-3 border break-words">
                            {{ $item->email }}
                        </td>

                        <td class="p-2 md:p-3 border break-words max-w-xs">
                            {{ $item->pesan }}
                        </td>

                        <td class="p-2 md:p-3 border text-center">

                            <form method="POST" action="{{ route('admin.kontak.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus pesan ini?')"
                                    class="bg-red-500 hover:bg-red-500 text-white px-3 py-1 rounded transition text-sm"
                                >
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center p-4 text-gray-500">
                            Belum ada pesan masuk
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>
@endsection

