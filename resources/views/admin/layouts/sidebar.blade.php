<aside class="w-64 bg-white min-h-screen shadow-lg p-5 flex flex-col">

<!-- Logo / Judul -->
<div class="mb-8">
<h2 class="text-2xl font-bold text-yellow-500">Tasty Food</h2>
<p class="text-xs text-gray-500">Admin Panel</p>
</div>

<!-- Menu -->
<ul class="space-y-3">
<li>
<a href="{{ route('home') }}" 
class="block p-3 rounded-lg hover:bg-yellow-100 hover:text-yellow-600 transition font-medium">
Home
</a>
</li>

<li>
<a href="{{ route('dashboard') }}" 
class="block p-3 rounded-lg hover:bg-yellow-100 hover:text-yellow-600 transition font-medium">
Dashboard
</a>
</li>

<li>
<a href="{{ url('/kontak') }}" 
class="block p-3 rounded-lg hover:bg-yellow-100 hover:text-yellow-600 transition font-medium">
Kontak
</a>
</li>

<li>
<a href="{{ url('/tentang') }}" 
class="block p-3 rounded-lg hover:bg-yellow-100 hover:text-yellow-600 transition font-medium">
Tentang
</a>
</li>

<li>
<a href="{{ url('/gallery') }}" 
class="block p-3 rounded-lg hover:bg-yellow-100 hover:text-yellow-600 transition font-medium">
Gallery
</a>
</li>

<li>
<a href="{{ url('/berita') }}" 
class="block p-3 rounded-lg hover:bg-yellow-100 hover:text-yellow-600 transition font-medium">
Berita
</a>
</li>

</ul>


<!-- Logout -->
<div class="mt-10 pt-6">
<form method="POST" action="{{ route('logout') }}">
@csrf
<button type="submit"
class="w-full bg-yellow-400 hover:bg-yellow-500 p-2 rounded text-white">
Logout
</button>
</form>
</div>

</aside>
