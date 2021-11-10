<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                  <a href="#" class="logosidebar"><b>Tes <span>PT. Jasamedika Saranatama</span></b></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item @yield('home')">
                    <a href="{{ route('halaman_utama') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->roles[0]->name == 'Admin')
                  <li class="sidebar-item @yield('kelurahan')">
                    <a href="{{ route('kelurahan.index') }}" class='sidebar-link'>
                      <i class="bi bi-newspaper"></i>
                        <span>Data Kelurahan</span>
                    </a>
                  </li>
                @endif
                <li class="sidebar-item @yield('pasien')">
                  <a href="{{ route('pasien.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                      <span>Data Pasien</span>
                  </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
