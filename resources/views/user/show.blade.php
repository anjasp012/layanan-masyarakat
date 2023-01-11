@extends('layouts.app')

@section('content')
    @if (Request::routeIs('anggota.show'))
        <h1 class="mt-4">Detail Anggota</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Detail Anggota</li>
        </ol>
    @elseif (Request::routeIs('relawan.show'))
        <h1 class="mt-4">Detail Relawan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Detail Relawan</li>
        </ol>
    @elseif (Request::routeIs('staff.show'))
        <h1 class="mt-4">Detail Staff</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Detail Staff</li>
        </ol>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input readonly type="text" name="nama_lengkap" class="form-control" value="{{ $user->nama_lengkap }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                            <input readonly type="text" name="nama_panggilan" class="form-control" value="{{ $user->nama_panggilan }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nik</label>
                            <input readonly type="text" name="nik" class="form-control" value="{{ $user->nik }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input readonly type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input readonly type="text" name="tempat_lahir" class="form-control" value="{{ $user->tempat_lahir }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input readonly type="text" name="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input readonly type="text" name="jenis_kelamin" class="form-control" value="{{ $user->jenis_kelamin }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <input readonly type="text" name="golongan_darah" class="form-control" value="{{ $user->golongan_darah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input readonly type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ $user->agama }}">
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <input readonly type="text" name="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror" value="{{ $user->status_perkawinan }}">
                            @error('status_perkawinan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                            <input readonly type="text" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{ $user->pendidikan_terakhir }}">
                            @error('pendidikan_terakhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input readonly type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $user->pekerjaan }}">
                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input readonly type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" value="{{ $user->provinsi }}">
                            @error('provinsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota/Kabupaten</label>
                            <input readonly type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ $user->kota }}">
                            @error('kota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input readonly type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ $user->kecamatan }}">
                            @error('kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label">Kelurahan</label>
                            <input readonly type="text" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" value="{{ $user->kelurahan }}">
                            @error('kelurahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="rt_rw" class="form-label">Rt/Rw</label>
                            <input readonly type="text" name="rt_rw" class="form-control @error('rt_rw') is-invalid @enderror" value="{{ $user->rt_rw }}">
                            @error('rt_rw')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_sesuai_ktp" class="form-label">Alamat Sesuai Ktp</label>
                            <textarea readonly name="alamat_sesuai_ktp" class="form-control @error('alamat_sesuai_ktp') is-invalid @enderror">{{ $user->alamat_sesuai_ktp }}</textarea>
                            @error('alamat_sesuai_ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_saat_ini" class="form-label">Alamat Saat Ini</label>
                            <textarea readonly name="alamat_saat_ini" class="form-control @error('alamat_saat_ini') is-invalid @enderror">{{ $user->alamat_saat_ini }}</textarea>
                            @error('alamat_saat_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            @if (Request::routeIs('anggota.*'))
                                <a class="btn btn-warning btn-sm" href="{{ route('anggota.edit', $user->id) }}">Edit</a>
                            @elseif (Request::routeIs('staff.*'))
                                <a class="btn btn-warning btn-sm" href="{{ route('staff.edit', $user->id) }}">Edit</a>
                            @elseif (Request::routeIs('relawan.*'))
                                <a class="btn btn-warning btn-sm" href="{{ route('relawan.edit', $user->id) }}">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
