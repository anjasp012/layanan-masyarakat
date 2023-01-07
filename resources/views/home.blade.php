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
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Anggota Pending</p>
                            <h2>{{ $anggotaPending }}</h2>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Anggota Aktif</p>
                            <h2>{{ $anggotaAktif }}</h2>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Anggota Tidak Aktif</p>
                            <h2>{{ $anggotaNonAktif }}</h2>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Relawan Pending</p>
                            <h2>{{ $relawanPending }}</h2>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Relawan Aktif</p>
                            <h2>{{ $relawanAktif }}</h2>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Relawan Tidak Aktif</p>
                            <h2>{{ $relawanNonAktif }}</h2>
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
    @if (auth()->user()->role_id == 3 || auth()->user()->role_id == 4)
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <p>Pengumuman Terbaru</p>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            @if ($pengumuman)
                                <h3>{{ $pengumuman->pengumuman }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-black text-white mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <p>Jumlah Pengumuman</p>
                        <h2>{{ $jumlahPengumuman }}</h2>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
