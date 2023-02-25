@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Profile</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Photo</label>
                            <input type="file" name="photo_diri" class="form-control @error('photo_diri') is-invalid @enderror">
                            @error('photo_diri')
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
                            <label for="nama_ketua_pengurus_rumah_ibadah" class="form-label">Nama Ketua Pengurus Rumah Ibadah</label>
                            <input type="text" name="nama_ketua_pengurus_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_pengurus }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_pengurus" class="form-label">Alamat Rumah Pengurus</label>
                            <input type="text" name="alamat_rumah_pengurus" class="form-control" value="{{ $pelanggan->alamat_rumah_pengurus }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nomor_pelanggan" class="form-label">Nomor Pelanggan</label>
                            <input readonly type="text" name="nik" class="form-control" value="{{ $pelanggan->no_pelanggan }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                            <input type="text" name="nama_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_ibadah" class="form-label">Alamat rumah ibadah</label>
                            <input type="text" name="alamat_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_lengkap_rumah_ibadah" class="form-label">Alamat lengkap rumah ibadah</label>
                            <input type="text" name="alamat_lengkap_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_lengkap_rumah_ibadah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="photo_rumah_ibadah" class="form-label">Photo Rumah Ibadah</label>
                            <input type="file" name="photo_rumah_ibadah" class="form-control @error('photo_rumah_ibadah') is-invalid @enderror">
                            @error('photo_rumah_ibadah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('profilePelanggan.editProfile') }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content-mobile')
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Profile</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Photo</label>
                            <input type="file" name="photo_diri" class="form-control @error('photo_diri') is-invalid @enderror">
                            @error('photo_diri')
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
                            <label for="nama_ketua_pengurus_rumah_ibadah" class="form-label">Nama Ketua Pengurus Rumah Ibadah</label>
                            <input type="text" name="nama_ketua_pengurus_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_pengurus }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_pengurus" class="form-label">Alamat Rumah Pengurus</label>
                            <input type="text" name="alamat_rumah_pengurus" class="form-control" value="{{ $pelanggan->alamat_rumah_pengurus }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nomor_pelanggan" class="form-label">Nomor Pelanggan</label>
                            <input readonly type="text" name="nik" class="form-control" value="{{ $pelanggan->no_pelanggan }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                            <input type="text" name="nama_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_ibadah" class="form-label">Alamat rumah ibadah</label>
                            <input type="text" name="alamat_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_lengkap_rumah_ibadah" class="form-label">Alamat lengkap rumah ibadah</label>
                            <input type="text" name="alamat_lengkap_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_lengkap_rumah_ibadah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="photo_rumah_ibadah" class="form-label">Photo Rumah Ibadah</label>
                            <input type="file" name="photo_rumah_ibadah" class="form-control @error('photo_rumah_ibadah') is-invalid @enderror">
                            @error('photo_rumah_ibadah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('profilePelanggan.editProfile') }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
