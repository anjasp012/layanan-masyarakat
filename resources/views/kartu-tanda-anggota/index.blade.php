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
            <div class="col-md-4 mb-3">
                <h4 class="fw-bold text-center">Depan</h4>
                <div class="position-relative shadow">
                    @if ($kta->kta_depan ==1)
                        <img src="{{ asset('assets/img/kta_depan_polos.jpg') }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('storage/template-kta/' .$kta->kta_depan) }}" class="img-fluid" alt="">
                    @endif
                    <div class="position-absolute top-0 end-0">
                        <div class="me-2 mt-2">
                            <div class="border border-3 border-warning overflow-hidden rounded-circle" style="width: 6rem;height: 7rem;">
                                <img class="img-fluid h-100 w-100" src="{{ asset('storage/photo_diri/'.$user->photo_diri) }}" alt="">
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
            <div class="col-md-4 mb-3">
                <h4 class="fw-bold text-center">Belakang</h4>
                <div class="position-relative shadow">
                    @if ($kta->kta_belakang == 1)
                        <img src="{{ asset('assets/img/kta_belakang.jpg') }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ asset('storage/template-kta/' .$kta->kta_belakang) }}" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        @if (auth()->user()->role_id == 1)
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <form action="{{ route('kartuTandaAnggota.update', $kta->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="kta_depan" class="form-label fw-bold">Ubah Template Depan</label>
                            <input type="file" class="form-control" id="kta_depan" name="kta_depan">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 mb-3">
                    <form action="{{ route('kartuTandaAnggota.update', $kta->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="kta_belakang" class="form-label fw-bold">Ubah Template Belakang</label>
                            <input type="file" class="form-control" id="kta_belakang" name="kta_belakang">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
