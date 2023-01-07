<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link{{ Request::routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link{{ Request::routeIs('kartuTandaAnggota') ? ' active' : '' }}" href="{{ route('kartuTandaAnggota') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Kartu Tanda Anggota
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <a class="nav-link collapsed{{ Request::routeIs('anggota.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#anggota" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Anggota
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse{{ Request::routeIs('anggota.*') ? ' show' : '' }}" id="anggota" aria-labelledby="anggota" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @if (auth()->user()->role_id == 1)
                                <a class="nav-link{{ Request::routeIs('anggota.create.*') ? ' active' : '' }}" href="{{ route('anggota.create.step-1') }}">Add Anggota</a>
                            @endif
                            <a class="nav-link{{ Request::routeIs('anggota.index') || Request::routeIs('anggota.show') ? ' active' : '' }}" href="{{ route('anggota.index') }}">Anggota Aktif</a>
                            <a class="nav-link{{ Request::routeIs('anggota.userNonAktif') || Request::routeIs('anggota.show') ? ' active' : '' }}" href="{{ route('anggota.userNonAktif') }}">Anggota Non Aktif</a>
                            <a class="nav-link{{ Request::routeIs('anggota.userPending') || Request::routeIs('anggota.show') ? ' active' : '' }}" href="{{ route('anggota.userPending') }}">Anggota Pending</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed{{ Request::routeIs('relawan.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#relawan" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Relawan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse{{ Request::routeIs('relawan.*') ? ' show' : '' }}" id="relawan" aria-labelledby="relawan" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            {{-- @if (auth()->user()->role_id == 1)
                                <a class="nav-link{{ Request::routeIs('relawan.create') ? ' active' : '' }}" href="{{ route('relawan.create') }}">Add Relawan</a>
                            @endif --}}
                            <a class="nav-link{{ Request::routeIs('relawan.index') || Request::routeIs('relawan.show') ? ' active' : '' }}" href="{{ route('relawan.index') }}">Relawan Aktif</a>
                            <a class="nav-link{{ Request::routeIs('relawan.userNonAktif') || Request::routeIs('relawan.show') ? ' active' : '' }}" href="{{ route('relawan.userNonAktif') }}">Relawan Non Aktif</a>
                            <a class="nav-link{{ Request::routeIs('relawan.userPending') || Request::routeIs('relawan.show') ? ' active' : '' }}" href="{{ route('relawan.userPending') }}">Relawan Pending</a>
                        </nav>
                    </div>
                    @if (auth()->user()->role_id == 1)
                        <a class="nav-link collapsed{{ Request::routeIs('staff.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#staff" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Staff
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse{{ Request::routeIs('staff.*') ? ' show' : '' }}" id="staff" aria-labelledby="staff" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (auth()->user()->role_id == 1)
                                    <a class="nav-link{{ Request::routeIs('staff.create.*') ? ' active' : '' }}" href="{{ route('staff.create.step-1') }}">Add staff</a>
                                @endif
                                <a class="nav-link{{ Request::routeIs('staff.index') || Request::routeIs('staff.show') ? ' active' : '' }}" href="{{ route('staff.index') }}">staff Aktif</a>
                                <a class="nav-link{{ Request::routeIs('staff.userNonAktif') || Request::routeIs('staff.show') ? ' active' : '' }}" href="{{ route('staff.userNonAktif') }}">staff Non Aktif</a>
                                <a class="nav-link{{ Request::routeIs('staff.userPending') || Request::routeIs('staff.show') ? ' active' : '' }}" href="{{ route('staff.userPending') }}">staff Pending</a>
                            </nav>
                        </div>
                    @endif
                    <a class="nav-link{{ Request::routeIs('dpp.*') ? ' active' : '' }}" href="{{ route('dpp.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dpp
                    </a>
                    <a class="nav-link{{ Request::routeIs('dpd.*') ? ' active' : '' }}" href="{{ route('dpd.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dpd
                    </a>
                @endif
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
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as {{ auth()->user()->role()->nama_role }}</div>
            Start Bootstrap
        </div> --}}
    </nav>
</div>
