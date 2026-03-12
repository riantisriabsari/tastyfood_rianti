<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine (WAJIB BIAR HAMBURGER JALAN) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

<!-- ================= NAVBAR ================= -->
<header x-data="{open:false}" class="absolute w-full z-50 px-6 lg:px-16 py-6">
    <div class="max-w-7xl mx-auto flex items-center justify-between text-white">

        <!-- Logo -->
        <a href="/" class="text-xl font-bold">TASTY FOOD</a>

        <!-- Desktop Menu -->
        <nav class="hidden lg:flex space-x-8 font-semibold">
            <a href="/" class="hover:text-gray-300">HOME</a>
            <a href="/tentang" class="underline">TENTANG</a>
            <a href="/berita" class="hover:text-gray-300">BERITA</a>
            <a href="/gallery" class="hover:text-gray-300">GALERI</a>
            <a href="/kontak" class="hover:text-gray-300">KONTAK</a>
        </nav>

        <!-- Hamburger -->
        <button @click="open = !open" class="lg:hidden">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition
         class="lg:hidden mt-4 bg-black/90 rounded-xl p-6 mx-6 text-white space-y-4 font-semibold">

        <a href="/" class="block" @click="open=false">HOME</a>
        <a href="/tentang" class="block" @click="open=false">TENTANG</a>
        <a href="/berita" class="block" @click="open=false">BERITA</a>
        <a href="/gallery" class="block" @click="open=false">GALERI</a>
        <a href="/kontak" class="block" @click="open=false">KONTAK</a>
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
            TENTANG KAMI
        </h1>
    </div>

</section>

@php
    $tastyFoodText = $tentangs->where('section','tasty_food')->first();
    $visiText      = $tentangs->where('section','visi')->first();
    $misiText      = $tentangs->where('section','misi')->first();

    $tastyFoodImages = $tentangs->where('section','tasty_food')->whereNotNull('gambar');
    $visiImages      = $tentangs->where('section','visi')->whereNotNull('gambar');
    $misiImages      = $tentangs->where('section','misi')->whereNotNull('gambar');
@endphp

<!-- ================= TASTY FOOD ================= -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid lg:grid-cols-2 gap-16 items-center">

        <div>
            <h2 class="text-2xl font-extrabold mb-6">TASTY FOOD</h2>
            <p class="leading-relaxed text-gray-600">
                {{ $tastyFoodText->deskripsi ?? '-' }}
            </p>
        </div>

        <div class="grid grid-cols-2 gap-5">
            @foreach($tastyFoodImages as $img)
                <img src="{{ asset('storage/'.$img->gambar) }}"
                     class="w-full h-52 object-cover rounded-xl shadow">
            @endforeach
        </div>

    </div>
</section>

<!-- ================= VISI ================= -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid lg:grid-cols-2 gap-16 items-center">

        <div class="grid grid-cols-2 gap-5 order-2 lg:order-1">
            @foreach($visiImages as $img)
                <img src="{{ asset('storage/'.$img->gambar) }}"
                     class="w-full h-52 object-cover rounded-xl shadow">
            @endforeach
        </div>

        <div class="order-1 lg:order-2">
            <h2 class="text-2xl font-extrabold mb-6">VISI</h2>
            <p class="leading-relaxed text-gray-600">
                {{ $visiText->deskripsi ?? '-' }}
            </p>
        </div>

    </div>
</section>

<!-- ================= MISI ================= -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid lg:grid-cols-2 gap-16 items-center">

        <div>
            <h2 class="text-2xl font-extrabold mb-6">MISI</h2>
            <p class="leading-relaxed text-gray-600">
                {{ $misiText->deskripsi ?? '-' }}
            </p>
        </div>

        <div class="grid grid-cols-2 gap-5">
            @foreach($misiImages as $img)
                <img src="{{ asset('storage/'.$img->gambar) }}"
                     class="w-full h-52 object-cover rounded-xl shadow">
            @endforeach
        </div>

    </div>
</section>
@include('frontend.layouts.footer')

</body>
</html>