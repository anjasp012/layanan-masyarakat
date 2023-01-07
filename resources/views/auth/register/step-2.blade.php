@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.store.step-2') }}" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-end">{{ __('provinsi') }}</label>

                            <div class="col-md-6">
                                <input id="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ old('provinsi') }}" required autocomplete="name" autofocus>
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kota" class="col-md-4 col-form-label text-md-end">{{ __('kota') }}</label>

                            <div class="col-md-6">
                                <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required autocomplete="name" autofocus>
                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-end">{{ __('kecamatan') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan') }}" required autocomplete="name" autofocus>
                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-end">{{ __('kelurahan') }}</label>

                            <div class="col-md-6">
                                <input id="kelurahan" type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ old('kelurahan') }}" required autocomplete="name" autofocus>
                                @error('kelurahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rt_rw" class="col-md-4 col-form-label text-md-end">{{ __('rt_rw') }}</label>

                            <div class="col-md-6">
                                <input id="rt_rw" type="text" class="form-control @error('rt_rw') is-invalid @enderror" name="rt_rw" value="{{ old('rt_rw') }}" required autocomplete="name" autofocus>
                                @error('rt_rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_sesuai_ktp" class="col-md-4 col-form-label text-md-end">{{ __('alamat_sesuai_ktp') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_sesuai_ktp" type="text" class="form-control @error('alamat_sesuai_ktp') is-invalid @enderror" name="alamat_sesuai_ktp" value="{{ old('alamat_sesuai_ktp') }}" required autocomplete="name" autofocus>
                                @error('alamat_sesuai_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_saat_ini" class="col-md-4 col-form-label text-md-end">{{ __('alamat_saat_ini') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_saat_ini" type="text" class="form-control @error('alamat_saat_ini') is-invalid @enderror" name="alamat_saat_ini" value="{{ old('alamat_saat_ini') }}" required autocomplete="name" autofocus>
                                @error('alamat_saat_ini')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
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
