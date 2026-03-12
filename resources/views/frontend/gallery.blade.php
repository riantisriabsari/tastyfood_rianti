<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

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
<a href="/gallery" class="underline">GALERI</a>
<a href="/kontak" class="hover:text-gray-300">KONTAK</a>
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
style="background-image:url('/storage/tentang/monika-grabkowska-P1aohbiT-EY-unsplash.jpg'); background-size:cover; background-position:center;">

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative max-w-7xl mx-auto px-6 w-full">
<h1 class="text-white text-3xl sm:text-4xl lg:text-6xl font-bold">
GALERI KAMI
</h1>
</div>
</section>

<!-- ================= CAROUSEL ================= -->
@if($galleries->count())
<section x-data="{active:0}" class="max-w-6xl mx-auto px-6 py-20">

<div class="relative overflow-hidden rounded-2xl">

    <div class="relative h-[440px]">

        @foreach($galleries as $key=>$g)
        <img 
            x-show="active=={{ $key }}"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-x-10"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 -translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-10"
            src="{{ asset('storage/'.$g->gambar) }}"
            class="absolute inset-0 w-full h-[440px] object-cover">
        @endforeach

    </div>

    <button 
        @click="active = active === 0 ? {{ $galleries->count()-1 }} : active-1"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/60 text-white px-3 py-2 rounded-full">
        ‹
    </button>

    <button 
        @click="active = active === {{ $galleries->count()-1 }} ? 0 : active+1"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/60 text-white px-3 py-2 rounded-full">
        ›
    </button>

</div>
</section>
@endif

<!-- ================= GRID ================= -->
<section class="max-w-7xl mx-auto px-6 pb-20"
x-data="{modal:false, img:''}">

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">

@foreach($galleries as $g)
<img src="{{ asset('storage/'.$g->gambar) }}"
@click="modal=true; img='{{ asset('storage/'.$g->gambar) }}'"
class="w-full h-52 object-cover rounded-2xl hover:scale-105 transition cursor-pointer">
@endforeach

</div>

<!-- Pagination -->
<div class="flex flex-wrap justify-center gap-2 mt-10 font-semibold text-sm">

@if($galleries->onFirstPage())
<span class="px-4 py-2 bg-gray-300 text-white rounded">PREVIOUS</span>
@else
<a href="{{ $galleries->previousPageUrl() }}" class="px-4 py-2 bg-gray-400 text-white rounded">PREVIOUS</a>
@endif

@foreach($galleries->getUrlRange(1,$galleries->lastPage()) as $page=>$url)
@if($page==$galleries->currentPage())
<span class="px-4 py-2 bg-yellow-400 text-white rounded">{{ $page }}</span>
@else
<a href="{{ $url }}" class="px-4 py-2 border rounded">{{ $page }}</a>
@endif
@endforeach

@if($galleries->hasMorePages())
<a href="{{ $galleries->nextPageUrl() }}" class="px-4 py-2 bg-black text-white rounded">NEXT</a>
@else
<span class="px-4 py-2 bg-gray-300 text-white rounded">NEXT</span>
@endif

</div>

<!-- Modal -->
<div x-show="modal"
x-transition
x-cloak
class="fixed inset-0 bg-black/80 flex items-center justify-center z-50">

<button @click="modal=false"
class="absolute top-6 right-6 text-white text-3xl">×</button>

<img :src="img"
class="max-h-[80vh] rounded-xl shadow-2xl">
</div>

</section>

@include('frontend.layouts.footer')

</body>
</html>