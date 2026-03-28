@extends('admin.layouts.app')

@section('title', 'Pesan Kontak')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    <!-- HEADER -->
    <div class="mb-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-yellow-500">
            Pesan Masuk
        </h2>
    </div>

    @if(session('success'))
        <div class="bg-yellow-100 text-yellow-700 px-4 py-3 mb-6 rounded-xl shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full text-sm sm:text-base">

                <!-- HEADER -->
                <thead class="bg-yellow-500 text-white">
                    <tr>
                        <th class="px-6 py-4 border text-left rounded-tl-2xl">Nama</th>
                        <th class="px-6 py-4 border text-left">Email</th>
                        <th class="px-6 py-4 border text-left">Pesan</th>
                        <th class="px-6 py-4 border text-center rounded-tr-2xl w-32">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="text-gray-700">

                @forelse($contacts as $item)

                    @php $last = $loop->last; @endphp

                    <tr class="hover:bg-yellow-50 transition duration-200">

                        <!-- NAMA -->
                        <td class="px-6 py-4 border break-words {{ $last ? 'rounded-bl-2xl' : '' }}">
                            {{ $item->nama }}
                        </td>

                        <!-- EMAIL -->
                        <td class="px-6 py-4 border break-words">
                            {{ $item->email }}
                        </td>

                        <!-- PESAN -->
                        <td class="px-6 py-4 border break-words max-w-xs sm:max-w-md">
                            {{ \Illuminate\Support\Str::limit($item->pesan, 120) }}
                        </td>

                        <!-- AKSI -->
                        <td class="px-6 py-4 border text-center {{ $last ? 'rounded-br-2xl' : '' }}">

                            <form method="POST" action="{{ route('admin.kontak.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus pesan ini?')"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow text-sm transition"
                                >
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500 text-lg rounded-b-2xl">
                            Belum ada pesan masuk
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
