@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Add Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Anggota</a></li>
        <li class="breadcrumb-item">Add Anggota</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('pelanggan.store') }}" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_pengurus" class="form-label">{{ __('Nama Pengurus') }}</label>
                    <input id="nama_pengurus" type="text" class="form-control @error('nama_pengurus') is-invalid @enderror" name="nama_pengurus" value="{{ old('nama_pengurus') }}" required autocomplete="name" autofocus>
                    @error('nama_pengurus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat_rumah_pengurus" class="form-label">{{ __('Alamat Rumah Pengurus') }}</label>
                    <input id="alamat_rumah_pengurus" type="text" class="form-control @error('alamat_rumah_pengurus') is-invalid @enderror" name="alamat_rumah_pengurus" value="{{ old('alamat_rumah_pengurus') }}" required autocomplete="name" autofocus>
                    @error('alamat_rumah_pengurus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">{{ __('No Hp') }}</label>
                    <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="name" autofocus>
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo_diri" class="form-label">{{ __('Photo') }}</label>
                    <input id="photo_diri" type="file" class="form-control @error('photo_diri') is-invalid @enderror" name="photo_diri" value="{{ old('photo_diri') }}" required autocomplete="name" autofocus>
                    @error('photo_diri')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_rumah_ibadah" class="form-label">{{ __('Nama Rumah Ibadah') }}</label>
                    <input id="nama_rumah_ibadah" type="text" class="form-control @error('nama_rumah_ibadah') is-invalid @enderror" name="nama_rumah_ibadah" value="{{ old('nama_rumah_ibadah') }}" required autocomplete="name" autofocus>
                    @error('nama_rumah_ibadah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat_rumah_ibadah" class="form-label">{{ __('Alamat Rumah Ibadah') }}</label>
                    <input id="alamat_rumah_ibadah" type="text" class="form-control @error('alamat_rumah_ibadah') is-invalid @enderror" name="alamat_rumah_ibadah" value="{{ old('alamat_rumah_ibadah') }}" required autocomplete="name" autofocus>
                    @error('alamat_rumah_ibadah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat_lengkap_rumah_ibadah" class="form-label">{{ __('Alamat Lengkap Rumah Ibadah') }}</label>
                    <input id="alamat_lengkap_rumah_ibadah" type="text" class="form-control @error('alamat_lengkap_rumah_ibadah') is-invalid @enderror" name="alamat_lengkap_rumah_ibadah" value="{{ old('alamat_lengkap_rumah_ibadah') }}" required autocomplete="name" autofocus>
                    @error('alamat_lengkap_rumah_ibadah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo_rumah_ibadah" class="form-label">{{ __('Photo Rumah Ibadah') }}</label>
                    <input id="photo_rumah_ibadah" type="file" class="form-control @error('photo_rumah_ibadah') is-invalid @enderror" name="photo_rumah_ibadah" value="{{ old('photo_rumah_ibadah') }}" required autocomplete="name" autofocus>
                    @error('photo_rumah_ibadah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="name" autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
