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
                    <label for="id_provinsi" class="form-label text-md-end">{{ __('id_provinsi') }}</label>
                    @php
                        $provinces = new App\Http\Controllers\DependantDropdownController;
                        $provinces = $provinces->provinces();
                    @endphp
                    <select class="form-select @error('id_provinsi') is-invalid @enderror" name="id_provinsi" id="id_provinsi" required>
                        <option></option>
                        @foreach ($provinces as $item)
                            <option {{ $item->id == old('id_provinsi' ? 'selected' : '') }} value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                    @error('id_provinsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kota" class="form-label text-md-end">{{ __('id_kota') }}</label>
                    <select class="form-select @error('id_kota') is-invalid @enderror" name="id_kota" id="id_kota" required>
                        <option></option>
                    </select>
                    @error('id_kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kecamatan" class="form-label text-md-end">{{ __('id_kecamatan') }}</label>
                    <select class="form-select @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" required>
                        <option></option>
                    </select>
                    @error('id_kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kelurahan" class="form-label text-md-end">{{ __('id_kelurahan') }}</label>
                    <select class="form-select @error('id_kelurahan') is-invalid @enderror" name="id_kelurahan" id="id_kelurahan" required>
                        <option></option>
                    </select>
                    @error('id_kelurahan')
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

@section('script')
    <script>
        function onChangeSelect(url, id, name) {
        // send ajax request to get the cities of the selected province and append to the select tag
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
                $('#' + name).append('<option value="' + key + '">' + value + '</option>');
            });
            }
        });
        }$(function () {
        $('#id_provinsi').on('change selected', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'id_kota');
        });$('#id_kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'id_kecamatan');
        });$('#id_kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'id_kelurahan');
        });
        });
    </script>
@endsection
