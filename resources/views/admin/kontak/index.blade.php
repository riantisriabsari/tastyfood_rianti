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

    <!-- GRID CARD -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($contacts as $item)

        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-5 flex flex-col justify-between hover:shadow-xl transition">

            <!-- TOP -->
            <div>

                <!-- NAMA -->
                <h3 class="text-lg font-bold text-yellow-700 mb-1">
                    {{ $item->nama }}
                </h3>

                <!-- EMAIL -->
                <p class="text-sm text-gray-500 mb-3 break-words">
                    {{ $item->email }}
                </p>

                <!-- PESAN -->
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ \Illuminate\Support\Str::limit($item->pesan, 150) }}
                </p>

            </div>

            <!-- BUTTON -->
            <div class="mt-5">

                <form method="POST" action="{{ route('admin.kontak.destroy', $item->id) }}">
                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Hapus pesan ini?')"
                        class="w-full px-4 py-2 bg-yellow-500 hover:bg-yellow-500 text-white rounded-lg shadow text-sm transition">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="col-span-full text-center py-10 text-gray-500 text-lg">
            Belum ada pesan masuk
        </div>

        @endforelse

    </div>

</div>
@endsection
