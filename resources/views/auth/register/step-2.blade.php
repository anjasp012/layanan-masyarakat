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
                            <label for="alamat_sesuai_ktp" class="col-md-4 col-form-label text-md-end">{{ __('Alamat sesuai KTP') }}</label>

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
                            <label for="alamat_saat_ini" class="col-md-4 col-form-label text-md-end">{{ __('Alamat saat ini') }}</label>

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
