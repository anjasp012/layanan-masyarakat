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
            <form action="{{ route('anggota.store.step-3') }}" method="POST" novalidate>
        @elseif (Request::routeis('staff.create.*'))
            <form action="{{ route('staff.store.step-3') }}" method="POST" novalidate>
        @endif
                @csrf
                <div class="mb-3">
                    <label for="agama" class="form-label">{{ __('Agama') }}</label>
                    <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror" name="agama">
                        <option value=""></option>
                        @foreach ($agama as $item)
                            <option {{ (old('agama') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label text-md-end">{{ __('Status perkawinan') }}</label>
                    <select name="status_perkawinan" id="status_perkawinan" class="form-select @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan">
                        <option value=""></option>
                        @foreach ($statusPerkawinan as $item)
                            <option {{ (old('status_perkawinan') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @error('status_perkawinan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label text-md-end">{{ __('Pekerjaan') }}</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-select @error('pekerjaan') is-invalid @enderror" name="pekerjaan">
                        <option value=""></option>
                        @foreach ($pekerjaan as $item)
                            <option {{ (old('pekerjaan') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @error('pekerjaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pendidikan_terakhir" class="form-label text-md-end">{{ __('Pendidikan terakhir') }}</label>
                    <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir">
                        <option value=""></option>
                        @foreach ($pendidikanTerakhir as $item)
                            <option {{ (old('pendidikan_terakhir') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
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
