@extends('admin.layouts.app')

@section('title', 'Pesan Kontak')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Pesan Masuk</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Pesan</th>
                    <th class="p-2 border w-32">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $item)
                    <tr>
                        <td class="p-2 border">{{ $item->nama }}</td>
                        <td class="p-2 border">{{ $item->email }}</td>
                        <td class="p-2 border">{{ $item->pesan }}</td>
                        <td class="p-2 border text-center">
                            <form method="POST" action="{{ route('admin.kontak.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button
                                    onclick="return confirm('Hapus pesan ini?')"
                                    class="text-red-600 hover:underline"
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
