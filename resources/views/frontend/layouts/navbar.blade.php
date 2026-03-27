<header x-data="{open:false}" class="absolute top-6 left-0 w-full z-50">
<div class="max-w-7xl mx-auto px-6 flex items-center gap-12">

    <!-- LOGO -->
    <h1 class="text-2xl font-bold tracking-wide">
      TASTY FOOD
    </h1>

    <!-- MENU DESKTOP -->
    <nav class="hidden md:block ml-16">
      <ul class="flex gap-10 uppercase text-sm font-bold tracking-wider">
        
        <li>
          <a href="/" class="relative group">
            Home
            <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
        </li>

        <li>
          <a href="/tentang" class="relative group">
            Tentang
            <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
        </li>

        <li>
          <a href="/berita" class="relative group">
            Berita
            <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
        </li>

        <li>
          <a href="/gallery" class="relative group">
            Galeri
            <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
        </li>

        <li>
          <a href="/kontak" class="relative group">
            Kontak
            <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
        </li>

      </ul>
    </nav>

    <!-- HAMBURGER BUTTON -->
   <button @click="open = !open" class="md:hidden ml-auto text-white">
  <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
          d="M4 6h16M4 12h16M4 18h16"/>
    <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
          d="M6 18L18 6M6 6l12 12"/>
  </svg>
</button>

</div>

<!-- MOBILE MENU -->
<nav 
  x-show="open" 
  x-transition
  class="md:hidden bg-white shadow-lg mt-4 mx-6 rounded-xl">

  <ul class="flex flex-col p-6 space-y-4 uppercase text-sm font-bold">
    <li><a href="/" @click="open=false">Home</a></li>
    <li><a href="/tentang" @click="open=false">Tentang</a></li>
    <li><a href="/berita" @click="open=false">Berita</a></li>
    <li><a href="/gallery" @click="open=false">Galeri</a></li>
    <li><a href="/kontak" @click="open=false">Kontak</a></li>
  </ul>

</nav>
</header>