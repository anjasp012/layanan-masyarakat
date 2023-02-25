@extends('layouts.app')

@section('content')
    @if (Request::routeIs('anggota.create.*'))
        <h1 class="mt-4">Add Anggota</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Anggota</a></li>
            <li class="breadcrumb-item">Add Anggota</li>
        </ol>
    @elseif (Request::routeis('staff.create.*'))
        <h1 class="mt-4">Add Staff</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Staff</a></li>
            <li class="breadcrumb-item">Add Staff</li>
        </ol>
    @endif
    <div class="row">
        <div class="col-md-6">
            @if (Request::routeIs('anggota.create.*'))
                <form action="{{ route('anggota.store.step-1') }}" method="POST" novalidate>
            @elseif (Request::routeis('staff.create.*'))
                <form action="{{ route('staff.store.step-1') }}" method="POST" novalidate>
            @endif
                @csrf
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">{{ __('Nama Lengkap') }}</label>
                    <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="name" autofocus>
                    @error('nama_lengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_panggilan" class="form-label">{{ __('Nama Panggilan') }}</label>
                    <input id="nama_panggilan" type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" value="{{ old('nama_panggilan') }}" required autocomplete="name" autofocus>
                    @error('nama_panggilan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">{{ __('NIK') }}</label>
                    <input id="name" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="name" autofocus>
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">{{ __('Tempat Lahir') }}</label>
                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="name" autofocus>
                    @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
                    <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="name" autofocus>
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">{{ __('Jenis Kelamin') }}</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                        <option value=""></option>
                        @foreach ($jenisKelamin as $item)
                            <option {{ (old('jenis_kelamin') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="golongan_darah" class="form-label">{{ __('Golongan Darah') }}</label>
                    <select name="golongan_darah" id="golongan_darah" class="form-select @error('golongan_darah') is-invalid @enderror" name="golongan_darah">
                        <option value=""></option>
                        @foreach ($golonganDarah as $item)
                            <option {{ (old('golongan_darah') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @error('golongan_darah')
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
