@extends('frontend.layouts.app')



@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-gray-100 overflow-hidden pt-32 pb-48">
<div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 items-center">

   {{-- TEXT --}}
<div class="z-10 text-left">

    <div class="w-14 h-[2px] bg-black mb-8"></div>

    <h1 class="leading-normal uppercase">
    <span class="block text-3xl sm:text-4xl lg:text-5xl font-light tracking-wide"
          style="font-family: 'Poppins', sans-serif;">
        HEALTHY
    </span>

    <span class="block text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight">
        TASTY FOOD
    </span>
</h1>

<p class="mt-6  text-gray-800 max-w-md leading-relaxed font-normal">
           <strong> Selamat datang </strong> di Tasty Food,
            tempat di mana sajian sehat bertemu dengan cita rasa terbaik.
            Kami menghadirkan pilihan makanan segar yang dibuat dengan penuh perhatian dan kualitas. 
            Setiap hidangan dirancang untuk menemani momen santai dan penuh kenikmatan Anda.
    </p>

    <a href="{{ route('tentang') }}"
       class="inline-block mt-8 bg-black text-white px-8 py-3 font-semibold rounded-lg hover:bg-gray-800 transition">
        TENTANG KAMI
    </a>

</div>


        
{{-- IMAGE --}}
<div class="
absolute right-0
top-[-140px] sm:top-[-120px] md:top-[-100px] lg:top-[-180px]
translate-x-1/4
flex justify-end
">

<img
src="{{ asset('storage/tentang/img-4-2000x2000.png') }}"
class="
object-contain
transition-all duration-500
w-[420px]
sm:w-[500px]
md:w-[540px]
lg:w-[650px]
xl:w-[720px]
">

</div>
</section>


{{-- ================= TENTANG ================= --}}
<section id="tentang" class="pt-16 pb-24 bg-white">
<div class="max-w-6xl mx-auto px-6 text-center">

<h2 class="text-3xl font-bold mb-6">TENTANG KAMI</h2>

<p class="max-w-2xl mx-auto text-base text-gray-600 leading-relaxed">
Healthy Tasty Food hadir sebagai solusi bagi masyarakat yang ingin menikmati makanan sehat tanpa mengorbankan cita rasa. 
Kami berkomitmen menyajikan hidangan yang dibuat dari bahan-bahan segar, berkualitas, dan bernutrisi seimbang. 
Setiap menu diolah dengan proses yang higienis dan penuh perhatian agar menghasilkan rasa yang lezat sekaligus menyehatkan.
</p>

<div class="w-16 h-[2px] bg-black mx-auto mt-8"></div>

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

                <p class="text-base text-gray-600 leading-relaxed">
                    {{ $item[2] }}
                </p>
            </div>

        </div>

        @endforeach

        </div>
    </div>
</section>



{{-- ================= BERITA ================= --}}
<section class="py-32 bg-white">
<div class="max-w-6xl mx-auto px-6">

<h2 class="text-3xl font-bold text-center mb-16">
BERITA KAMI
</h2>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

{{-- ================= BERITA UTAMA ================= --}}
@if($beritas->count())
@php $utama = $beritas->first(); @endphp

<div class="lg:row-span-2 bg-white rounded-2xl shadow-md overflow-hidden">

<img src="{{ Storage::url($utama->gambar) }}"
class="w-full h-80 object-cover">

<div class="p-6">
<h3 class="font-bold text-xl mb-4 uppercase">
{{ $utama->judul }}
</h3>

<p class="text-sm text-gray-600 mb-6">
{{ \Illuminate\Support\Str::limit($utama->isi, 220) }}
</p>

<a href="/berita?id={{ $utama->id }}"
class="text-orange-500 font-semibold hover:underline">
Baca selengkapnya
</a>

</div>
</div>
@endif


{{-- ================= BERITA KECIL ================= --}}
<div class="lg:col-span-2 flex lg:grid lg:grid-cols-2 gap-8
overflow-x-auto snap-x snap-mandatory pb-6">

@foreach ($beritas->skip(1)->take(4) as $item)
<div class="bg-white rounded-2xl shadow-md overflow-hidden
min-w-[260px] snap-center">

<img src="{{ Storage::url($item->gambar) }}"
class="w-full h-40 object-cover">

<div class="p-5">
<h4 class="font-bold text-sm mb-2 uppercase">
{{ $item->judul }}
</h4>

<p class="text-sm text-gray-600 mb-4">
{{ \Illuminate\Support\Str::limit($item->isi, 90) }}
</p>

<a href="/berita?id={{ $item->id }}"
class="text-orange-500 font-semibold hover:underline mt-auto">
Baca selengkapnya
</a>

</div>
</div>
@endforeach

</div>
</div>
</div>
</section>

{{-- ================= GALLERY ================= --}}
<section class="py-24 bg-white">
<div class="max-w-6xl mx-auto px-6">

<h2 class="text-3xl font-bold text-center mb-16">
GALLERY KAMI
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">

@foreach ($galleries->take(9) as $item)

<div class="relative rounded-2xl overflow-hidden cursor-pointer aspect-[4/3] group"
    onclick="showGalleryModal('{{ Storage::url($item->gambar) }}')">

    <img
    src="{{ Storage::url($item->gambar) }}"
    class="absolute inset-0 w-full h-full object-cover
    transition duration-500 group-hover:scale-110">

</div>

@endforeach

</div>

<div class="mt-12 text-center">
<a href="{{ route('gallery') }}"
class="inline-block bg-black text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition">
Lihat Semua Gallery
</a>
</div>

</div>
</section>



{{-- ================= MODAL GALLERY ================= --}}
<div id="galleryModal"
class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

<div class="relative">
<button onclick="closeGalleryModal()"
class="absolute -top-4 -right-4 bg-white rounded-full w-8 h-8 shadow text-xl">
✕
</button>

<img id="galleryImg"
class="max-h-[85vh] max-w-[90vw] rounded-xl shadow-xl object-contain">
</div>
</div>


<script>
function showBeritaModal(img,title,text){
document.getElementById('beritaImg').src = img;
document.getElementById('beritaTitle').innerText = title;
document.getElementById('beritaText').innerText = text;
const modal = document.getElementById('beritaModal');
modal.classList.remove('hidden');
modal.classList.add('flex');
}

function closeBeritaModal(){
document.getElementById('beritaModal').classList.add('hidden');
}

function showGalleryModal(img){
document.getElementById('galleryImg').src = img;
const modal = document.getElementById('galleryModal');
modal.classList.remove('hidden');
modal.classList.add('flex');
}

function closeGalleryModal(){
document.getElementById('galleryModal').classList.add('hidden');
}
</script>

<script>
function showBeritaModal(gambar, judul, isi, tanggal) {

document.getElementById('modalGambar').src = gambar;
document.getElementById('modalJudul').innerText = judul;
document.getElementById('modalIsi').innerText = isi;
document.getElementById('modalTanggal').innerText = tanggal;

const modal = document.getElementById('beritaModal');
modal.classList.remove('hidden');
modal.classList.add('flex');
}

function closeBeritaModal() {
const modal = document.getElementById('beritaModal');
modal.classList.add('hidden');
modal.classList.remove('flex');
}
</script>
@endsection    