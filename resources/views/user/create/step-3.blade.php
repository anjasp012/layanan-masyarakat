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
            <form action="{{ route('anggota.store.step-3') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="agama" class="form-label">{{ __('agama') }}</label>
                    <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}" required autocomplete="name" autofocus>
                    @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label text-md-end">{{ __('status_perkawinan') }}</label>
                    <input id="status_perkawinan" type="text" class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" value="{{ old('status_perkawinan') }}" required autocomplete="name" autofocus>
                    @error('status_perkawinan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label text-md-end">{{ __('pekerjaan') }}</label>
                    <input id="name" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="name" autofocus>
                    @error('pekerjaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pendidikan_terakhir" class="form-label text-md-end">{{ __('pendidikan_terakhir') }}</label>
                    <input id="pendidikan_terakhir" type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}" required autocomplete="name" autofocus>
                    @error('pendidikan_terakhir')
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
