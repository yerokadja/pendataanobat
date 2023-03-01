 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <div class="user-profile mt-4">
             <div class="user-image mr-5 text-center">
                 <img src="/assets/img/favicon/favicon.ico" height="30.5px">
             </div>
             <div class="user-name ">
                 <h5 class="mb-0 d-flex justify-content-center">UPTD PUSKESMAS
             </div>
             <div class="user-designation mb-4">
                 <h5 class="mb-0 d-flex justify-content-center ">BAKUNASE
             </div>
         </div>
         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <ul class="menu-inner py-1 mt-5">
         <!-- Dashboard -->
         <li class="menu-item {{ Request::is('dashboard') ? 'active ' : '' }}">
             <a href="/dashboard"class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Beranda</div>
             </a>
         </li>

         <li class="menu-item {{ Request::is('dashboard/obat') ? 'active open' : '' }}">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bx-capsule"></i>
                 <div data-i18n="Layouts">Obat</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item {{ Request::is('dashboard/obat') ? 'active' : '' }}">
                     <a href="{{ url('dashboard/obat') }}" class="menu-link">
                         <div data-i18n="Without menu">Data obat</div>
                     </a>
                 </li>
                 <li class="menu-item {{ Request::is('dashboard/expired') ? 'active' : '' }}">
                     <a href="{{ url('dashboard/expired') }}" class="menu-link">
                         <div data-i18n="Without navbar">Obat kadaluarsa</div>
                     </a>
                 </li>
                 <li class="menu-item {{ Request::is('dashboard/habis') ? 'active' : '' }}">
                     <a href="{{ url('dashboard/habis') }}" class="menu-link">
                         <div data-i18n="Container">Obat habis</div>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="menu-item {{ Request::is('dashboard/kategori') ? 'active open' : '' }}">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bx-task"></i>
                 <div data-i18n="Layouts">Kategori & unit</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item {{ Request::is('dashboard/kategori') ? 'active' : '' }}">
                     <a href="{{ url('dashboard/kategori') }}" class="menu-link">
                         <div data-i18n="Without menu">Data Kategori </div>
                     </a>
                 </li>
                 <li class="menu-item {{ Request::is('dashboard/unit') ? 'active' : '' }}">
                     <a href="{{ url('dashboard/unit') }}" class="menu-link">
                         <div data-i18n="Without navbar">Data unit</div>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="menu-item {{ Request::is('dashboard/obat-keluar') ? 'active' : '' }}">
             <a href="/dashboard/obat-keluar" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-archive-out"></i>
                 <div data-i18n="Analytics">Obat Keluar</div>
             </a>
         </li>

         <li class="menu-item {{ Request::is('dashboard/permintaan') ? 'active' : '' }}">
             <a href="/dashboard/permintaan" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-cube"></i>
                 <div data-i18n="Analytics">Permintaan Obat</div>
             </a>
         </li>
         <li class="menu-item {{ Request::is('dashboard/dokter') ? 'active' : '' }}">
             <a href="{{ url('dashboard/dokter') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-group"></i>
                 <div data-i18n="Analytics"> Dokter</div>
             </a>
         </li>

         <li class="menu-item {{ Request::is('dashboard/pasien') ? 'active' : '' }}">
             <a href="/dashboard/pasien" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-group"></i>
                 <div data-i18n="Analytics">Pasien</div>
             </a>
         </li>

         <li class="menu-item {{ Request::is('dashboard/apoteker') ? 'active' : '' }}">
             <a href="/dashboard/apoteker" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-group"></i>
                 <div data-i18n="Analytics">Apoteker</div>
             </a>
         </li>

         <li class="menu-item {{ Request::is('dashboard/pemasok') ? 'active' : '' }}">
             <a href="/dashboard/pemasok" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-user"></i>
                 <div data-i18n="Analytics">Pemasok</div>
             </a>
         </li>

         <li class="menu-item {{ Request::is('dashboard/laporanpenggunaan') ? 'active' : '' }}">
             <a href="/dashboard/laporanpenggunaan" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-file"></i>
                 <div data-i18n="Analytics">Laporan Penggunaan Obat</div>
             </a>
         </li>
 </aside>

 <div class="layout-page">
