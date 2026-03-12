<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kontak Kami</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif;}
[x-cloak]{display:none!important;}
</style>
</head>

<body class="bg-gray-100 text-gray-800">

<!-- ================= NAVBAR ================= -->
<header x-data="{open:false}" class="absolute w-full z-50 px-6 lg:px-16 py-6">
<div class="max-w-7xl mx-auto flex items-center justify-between text-white">

<a href="/" class="text-xl font-bold">TASTY FOOD</a>

<nav class="hidden lg:flex space-x-8 font-semibold">
<a href="/" class="hover:text-gray-300">HOME</a>
<a href="/tentang" class="hover:text-gray-300">TENTANG</a>
<a href="/berita" class="hover:text-gray-300">BERITA</a>
<a href="/gallery" class="hover:text-gray-300">GALERI</a>
<a href="/kontak" class="underline">KONTAK</a>
</nav>

<button @click="open=!open" class="lg:hidden">
<svg x-show="!open" x-cloak class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
</svg>
<svg x-show="open" x-cloak class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
</svg>
</button>
</div>

<div x-show="open" x-transition x-cloak @click.away="open=false"
class="lg:hidden mt-4 bg-black/90 rounded-xl p-6 mx-6 text-white space-y-4 font-semibold">
<a href="/" class="block">HOME</a>
<a href="/tentang" class="block">TENTANG</a>
<a href="/berita" class="block">BERITA</a>
<a href="/gallery" class="block">GALERI</a>
<a href="/kontak" class="block">KONTAK</a>
</div>
</header>

<!-- ================= HERO ================= -->
<section class="relative h-[60vh] lg:h-[80vh] flex items-center"
    style="background-image:url('{{ asset('storage/tentang/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}'); background-size:cover; background-position:center;">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Text -->
    <div class="relative max-w-7xl mx-auto px-6 w-full">
        <h1 class="text-white text-3xl sm:text-4xl lg:text-6xl font-bold">
            KONTAK KAMI
        </h1>
    </div>

</section>
<!-- ================= FORM ================= -->
<section class="bg-white py-16">
<div class="max-w-6xl mx-auto px-6">

<h2 class="text-2xl font-bold mb-6">KONTAK KAMI</h2>

@if(session('success'))
<div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
{{ session('success') }}
</div>
@endif

<form action="{{ url('/kontak') }}" method="POST">
@csrf

<div class="grid md:grid-cols-2 gap-6">

<div>
<input type="text" name="subject"
class="w-full border-2 border-black rounded-xl px-4 py-3 mb-4 focus:outline-none"
placeholder="Subjek" required>

<input type="text" name="nama"
class="w-full border-2 border-black rounded-xl px-4 py-3 mb-4 focus:outline-none"
placeholder="Nama" required>

<input type="email" name="email"
class="w-full border-2 border-black rounded-xl px-4 py-3 focus:outline-none"
placeholder="Email" required>
</div>

<div>
<textarea name="pesan" rows="6"
class="w-full border-2 border-black rounded-xl px-4 py-3 focus:outline-none"
placeholder="Pesan" required></textarea>
</div>

</div>

<button class="w-full mt-6 bg-black text-white font-bold py-3 rounded-xl hover:bg-gray-800 transition">
KIRIM
</button>

</form>
</div>
</section>

<!-- ================= INFO KONTAK ================= -->
<section class="bg-white py-16">
<div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10 text-center">

<div>
<div class="w-24 h-24 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
<img src="/storage/tentang/Group 66@2x.png" class="w-14">
</div>
<h5 class="font-bold">EMAIL</h5>
<p class="text-gray-500 text-sm">tastyfood@gmail.com</p>
</div>

<div>
<div class="w-24 h-24 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
<img src="/storage/tentang/Group 67@2x.png" class="w-14">
</div>
<h5 class="font-bold">PHONE</h5>
<p class="text-gray-500 text-sm">081234567890</p>
</div>

<div>
<div class="w-24 h-24 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
<img src="/storage/tentang/Group 68@2x.png" class="w-14">
</div>
<h5 class="font-bold">LOCATION</h5>
<p class="text-gray-500 text-sm">Bandung</p>
</div>

</div>
</section>

<!-- ================= MAP ================= -->
<section class="py-16 bg-gray-200">
<div class="max-w-6xl mx-auto px-6">
<div class="aspect-video rounded-xl overflow-hidden shadow-lg">
<iframe
src="https://www.google.com/maps?q=bandung&output=embed"
class="w-full h-full border-0"
loading="lazy">
</iframe>
</div>
</div>
</section>

@include('frontend.layouts.footer')

</body>
</html>