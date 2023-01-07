@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Edit Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Profile</a></li>
        <li class="breadcrumb-item">Edit Profile</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('user.updateProfile') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ $user->nama_lengkap }}">
                            @error('nama_lengkap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" value="{{ $user->nama_panggilan }}">
                            @error('nama_panggilan')
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
                            <label for="nik" class="form-label">Nik</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $user->nik }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $user->no_hp }}">
                            @error('no_hp')
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
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $user->tempat_lahir }}">
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $user->tanggal_lahir }}">
                            @error('tanggal_lahir')
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
                            <label for="jenis_Kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_Kelamin" class="form-control @error('jenis_Kelamin') is-invalid @enderror" value="{{ $user->jenis_Kelamin }}">
                            @error('jenis_Kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <input type="text" name="golongan_darah" class="form-control @error('golongan_darah') is-invalid @enderror" value="{{ $user->golongan_darah }}">
                            @error('golongan_darah')
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
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ $user->agama }}">
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
                            <input type="text" name="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror" value="{{ $user->status_perkawinan }}">
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
                            <input type="text" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{ $user->pendidikan_terakhir }}">
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
                            <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $user->pekerjaan }}">
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
                            <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" value="{{ $user->provinsi }}">
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
                            <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ $user->kota }}">
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
                            <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ $user->kecamatan }}">
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
                            <input type="text" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" value="{{ $user->kelurahan }}">
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
                            <input type="text" name="rt_rw" class="form-control @error('rt_rw') is-invalid @enderror" value="{{ $user->rt_rw }}">
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
                            <textarea name="alamat_sesuai_ktp" class="form-control @error('alamat_sesuai_ktp') is-invalid @enderror">{{ $user->alamat_sesuai_ktp }}</textarea>
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
                            <textarea name="alamat_saat_ini" class="form-control @error('alamat_saat_ini') is-invalid @enderror">{{ $user->alamat_saat_ini }}</textarea>
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
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
