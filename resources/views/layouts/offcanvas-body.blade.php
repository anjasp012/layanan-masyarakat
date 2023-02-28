<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link{{ Request::routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link{{ Request::routeIs('kartuPelanggan') ? ' active' : '' }}" href="{{ route('kartuPelanggan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Kartu Pelanggan
                </a>
                @if (!auth()->user()->role_id || auth()->user()->hak_akses_id == 2 || auth()->user()->hak_akses_id == 3 || auth()->user()->role_id == 1)
                <div class="sb-sidenav-menu-heading">Pengajuan</div>
                <a class="nav-link collapsed{{ Request::routeIs('generalCleaning.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#generalCleaning" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu General Cleaning Rumah Ibadah
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse{{ Request::routeIs('generalCleaning.*') ? ' show' : '' }}" id="generalCleaning" aria-labelledby="generalCleaning" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (!auth()->user()->role_id)
                            <a class="nav-link{{ Request::routeIs('generalCleaning.create') ? ' active' : '' }}" href="{{ route('generalCleaning.create') }}">Request</a>
                        @endif
                        <a class="nav-link{{ Request::routeIs('generalCleaning.index') || Request::routeIs('generalCleaning.show') ? ' active' : '' }}" href="{{ route('generalCleaning.index') }}">Data General Cleaning Rumah Ibadah</a>
                    </nav>
                </div>
                <a class="nav-link collapsed{{ Request::routeIs('serviceAc.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#serviceAc" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu Service Air Conditioner
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse{{ Request::routeIs('serviceAc.*') ? ' show' : '' }}" id="serviceAc" aria-labelledby="serviceAc" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (!auth()->user()->role_id)
                            <a class="nav-link{{ Request::routeIs('serviceAc.create') ? ' active' : '' }}" href="{{ route('serviceAc.create') }}">Request</a>
                        @endif
                        <a class="nav-link{{ Request::routeIs('serviceAc.index') || Request::routeIs('serviceAc.show') ? ' active' : '' }}" href="{{ route('serviceAc.index') }}">Data Service Air Conditioner</a>
                    </nav>
                </div>
                <a class="nav-link collapsed{{ Request::routeIs('pemasanganCctv.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pemasanganCctv" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu Request Pemasangan CCTV
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse{{ Request::routeIs('pemasanganCctv.*') ? ' show' : '' }}" id="pemasanganCctv" aria-labelledby="pemasanganCctv" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (!auth()->user()->role_id)
                            <a class="nav-link{{ Request::routeIs('pemasanganCctv.create') ? ' active' : '' }}" href="{{ route('pemasanganCctv.create') }}">Request</a>
                        @endif
                        <a class="nav-link{{ Request::routeIs('pemasanganCctv.index') || Request::routeIs('pemasanganCctv.show') ? ' active' : '' }}" href="{{ route('pemasanganCctv.index') }}">Data Request Pemasangan CCTV</a>
                    </nav>
                </div>
                <a class="nav-link collapsed{{ Request::routeIs('pengecatan.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pengecatan" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu Request Pengecatan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse{{ Request::routeIs('pengecatan.*') ? ' show' : '' }}" id="pengecatan" aria-labelledby="pengecatan" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (!auth()->user()->role_id)
                            <a class="nav-link{{ Request::routeIs('pengecatan.create') ? ' active' : '' }}" href="{{ route('pengecatan.create') }}">Request</a>
                        @endif
                        <a class="nav-link{{ Request::routeIs('pengecatan.index') || Request::routeIs('pengecatan.show') ? ' active' : '' }}" href="{{ route('pengecatan.index') }}">Data Request Pengecatan</a>
                    </nav>
                </div>
                <a class="nav-link collapsed{{ Request::routeIs('layanan.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#layanan" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu Request Layanan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse{{ Request::routeIs('layanan.*') ? ' show' : '' }}" id="layanan" aria-labelledby="layanan" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (!auth()->user()->role_id)
                            <a class="nav-link{{ Request::routeIs('layanan.create') ? ' active' : '' }}" href="{{ route('layanan.create') }}">Request</a>
                        @endif
                        <a class="nav-link{{ Request::routeIs('layanan.index') || Request::routeIs('layanan.show') ? ' active' : '' }}" href="{{ route('layanan.index') }}">Data Request Layanan</a>
                    </nav>
                </div>
                @endif
                <div class="sb-sidenav-menu-heading">Pengumuman</div>
                <a class="nav-link collapsed{{ Request::routeIs('pengumuman.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pengumuman" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Pengumuman
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse{{ Request::routeIs('pengumuman.*') ? ' show' : '' }}" id="pengumuman" aria-labelledby="pengumuman" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (auth()->user()->role_id == 1)
                            <a class="nav-link{{ Request::routeIs('pengumuman.create') ? ' active' : '' }}" href="{{ route('pengumuman.create') }}">Add Pengumuman</a>
                        @endif
                        <a class="nav-link{{ Request::routeIs('pengumuman.index') || Request::routeIs('pengumuman.show') ? ' active' : '' }}" href="{{ route('pengumuman.index') }}">Semua Pengumuman</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Auth</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link bg-transparent border-0"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Logout</button>
                </form>
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as {{ auth()->user()->role()->nama_role }}</div>
            Start Bootstrap
        </div> --}}
    </nav>
</div>
