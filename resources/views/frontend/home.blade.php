@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
{{-- ================= HERO ================= --}}
<section class="relative bg-gray-200 min-h-[100vh] lg:min-h-[100vh] pt-[260px] sm:pt-[280px] lg:pt-[180px] pb-[80px] overflow-hidden">    
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 items-center">

        {{-- TEXT --}}
        <div class="z-10">
            <div class="w-20 h-[2px] bg-black mb-6"></div>

            <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                <span class="font-light">HEALTHY</span><br>
                TASTY FOOD
            </h1>

            <p class="mt-4 text-gray-700 max-w-xl">
Tasty Food adalah tempat di mana kualitas dan cita rasa bertemu dalam satu sajian istimewa. Kami berkomitmen untuk menghadirkan menu yang dibuat dari bahan-bahan terbaik dengan proses yang higienis dan penuh dedikasi. </p>

            <a href="{{ route('tentang') }}"
               class="inline-block mt-4 bg-black text-white px-14 py-4 font-bold text-xl
                      transition duration-300 transform
                      hover:bg-gray-700 hover:-translate-y-1 hover:shadow-2xl">
                TENTANG KAMI
            </a>
        </div>

        {{-- IMAGE --}}

<div class="absolute right-0 
            top-[-140px] sm:top-[20px] md:top-[-80px] lg:top-[-180px]
            w-[480px] sm:w-[400px] lg:w-[800px]
            translate-x-1/4 lg:translate-x-0
            lg:right-[-150px]
            flex justify-center
            transform-gpu transition-all duration-700 ease-in-out
            z-10">

    <img
        src="{{ asset('storage/tentang/img-4-2000x2000.png') }}"
        class="w-full 
               max-h-none lg:max-h-[95vh]
               object-contain">
</div>
</section>

{{-- ================= TENTANG ================= --}}
<section class="relative mt-[-200px] py-24 bg-white text-center">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl lg:text-4xl font-extrabold mb-6">
            TENTANG KAMI
        </h2>
        <p class="text-gray-600 leading-relaxed text-lg mb-8">
            “Tasty Food adalah usaha kuliner yang berfokus pada penyajian makanan sehat, lezat, dan berkualitas. Kami menggunakan bahan-bahan segar pilihan serta proses yang higienis untuk memastikan setiap hidangan memberikan rasa terbaik dan manfaat bagi kesehatan.”
        </p>
        <div class="w-28 h-[3px] bg-black mx-auto"></div>
    </div>
</section>

{{-- ================= CARD FITUR ================= --}}
<section class="relative bg-cover bg-center pt-44 pb-32"
    style="background-image:url('{{ asset('storage/tentang/Group 70@2x.png') }}')">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <div class="flex gap-6 mt-16 pt-16 overflow-x-auto snap-x snap-mandatory 
                    lg:grid lg:grid-cols-4 lg:overflow-visible">

        @foreach([
        ['img-1.png','Healthy Food','Menu sehat dan bernutrisi untuk mendukung gaya hidup lebih baik setiap hari.'],
        ['img-2.png','Fresh Ingredients','Menggunakan bahan segar pilihan yang diproses secara higienis dan berkualitas.'], 
        ['img-3.png','Best Quality','Setiap hidangan dibuat dengan standar kualitas terbaik untuk kepuasan pelanggan.'],
        ['img-4.png','Fast Delivery','Pesanan diproses dengan cepat dan dikirim tepat waktu dalam kondisi terbaik.']
        ] as $item)

        <div 
        class="group block min-w-[260px] sm:min-w-[300px] lg:min-w-0
        rounded-xl shadow-xl p-8 pt-24 text-center relative
        overflow-visible
        bg-gradient-to-b from-white/0 to-white
        transform transition duration-300 
        hover:-translate-y-4 hover:shadow-2xl
        snap-center">

            <img src="{{ asset('storage/tentang/'.$item[0]) }}"
            class="w-40 h-40 rounded-full object-cover absolute 
            -top-14 sm:-top-16
            left-1/2 -translate-x-1/2 shadow-lg">

            <div>
                <h3 class="font-bold text-lg mb-3">{{ $item[1] }}</h3>
                <p class="text-sm text-gray-600">
                    {{ $item[2] }}
                </p>
            </div>

        </div>

        @endforeach

        </div>
    </div>
</section>



{{-- ================= BERITA ================= --}}
<section class="py-24 bg-gray-200">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-14">BERITA KAMI</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- CARD BESAR (KIRI) --}}
            @if($beritas->count())
            <div class="relative lg:col-span-2 bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                @if($beritas[0]->gambar)
                <img src="{{ asset('storage/'.$beritas[0]->gambar) }}"
                     class="w-full h-96 object-cover pointer-events-none">
                @endif

                <div class="p-6">
                    <h3 class="font-bold text-xl mb-3">
                        {{ $beritas[0]->judul }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit(strip_tags($beritas[0]->isi), 200) }}
                    </p>
                    <a href="{{ route('berita.user') }}"
   class="relative z-20 text-orange-500 font-semibold">
   Baca selengkapnya →
</a>
                </div>
            </div>
            @endif

            {{-- KOLOM KANAN --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($beritas->skip(1) as $berita)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    @if($berita->gambar)
                    <img src="{{ asset('storage/'.$berita->gambar) }}"
                         class="w-full h-40 object-cover">
                    @endif

                    <div class="p-4">
                        <h3 class="font-bold text-sm mb-2">
                            {{ Str::limit($berita->judul, 40) }}
                        </h3>
                        <a href="{{ route('berita.user') }}"
   class="text-orange-500 text-sm font-semibold">
   Baca...
</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        {{-- MODAL (biarkan punyamu yang tadi, tidak perlu diubah) --}}
    </div>
</section>
{{-- ================= GALERI ================= --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-14">
            GALERI KAMI
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($galleries as $index => $g)
            <div onclick="openGalleryModal({{ $index }})"
                class="relative overflow-hidden rounded-xl shadow cursor-pointer group">

                <img src="{{ asset('storage/'.$g->gambar) }}"
                     class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
            </div>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            <a href="{{ route('gallery') }}"
               class="inline-flex items-center gap-2 px-10 py-3
                      bg-black text-white font-semibold rounded-full
                      hover:bg-white-500 transition shadow-lg ">
                Lihat Lebih Banyak
            </a>
        </div>
    </div>
</section>

{{-- ================= SCRIPT MODAL ================= --}}

@endsection