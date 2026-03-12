<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Berita Kami</title>

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif;}
</style>
</head>
<body class="bg-gray-50 overflow-x-hidden">

<!-- ================= NAVBAR ================= -->
<header x-data="{open:false}" class="absolute w-full z-50 px-6 lg:px-16 py-6">
    <div class="max-w-7xl mx-auto flex items-center justify-between text-white">

        <!-- Logo -->
        <a href="/" class="text-xl font-bold">TASTY FOOD</a>

        <!-- Desktop Menu -->
        <nav class="hidden lg:flex space-x-8 font-semibold">
            <a href="/" class="hover:text-gray-300">HOME</a>
            <a href="/tentang" class="hover:text-gray-300">TENTANG</a>
            <a href="/berita" class="underline">BERITA</a>
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
            BERITA KAMI
        </h1>
    </div>

</section>



{{-- ================= BERITA UTAMA ================= --}}
@if($headline)
<section x-data="{ open: false }" class="py-24 px-6 relative">

<div class="max-w-[1140px] mx-auto grid md:grid-cols-2 gap-10 items-center">

    {{-- GAMBAR --}}
    <div>
        <img src="{{ asset('storage/'.$headline->gambar) }}"
             class="rounded-2xl w-full max-w-[520px] h-[500px] sm:h-[320px] object-cover">
    </div>

    {{-- KONTEN --}}
    <div>
        <h3 class="text-2xl font-bold mb-4">
            {{ $headline->judul }}
        </h3>

        <p class="text-sm leading-relaxed mb-6">
            {{ \Illuminate\Support\Str::limit(strip_tags($headline->isi),300) }}
        </p>

        <button 
            @click="open = true"
            class="inline-block bg-black text-white px-8 py-3 w-[280px] text-center
                   transition hover:bg-gray-800">
            BACA SELENGKAPNYA
        </button>
    </div>

</div>

{{-- ================= MODAL ================= --}}
<div 
    x-show="open"
    x-transition.opacity
    class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-6"
    style="display: none;"
>

    <div 
        @click.away="open = false"
        x-transition.scale
        class="bg-white w-full max-w-3xl rounded-2xl overflow-hidden shadow-2xl"
    >

        {{-- GAMBAR MODAL --}}
        <img src="{{ asset('storage/'.$headline->gambar) }}"
             class="w-full h-80 object-cover">

        {{-- ISI MODAL --}}
        <div class="p-8 max-h-[60vh] overflow-y-auto">

            <h2 class="text-2xl font-bold mb-4">
                {{ $headline->judul }}
            </h2>

            <div class="text-gray-700 leading-relaxed space-y-4">
                {!! $headline->isi !!}
            </div>

            <div class="mt-8 flex justify-end">
    <button 
        @click="open = false"
        class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
        Tutup
    </button>
</div>
        </div>
    </div>
</div>

</section>
@endif

{{-- ================= BERITA LAINNYA ================= --}}
<section 
    x-data="{ open:false, judul:'', isi:'', gambar:'' }"
    class="py-16 px-6 relative"
>
<div class="max-w-[1140px] mx-auto">

<h2 class="text-3xl font-bold mb-16">BERITA LAINNYA</h2>

<div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6">

@foreach($berita as $item)
<div class="bg-white rounded-xl shadow-md h-[380px] flex flex-col overflow-hidden">

    <img src="{{ asset('storage/'.$item->gambar) }}"
         class="h-[170px] w-full object-cover">

    <div class="p-4 flex flex-col flex-1">

        <h3 class="text-lg font-bold line-clamp-2">
            {{ $item->judul }}
        </h3>

        <p class="text-sm mb-auto line-clamp-3">
            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi),120) }}
        </p>

        <div class="flex justify-between items-center mt-3">
            <button 
                @click="
                    open = true;
                    judul = '{{ e($item->judul) }}';
                    isi = `{!! addslashes($item->isi) !!}`;
                    gambar = '{{ asset('storage/'.$item->gambar) }}';
                "
                class="text-yellow-500 text-sm">
                Baca selengkapnya
            </button>
        </div>
    </div>
</div>
@endforeach

</div>
</div>

{{-- ================= MODAL ================= --}}
<div 
    x-show="open"
    x-transition.opacity
    class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-6"
    style="display: none;"
>

    <div 
        @click.away="open = false"
        x-transition.scale
        class="bg-white w-full max-w-3xl rounded-2xl overflow-hidden shadow-2xl"
    >

        <img :src="gambar"
             class="w-full h-80 object-cover">

        <div class="p-8 max-h-[60vh] overflow-y-auto">

            <h2 class="text-2xl font-bold mb-4" x-text="judul"></h2>

            <div class="text-gray-700 leading-relaxed space-y-4"
                 x-html="isi">
            </div>

            <div class="mt-8 flex justify-end">
    <button 
        @click="open = false"
        class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
        Tutup
    </button>
</div>

        </div>
    </div>
</div>

</section>
{{-- ================= MODAL ================= --}}
<div id="beritaModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
<div class="bg-white rounded-xl w-full max-w-3xl p-6 relative">

    <button onclick="closeModal()" class="absolute top-4 right-4 text-xl">✕</button>

    <img id="modalImage" class="w-full max-h-[400px] object-cover rounded-lg mb-4">
    <h3 id="modalTitle" class="text-2xl font-bold mb-4"></h3>
    <div id="modalDescription"></div>

</div>
</div>

<script>
const modal=document.getElementById('beritaModal');
const modalTitle=document.getElementById('modalTitle');
const modalDescription=document.getElementById('modalDescription');
const modalImage=document.getElementById('modalImage');

document.querySelectorAll(
'.berita-read-more, .content-btn, .cursor-pointer'
).forEach(el=>{
el.addEventListener('click',function(e){
e.preventDefault();
const parent=this.closest('[data-judul]');
if(!parent)return;

modalTitle.innerText=parent.dataset.judul;
modalDescription.innerHTML=parent.dataset.isi;
modalImage.src='/storage/'+parent.dataset.gambar;

modal.classList.remove('hidden');
modal.classList.add('flex');
});
});

function closeModal(){
modal.classList.add('hidden');
modal.classList.remove('flex');
}
</script>
@include('frontend.layouts.footer')

</body>
</html>