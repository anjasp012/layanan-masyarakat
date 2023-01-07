@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Add Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Anggota</a></li>
        <li class="breadcrumb-item">Add Anggota</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('anggota.store.step-2') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="provinsi" class="form-label text-md-end">{{ __('provinsi') }}</label>
                    <input id="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ old('provinsi') }}" required autocomplete="name" autofocus>
                    @error('provinsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kota" class="form-label text-md-end">{{ __('kota') }}</label>
                    <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required autocomplete="name" autofocus>
                    @error('kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label text-md-end">{{ __('kecamatan') }}</label>
                    <input id="name" type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan') }}" required autocomplete="name" autofocus>
                    @error('kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kelurahan" class="form-label text-md-end">{{ __('kelurahan') }}</label>
                    <input id="kelurahan" type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ old('kelurahan') }}" required autocomplete="name" autofocus>
                    @error('kelurahan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="rt_rw" class="form-label text-md-end">{{ __('rt_rw') }}</label>
                    <input id="rt_rw" type="text" class="form-control @error('rt_rw') is-invalid @enderror" name="rt_rw" value="{{ old('rt_rw') }}" required autocomplete="name" autofocus>
                    @error('rt_rw')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat_sesuai_ktp" class="form-label text-md-end">{{ __('alamat_sesuai_ktp') }}</label>
                    <input id="alamat_sesuai_ktp" type="text" class="form-control @error('alamat_sesuai_ktp') is-invalid @enderror" name="alamat_sesuai_ktp" value="{{ old('alamat_sesuai_ktp') }}" required autocomplete="name" autofocus>
                    @error('alamat_sesuai_ktp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat_saat_ini" class="form-label">{{ __('alamat_saat_ini') }}</label>
                    <input id="alamat_saat_ini" type="text" class="form-control @error('alamat_saat_ini') is-invalid @enderror" name="alamat_saat_ini" value="{{ old('alamat_saat_ini') }}" required autocomplete="name" autofocus>
                    @error('alamat_saat_ini')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Next</button>
                </div>
            </form>
        </div>
    </div>
@endsection
