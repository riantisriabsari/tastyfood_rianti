<aside class="w-64 bg-gray-800 min-h-screen text-white p-5 flex flex-col">
    
    <div>
        <h2 class="text-xl font-bold mb-6">ADMIN PANEL</h2>

        <ul class="space-y-3">
            <li>
                <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/kontak') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Kontak
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/tentang') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Tentang
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/gallery') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Gallery
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/berita') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Berita
                </a>
            </li>
        </ul>
    </div>

    <div class="mt-auto mb-80 pt-6">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="w-full bg-red-500 hover:bg-red-600 p-2 rounded text-white">
            Logout
        </button>
    </form>
</div>

</aside>