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
                            <label for="provinsi" class="col-md-4 col-form-label text-md-end">{{ __('Provinsi') }}</label>

                            <div class="col-md-6">
                                @php
                                    $provinces = new App\Http\Controllers\DependantDropdownController;
                                    $provinces = $provinces->provinces();
                                @endphp
                                <select class="form-select @error('id_provinsi') is-invalid @enderror" name="id_provinsi" id="id_provinsi" required>
                                    <option></option>
                                    @foreach ($provinces as $item)
                                        <option  {{ old('id_provinsi') == $item->id ? 'selected' : ''  }} value="{{ $item->id}}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                @error('id_provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kota" class="col-md-4 col-form-label text-md-end">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('id_kota') is-invalid @enderror" name="id_kota" id="id_kota" required>
                                    <option></option>
                                </select>
                                @error('id_kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-end">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" required>
                                    <option></option>
                                </select>
                                @error('id_kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-end">{{ __('Kelurahan') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('id_kelurahan') is-invalid @enderror" name="id_kelurahan" id="id_kelurahan" required>
                                    <option></option>
                                </select>
                                @error('id_kelurahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rt_rw" class="col-md-4 col-form-label text-md-end">{{ __('RT / RW') }}</label>

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

@section('script')
    <script>

        function onChangeSelect(url, id, name, old) {
            // console.log(id);
        $.ajax({
            url: url,
            type: 'GET',
            data: {
            id: id
            },
            success: function (data) {
            $('#' + name).empty();
            $('#' + name).append('<option></option>');
            $.each(data, function (key, value) {
                $('#' + name).append($('<option>', {
                    value: key,
                    text: value,
                    selected: key == old ? true : false
                }));
            });
            }
        });
        }$(function () {
        if ( $('#id_provinsi').val != "") {
            onChangeSelect('{{ route("cities") }}', `{{ old('id_provinsi') }}`, 'id_kota', `{{ old('id_kota') }}`);
        }
        if ( $('#id_kota').val != "") {
            onChangeSelect('{{ route("districts") }}', `{{ old('id_kota') }}`, 'id_kecamatan', `{{ old('id_kecamatan') }}`);
        }
        if ( $('#id_kecamatan').val != "") {
            onChangeSelect('{{ route("villages") }}', `{{ old('id_kecamatan') }}`, 'id_kelurahan', `{{ old('id_kelurahan') }}`);
        }
        $('#id_provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'id_kota', `{{ old('id_kota') }}`);
        });$('#id_kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'id_kecamatan', `{{ old('id_kecamatan') }}`);
        });$('#id_kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'id_kelurahan', `{{ old('id_kelurahan') }}`);
        });
        });
    </script>
@endsection
