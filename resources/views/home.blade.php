@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $anggotaPending }}</h2>
                            <p>Anggota Pending</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('anggota.userPending') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $anggotaAktif }}</h2>
                            <p>Anggota Aktif</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('anggota.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $anggotaNonAktif }}</h2>
                            <p>Anggota Tidak Aktif</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('anggota.userNonAktif') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $relawanPending }}</h2>
                            <p>Relawan Pending</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('relawan.userPending') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $relawanAktif }}</h2>
                            <p>Relawan Aktif</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('relawan.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $relawanNonAktif }}</h2>
                            <p>Relawan Tidak Aktif</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('relawan.userNonAktif') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (auth()->user()->role_id == 3 || auth()->user()->role_id == 4 || !auth()->user()->role_id)
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <p>Pengumuman Terbaru</p>
                    </div>
                    <div class="card-body">
                        <div>
                            @if ($pengumuman)
                                <h3>{{ $pengumuman->pengumuman }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (auth()->user()->role_id)
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-black text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">{{ $jumlahPengumuman }}</h2>
                            <p>Jumlah Pengumuman</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (auth()->user()->role_id == 1 || auth()->user()->hak_akses_id == 1)
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Keuangan</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $pemasukanHariIni }}</h2>
                            <p>Pemasukan Hari ini</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $pemasukanBulanIni }}</h2>
                            <p>Pemasukan Bulan ini</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $pemasukanTahunIni }}</h2>
                            <p>Pemasukan Tahun ini</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-black text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $seluruhPemasukan }}</h2>
                            <p>Seluruh Pemasukan</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $pengeluaranHariIni }}</h2>
                            <p>Pengeluaran Hari ini</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $pengeluaranBulanIni }}</h2>
                            <p>Pengeluaran Bulan ini</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $pengeluaranTahunIni }}</h2>
                            <p>Pengeluaran Tahun ini</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-black text-white mb-4">
                    <div class="card-body">
                        <div>
                            <h2 class="fw-bold">Rp. {{ $seluruhPengeluaran }}</h2>
                            <p>Seluruh Pengeluaran</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Grafik Perbulan
                    </div>
                    <div class="card-body">
                        <h4 class="text-center">Grafik Data Pemasukan dan Pengeluaran Per <b>Bulan</b></h4>
                        <canvas id="myBarChartBulan" width="100%" height="40"></canvas>
                    </div>
                    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Grafik Pertahun
                    </div>
                    <div class="card-body">
                        <h4 class="text-center">Grafik Data Pemasukan dan Pengeluaran Per <b>Tahun</b></h4>
                        <canvas id="myBarChartTahun" width="100%" height="50"></canvas>
                    </div>
                    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
                </div>
            </div>
        </div>
    @endif
@endsection

@section('content-mobile')
    <div class="row mb-4 align-items-center">
        <div class="col-4">
            <img src="{{ asset('storage/pelanggan/photo-diri/'.auth()->user()->photo_diri) }}" class="rounded img-fluid">
        </div>
        <div class="col-8">
            <table>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>{{ auth()->user()->nama_pengurus }}</td>
                </tr>
                <tr>
                    <th>No</th>
                    <td>:</td>
                    <td>{{ auth()->user()->no_pelanggan }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <h4 class="fw-bold">Layanan Kami</h4>
        </div>
    </div>
    <div class="row mb-4">
        <div class="dropdown">
            {{-- <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cek Status
            </button> --}}
        </div>
        <div class="col-4 mb-3">
            <div class="dropdown">
                <button type="button" class="card text-center border-0 text-decoration-none text-black" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <div class="card text-center border-0 text-decoration-none text-black"> --}}
                    <img src="/assets/img/menu/General Cleaning.jpg" class="card-img-top" alt="...">
                    <div class="card-footer bg-transparent border-0">General Cleaning</div>
                    {{-- </div> --}}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('generalCleaning.create') }}">
                            Request
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('generalCleaning.index') }}">
                            Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4 mb-3">
            <div class="dropdown">
                <button type="button" class="card text-center border-0 text-decoration-none text-black" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <div class="card text-center border-0 text-decoration-none text-black"> --}}
                    <img src="/assets/img/menu/service ac.png" class="card-img-top" alt="...">
                    <div class="card-footer bg-transparent border-0">Service Ac</div>
                    {{-- </div> --}}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('serviceAc.create') }}">
                            Request
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('serviceAc.index') }}">
                            Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4 mb-3">
            <div class="dropdown">
                <button type="button" class="card text-center border-0 text-decoration-none text-black" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <div class="card text-center border-0 text-decoration-none text-black"> --}}
                    <img src="/assets/img/menu/cctv.jpg" class="card-img-top" alt="...">
                    <div class="card-footer bg-transparent border-0">Cctv</div>
                    {{-- </div> --}}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('pemasanganCctv.create') }}">
                            Request
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('pemasanganCctv.index') }}">
                            Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4 mb-3">
            <div class="dropdown">
                <button type="button" class="card text-center border-0 text-decoration-none text-black" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <div class="card text-center border-0 text-decoration-none text-black"> --}}
                    <img src="/assets/img/menu/pengecatan.jpg" class="card-img-top" alt="...">
                    <div class="card-footer bg-transparent border-0">Pengecatan</div>
                    {{-- </div> --}}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('pengecatan.create') }}">
                            Request
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('pengecatan.index') }}">
                            Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4 mb-3">
            <div class="dropdown">
                <button type="button" class="card text-center border-0 text-decoration-none text-black" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <div class="card text-center border-0 text-decoration-none text-black"> --}}
                    <img src="/assets/img/menu/request.png" class="card-img-top" alt="...">
                    <div class="card-footer bg-transparent border-0">Request</div>
                    {{-- </div> --}}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('layanan.create') }}">
                            Request
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('layanan.index') }}">
                            Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4 mb-3">
            <a href="" class="card text-center border-0 text-decoration-none text-black">
                <img src="/assets/img/menu/donasi.jpg" class="card-img-top" alt="...">
                <div class="card-footer bg-transparent border-0">Donasi</div>
            </a>
        </div>

    </div>
    <div class="row mb-2">
        <div class="col-12">
            <h4 class="fw-bold">Pengumuman</h4>
            <p>@if ($pengumuman)
                <p>{{ $pengumuman->pengumuman }}</p>
            @endif</p>
        </div>
    </div>
@endsection

@if (auth()->user()->role_id == 1 || auth()->user()->hak_akses_id == 1)
    @section('script')
        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            // Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Bulan
            var pemasukanPerbulan = {{ $chartPemasukanPerbulan->values() }}
            var pengeluaranPerbulan = {{ $chartPengeluaranPerbulan->values() }}
            console.log(pemasukanPerbulan);
            console.log(pengeluaranPerbulan);
            var ctxBulan = document.getElementById("myBarChartBulan");
            var myLineChartBulan = new Chart(ctxBulan, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [
                    {
                    label: "Pemasukan",
                    backgroundColor: "#36A2EB",
                    data: pemasukanPerbulan,
                    },
                    {
                    label: "Pengeluaran",
                    backgroundColor: "#FF6384",
                    data: pengeluaranPerbulan,
                    },
                ],
            },
            options: {
                scales: {
                xAxes: [{
                    time: {
                    unit: 'month'
                    },
                    gridLines: {
                    display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                    display: true
                    }
                }],
                },
                legend: {
                display: true
                }
            }
            });


            var tahun = [{{ $chartPertahun }}]
            var nominalPemasukan = {{ $chartPemasukanPertahunNominal }}
            var nominalPengeluaran = {{ $chartPengeluaranPertahunNominal }}
            console.log(nominalPemasukan);
            console.log(nominalPengeluaran);
            var ctxTahun = document.getElementById("myBarChartTahun");
            var myLineChartTahun = new Chart(ctxTahun, {
            type: 'bar',
            data: {
                labels: tahun,
                datasets: [
                    {
                    label: "Pemasukan",
                    backgroundColor: "#36A2EB",
                    data: nominalPemasukan,
                    },
                    {
                    label: "Pengeluaran",
                    backgroundColor: "#FF6384",
                    data: nominalPengeluaran,
                    },
                ],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                        unit: 'year'
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            min: 10000,
                            // stepSize: nominalPengeluaran[0]
                        }
                    }],
                },
                legend: {
                    display: true
                }
            }
            });
        </script>
    @endsection
@endif
