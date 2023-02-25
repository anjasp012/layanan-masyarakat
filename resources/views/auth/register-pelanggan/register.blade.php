@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerPelanggan.store') }}" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama_pengurus" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pengurus') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pengurus" type="text" class="form-control @error('nama_pengurus') is-invalid @enderror" name="nama_pengurus" value="{{ old('nama_pengurus') }}" required autocomplete="name" autofocus>
                                @error('nama_pengurus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_rumah_pengurus" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Rumah Pengurus') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_rumah_pengurus" type="text" class="form-control @error('alamat_rumah_pengurus') is-invalid @enderror" name="alamat_rumah_pengurus" value="{{ old('alamat_rumah_pengurus') }}" required autocomplete="name" autofocus>
                                @error('alamat_rumah_pengurus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-end">{{ __('No hp') }}</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="name" autofocus>
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo_diri" class="col-md-4 col-form-label text-md-end">{{ __('Photo Diri') }}</label>

                            <div class="col-md-6">
                                <input id="photo_diri" type="file" class="form-control @error('photo_diri') is-invalid @enderror" name="photo_diri" value="{{ old('photo_diri') }}" required autocomplete="name" autofocus>
                                @error('photo_diri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_rumah_ibadah" class="col-md-4 col-form-label text-md-end">{{ __('Nama Rumah Ibadah') }}</label>

                            <div class="col-md-6">
                                <input id="nama_rumah_ibadah" type="text" class="form-control @error('nama_rumah_ibadah') is-invalid @enderror" name="nama_rumah_ibadah" value="{{ old('nama_rumah_ibadah') }}" required autocomplete="name" autofocus>
                                @error('nama_rumah_ibadah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_rumah_ibadah" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Rumah Ibadah') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_rumah_ibadah" type="text" class="form-control @error('alamat_rumah_ibadah') is-invalid @enderror" name="alamat_rumah_ibadah" value="{{ old('alamat_rumah_ibadah') }}" required autocomplete="name" autofocus>
                                @error('alamat_rumah_ibadah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_lengkap_rumah_ibadah" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Lengkap Rumah Ibadah') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_lengkap_rumah_ibadah" type="text" class="form-control @error('alamat_lengkap_rumah_ibadah') is-invalid @enderror" name="alamat_lengkap_rumah_ibadah" value="{{ old('alamat_lengkap_rumah_ibadah') }}" required autocomplete="name" autofocus>
                                @error('alamat_lengkap_rumah_ibadah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo_rumah_ibadah" class="col-md-4 col-form-label text-md-end">{{ __('Photo Rumah Ibadah') }}</label>

                            <div class="col-md-6">
                                <input id="photo_rumah_ibadah" type="file" class="form-control @error('photo_rumah_ibadah') is-invalid @enderror" name="photo_rumah_ibadah" value="{{ old('photo_rumah_ibadah') }}" required autocomplete="name" autofocus>
                                @error('photo_rumah_ibadah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="name" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
