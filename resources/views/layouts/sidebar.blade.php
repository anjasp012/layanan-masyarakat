<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link{{ Request::routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @if (auth()->user()->role_id)
                    <a class="nav-link{{ Request::routeIs('kartuTandaAnggota') ? ' active' : '' }}" href="{{ route('kartuTandaAnggota.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Kartu Tanda Anggota
                    </a>
                @else
                    <a class="nav-link{{ Request::routeIs('kartuPelanggan') ? ' active' : '' }}" href="{{ route('kartuPelanggan.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Kartu Pelanggan
                    </a>
                @endif
                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                <div class="sb-sidenav-menu-heading">Interface</div>
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
                                <a class="nav-link{{ Request::routeIs('staff.index') || Request::routeIs('staff.show') ? ' active' : '' }}" href="{{ route('staff.index') }}">Staff Aktif</a>
                                <a class="nav-link{{ Request::routeIs('staff.userNonAktif') || Request::routeIs('staff.show') ? ' active' : '' }}" href="{{ route('staff.userNonAktif') }}">Staff Non Aktif</a>
                                <a class="nav-link{{ Request::routeIs('staff.userPending') || Request::routeIs('staff.show') ? ' active' : '' }}" href="{{ route('staff.userPending') }}">Staff Pending</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed{{ Request::routeIs('pelanggan.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pelanggan" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            pelanggan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse{{ Request::routeIs('pelanggan.*') ? ' show' : '' }}" id="pelanggan" aria-labelledby="pelanggan" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (auth()->user()->role_id == 1)
                                    <a class="nav-link{{ Request::routeIs('pelanggan.create') ? ' active' : '' }}" href="{{ route('pelanggan.create') }}">Add Pelanggan</a>
                                @endif
                                <a class="nav-link{{ Request::routeIs('pelanggan.index') || Request::routeIs('pelanggan.show') ? ' active' : '' }}" href="{{ route('pelanggan.index') }}">Pelanggan Aktif</a>
                                <a class="nav-link{{ Request::routeIs('pelanggan.userNonAktif') || Request::routeIs('pelanggan.show') ? ' active' : '' }}" href="{{ route('pelanggan.userNonAktif') }}">Pelanggan Non Aktif</a>
                                <a class="nav-link{{ Request::routeIs('pelanggan.userPending') || Request::routeIs('pelanggan.show') ? ' active' : '' }}" href="{{ route('pelanggan.userPending') }}">Pelanggan Pending</a>
                            </nav>
                        </div>
                    @endif
                    <a class="nav-link{{ Request::routeIs('dpp.*') ? ' active' : '' }}" href="{{ route('dpp.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        DPP
                    </a>
                    <a class="nav-link collapsed{{ Request::routeIs('dpd.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#dpd" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        DPD
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse{{ Request::routeIs('dpd.*') ? ' show' : '' }}" id="dpd" aria-labelledby="relawan" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link{{ Request::routeIs('dpd.createdaerah') ? ' active' : '' }}" href="{{ route('dpd.createdaerah') }}">ADD DAERAH</a>
                            <a class="nav-link{{ Request::routeIs('dpd.indexdaerah') ? ' active' : '' }}" href="{{ route('dpd.indexdaerah') }}">DAFTAR DAERAH</a>
                            <a class="nav-link{{ Request::routeIs('dpd.index') ? ' active' : '' }}" href="{{ route('dpd.index') }}">SEMUA DPD</a>
                            @foreach ($wilayahDpd as $wilayahDpdItem)
                                    <a class="nav-link {{ Request::is('dpd/'.$wilayahDpdItem->slug) ? ' active' : '' }} text-uppercase" href="{{ route('dpd.daerah', $wilayahDpdItem->slug) }}">{{ $wilayahDpdItem->nama }}</a>
                            @endforeach
                            {{-- <a class="nav-link{{ Request::routeIs('relawan.userNonAktif') || Request::routeIs('relawan.show') ? ' active' : '' }}" href="{{ route('relawan.userNonAktif') }}">Relawan Non Aktif</a>
                            <a class="nav-link{{ Request::routeIs('relawan.userPending') || Request::routeIs('relawan.show') ? ' active' : '' }}" href="{{ route('relawan.userPending') }}">Relawan Pending</a> --}}
                        </nav>
                    </div>
                    {{-- <a class="nav-link{{ Request::routeIs('dpd.*') ? ' active' : '' }}" href="{{ route('dpd.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        DPD
                    </a> --}}
                @endif
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
                @if (auth()->user()->role_id)
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
                @endif
                @if (auth()->user()->role_id && auth()->user()->role_id != 4)
                    <div class="sb-sidenav-menu-heading">Keuangan</div>
                    <a class="nav-link collapsed{{ Request::routeIs('rekening.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#rekening" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Rekening Bank
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse{{ Request::routeIs('rekening.*') ? ' show' : '' }}" id="rekening" aria-labelledby="rekening" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @if (auth()->user()->role_id == 1 || auth()->user()->hak_akses == 1)
                                <a class="nav-link{{ Request::routeIs('rekening.create') ? ' active' : '' }}" href="{{ route('rekening.create') }}">Add rekening</a>
                            @endif
                            <a class="nav-link{{ Request::routeIs('rekening.index') || Request::routeIs('rekening.show') ? ' active' : '' }}" href="{{ route('rekening.index') }}">Semua Rekening</a>
                        </nav>
                    </div>
                    @if (auth()->user()->hak_akses_id == 1 || auth()->user()->role_id == 1)
                        <a class="nav-link collapsed{{ Request::routeIs('kategori.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#kategori" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Kategori
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse{{ Request::routeIs('kategori.*') ? ' show' : '' }}" id="kategori" aria-labelledby="kategori" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (auth()->user()->role_id == 1 || auth()->user()->hak_akses == 1)
                                    <a class="nav-link{{ Request::routeIs('kategori.create') ? ' active' : '' }}" href="{{ route('kategori.create') }}">Add Kategori</a>
                                @endif
                                <a class="nav-link{{ Request::routeIs('kategori.index') || Request::routeIs('kategori.show') ? ' active' : '' }}" href="{{ route('kategori.index') }}">Semua Kategori</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed{{ Request::routeIs('transaksi.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Transaksi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse{{ Request::routeIs('transaksi.*') ? ' show' : '' }}" id="transaksi" aria-labelledby="transaksi" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (auth()->user()->role_id == 1 || auth()->user()->hak_akses == 1)
                                    <a class="nav-link{{ Request::routeIs('transaksi.create') ? ' active' : '' }}" href="{{ route('transaksi.create') }}">Add Transaksi</a>
                                @endif
                                <a class="nav-link{{ Request::routeIs('transaksi.index') || Request::routeIs('transaksi.show') ? ' active' : '' }}" href="{{ route('transaksi.index') }}">Semua Transaksi</a>
                            </nav>
                        </div>
                    @endif
                    <a class="nav-link{{ Request::routeIs('laporan.*') ? ' active' : '' }}" href="{{ route('laporan.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Laporan
                    </a>

                @endif
                @if (auth()->user()->role_id && auth()->user()->role_id != 4)
                    <div class="sb-sidenav-menu-heading">Informasi Anggaran</div>
                    <a class="nav-link collapsed{{ Request::routeIs('anggaranDasar.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#anggaranDasar" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Anggaran Dasar (AD)
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse{{ Request::routeIs('anggaranDasar.*') ? ' show' : '' }}" id="anggaranDasar" aria-labelledby="anggaranDasar" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @if (auth()->user()->role_id == 1)
                                <a class="nav-link{{ Request::routeIs('anggaranDasar.create') ? ' active' : '' }}" href="{{ route('anggaranDasar.create') }}">Add anggaranDasar</a>
                            @endif
                            <a class="nav-link{{ Request::routeIs('anggaranDasar.index') || Request::routeIs('anggaranDasar.show') ? ' active' : '' }}" href="{{ route('anggaranDasar.index') }}">Data Anggaran Dasar</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed{{ Request::routeIs('anggaranRumahTangga.*') ? ' active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#anggaranRumahTangga" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Anggaran Rumah Tangga (ART)
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse{{ Request::routeIs('anggaranRumahTangga.*') ? ' show' : '' }}" id="anggaranRumahTangga" aria-labelledby="anggaranRumahTangga" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @if (auth()->user()->role_id == 1)
                                <a class="nav-link{{ Request::routeIs('anggaranRumahTangga.create') ? ' active' : '' }}" href="{{ route('anggaranRumahTangga.create') }}">Add anggaranRumahTangga</a>
                            @endif
                            <a class="nav-link{{ Request::routeIs('anggaranRumahTangga.index') || Request::routeIs('anggaranRumahTangga.show') ? ' active' : '' }}" href="{{ route('anggaranRumahTangga.index') }}">Data Anggaran Rumah Tangga</a>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as {{ auth()->user()->role()->nama_role }}</div>
            Start Bootstrap
        </div> --}}
    </nav>
</div>
