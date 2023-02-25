@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.store.step-3') }}" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="agama" class="col-md-4 col-form-label text-md-end">{{ __('Agama') }}</label>

                            <div class="col-md-6">
                                <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror" name="agama">
                                    <option value=""></option>
                                    @foreach ($agama as $item)
                                        <option {{ (old('agama') == $item) ? 'selected' : '' }} value="{{ $item }}">{{ strtoupper($item) }}</option>
                                    @endforeach
                                </select>
                                {{-- <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}" required autocomplete="name" autofocus> --}}
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status_perkawinan" class="col-md-4 col-form-label text-md-end">{{ __('Status perkawinan') }}</label>

                            <div class="col-md-6">
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
                        </div>

                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
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
                        </div>

                        <div class="row mb-3">
                            <label for="pendidikan_terakhir" class="col-md-4 col-form-label text-md-end">{{ __('Pendidikan terakhir') }}</label>

                            <div class="col-md-6">
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
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="photo_diri" class="col-md-4 col-form-label text-md-end">{{ __('Photo diri') }}</label>

                            <div class="col-md-6">
                                <input id="photo_diri" type="text" class="form-control @error('photo_diri') is-invalid @enderror" name="photo_diri" value="{{ old('photo_diri') }}" required autocomplete="name" autofocus>
                                @error('photo_diri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

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
