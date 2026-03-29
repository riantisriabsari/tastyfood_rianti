<aside class="sidebar" id="sidebar">

<!-- LOGO -->

<div class="logo">
    <div class="logo-text">
        <h2>Tasty Food</h2>
        <p class="admin-text">Admin Panel</p>
    </div>
    <button id="toggleSidebar">☰</button>
</div>

<!-- MENU -->

<ul class="menu">

<li>
    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <span class="icon">🏠</span>
        <span class="text">Dashboard</span>
    </a>
</li>

<li>
    <a href="{{ route('admin.berita.index') }}"
       class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
        <span class="icon">📰</span>
        <span class="text">Berita</span>
    </a>
</li>

<li>
    <a href="{{ route('admin.gallery.index') }}"
       class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
        <span class="icon">🖼️</span>
        <span class="text">Gallery</span>
    </a>
</li>

<li>
    <a href="{{ route('admin.kontak.index') }}"
       class="{{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
        <span class="icon">📞</span>
        <span class="text">Kontak</span>
    </a>
</li>

<li>
    <a href="{{ route('admin.tentang.index') }}"
       class="{{ request()->routeIs('admin.tentang.*') ? 'active' : '' }}">
        <span class="icon">ℹ️</span>
        <span class="text">Tentang</span>
    </a>
</li>

</ul>

<!-- BOTTOM -->

<div class="bottom-menu">
    <hr class="divider">


<a href="/" class="view-site">
    🌐 Lihat Website
</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="logout-btn">
        🚪 <span class="text">Logout</span>
    </button>
</form>


</div>

</aside>

<style>

/* RESET */
*{
    box-sizing:border-box;
    margin:0;
    padding:0;
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar{
    width:240px;
    background:white;
    min-height:100vh;
    padding:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    gap:12px;
    transition:0.3s;
    border-radius:16px;
}

/* COLLAPSE MANUAL */
.sidebar.collapsed{
    width:80px;
}

/* LOGO */
.logo{
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:2px solid #FFC107;
    padding-bottom:12px;
    margin-bottom:18px;
}

.logo h2{
    color:#FFC107;
    font-size:20px;
}

.admin-text{
    font-size:12px;
    color:#888;
    margin-top:2px;
}

/* BUTTON */
#toggleSidebar{
    background:#f5f5f5;
    border:none;
    padding:6px 10px;
    border-radius:8px;
    cursor:pointer;
}

/* MENU */
.menu{
    list-style:none;
    display:flex;
    flex-direction:column;
    gap:12px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px;
    border-radius:12px;
    text-decoration:none;
    color:#444;
    transition:all 0.25s ease;
    font-weight:500;
}

/* ICON */
.icon{
    font-size:18px;
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:10px;
    background:#f3f3f3;
}

/* HOVER */
.menu a:hover{
    background:#fff8e1;
    transform:translateX(4px);
}

/* ACTIVE */
.menu a.active{
    background:linear-gradient(135deg,#FFC107,#FF9800);
    color:white;
}

.menu a.active .icon{
    background:rgba(255,255,255,0.25);
}

/* COLLAPSE TEXT */
.sidebar.collapsed .text{
    display:none;
}

/* BOTTOM */
.bottom-menu{
    margin-top:20px;
}

/* VIEW */
.view-site{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:6px;
    padding:10px;
    border-radius:10px;
    text-decoration:none;
    background:#f5f5f5;
    color:#333;
    margin-bottom:10px;
}

.view-site:hover{
    background:#FFC107;
    color:white;
}

/* LOGOUT */
.logout-btn{
    width:100%;
    padding:10px;
    border:none;
    background:#FFC107;
    color:white;
    border-radius:10px;
}

/* ========================= */
/* RESPONSIVE TANPA HILANG 😏 */
/* ========================= */

/* TABLET */
@media(max-width:1024px){

    .sidebar{
        width:90px;
        padding:18px 10px;
    }

    .sidebar .text,
    .admin-text{
        display:none;
    }

}

/* HP */
@media(max-width:640px){

    .sidebar{
        width:70px;
        padding:15px 8px;
    }

    .icon{
        width:30px;
        height:30px;
        font-size:16px;
    }

}

</style>

<script>
const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('toggleSidebar');

toggle.onclick = function(){
    sidebar.classList.toggle('collapsed');
}
</script>

<script>
const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('toggleSidebar');

toggle.onclick = function(){
    if(window.innerWidth <= 768){
        sidebar.classList.toggle('active');
    }else{
        sidebar.classList.toggle('collapsed');
    }
}
</script>
