@extends('layouts.app')

@section('content')
<h1 class="mt-4">Kartu Tanda Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kartu Tanda Anggota</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h4 class="fw-bold text-center">Depan</h4>
                <div class="position-relative shadow">
                    <img src="{{ asset('assets/img/kta_depan_polos.jpg') }}" class="img-fluid" alt="">
                    <div class="position-absolute top-0 end-0">
                        <div class="me-2 mt-2">
                            <div class="border border-3 border-warning overflow-hidden rounded-circle" style="width: 6rem;height: 7rem;">
                                <img class="img-fluid h-100 w-100" src={{ asset('storage/photo_diri/'.$user->photo_diri) }} alt="">
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0">
                        <div class="ms-4 mb-3">
                            <h3 class="fw-bold text-white lh-1">{{ $user->nama_lengkap }}</h3>
                            <h3 class="fw-lighter fs-2 text-white lh-1">{{ $user->no_kta }}</h3>
                            <h3 class="fw-bold text-white lh-1 text-capitalize">{{ strtolower($user->role->nama_role) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="fw-bold text-center">Belakang</h4>
                <div class="position-relative shadow">
                    <img src="{{ asset('assets/img/kta_belakang.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
