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
                            <label for="photo_diri" class="form-label d-block">Photo</label>
                            <img src="{{ asset('storage/pelanggan/photo-diri/'.$pelanggan->photo_diri) }}" class="rounded" height = "150" width = "150">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_ketua_pengurus_rumah_ibadah" class="form-label">Nama Ketua Pengurus Rumah Ibadah</label>
                            <input readonly type="text" name="nama_ketua_pengurus_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_pengurus }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input readonly type="email" name="email" class="form-control" value="{{ $pelanggan->email }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_pengurus" class="form-label">Alamat Rumah Pengurus</label>
                            <input readonly type="text" name="alamat_rumah_pengurus" class="form-control" value="{{ $pelanggan->alamat_rumah_pengurus }}">
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
                            <input readonly type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                            <input readonly type="text" name="nama_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_ibadah" class="form-label">Alamat rumah ibadah</label>
                            <input readonly type="text" name="alamat_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_lengkap_rumah_ibadah" class="form-label">Alamat lengkap rumah ibadah</label>
                            <input readonly type="text" name="alamat_lengkap_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_lengkap_rumah_ibadah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="photo_rumah_ibadah" class="form-label d-block">Photo Rumah Ibadah</label>
                            <img src="{{ asset('storage/pelanggan/photo-rumah-ibadah/'.$pelanggan->photo_rumah_ibadah) }}" class="rounded" height = "150" width = "150">
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
                            <label for="photo_diri" class="form-label d-block">Photo</label>
                            <img src="{{ asset('storage/pelanggan/photo-diri/'.$pelanggan->photo_diri) }}" class="rounded" height = "150" width = "150">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_ketua_pengurus_rumah_ibadah" class="form-label">Nama Ketua Pengurus Rumah Ibadah</label>
                            <input readonly type="text" name="nama_ketua_pengurus_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_pengurus }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input readonly type="email" name="email" class="form-control" value="{{ $pelanggan->email }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_pengurus" class="form-label">Alamat Rumah Pengurus</label>
                            <input readonly type="text" name="alamat_rumah_pengurus" class="form-control" value="{{ $pelanggan->alamat_rumah_pengurus }}">
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
                            <input readonly type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                            <input readonly type="text" name="nama_rumah_ibadah" class="form-control" value="{{ $pelanggan->nama_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_ibadah" class="form-label">Alamat rumah ibadah</label>
                            <input readonly type="text" name="alamat_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_lengkap_rumah_ibadah" class="form-label">Alamat lengkap rumah ibadah</label>
                            <input readonly type="text" name="alamat_lengkap_rumah_ibadah" class="form-control" value="{{ $pelanggan->alamat_lengkap_rumah_ibadah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="photo_rumah_ibadah" class="form-label d-block">Photo Rumah Ibadah</label>
                            <img src="{{ asset('storage/pelanggan/photo-rumah-ibadah/'.$pelanggan->photo_rumah_ibadah) }}" class="rounded" height = "150" width = "150">
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
