<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">➕ Tambah Berita</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('admin.berita.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <input name="judul"
                       placeholder="Judul"
                       class="w-full border p-2 rounded"
                       required>
            </div>

            <div class="mb-3">
                <textarea name="isi"
                          placeholder="Isi berita"
                          class="w-full border p-2 rounded"
                          rows="5"
                          required></textarea>
            </div>

            <div class="mb-3">
                <input type="file"
                       name="gambar"
                       class="w-full border p-2 rounded">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded">
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
