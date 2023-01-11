@extends('layouts.app')

@section('content')
    @if (Request::routeIs('anggota.edit'))
    <h1 class="mt-4">Edit Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Edit Anggota</li>
    </ol>
    @elseif (Request::routeIs('relawan.edit'))
    <h1 class="mt-4">Edit Relawan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Edit Relawan</li>
    </ol>
    @elseif (Request::routeIs('staff.edit'))
    <h1 class="mt-4">Edit Staff</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Edit Staff</li>
    </ol>
    @endif

    <div class="row">
        <div class="col-md-12">
            @if (Request::routeIs('anggota.edit'))
            <form action="{{ route('anggota.update', $user->id) }}" method="POST">
            @elseif (Request::routeIs('relawan.edit'))
            <form action="{{ route('relawan.update', $user->id) }}" method="POST">
            @elseif (Request::routeIs('staff.edit'))
            <form action="{{ route('staff.update', $user->id) }}" method="POST">
            @endif
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ $user->nama_lengkap }}">
                            @error('nama_lengkap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" value="{{ $user->nama_panggilan }}">
                            @error('nama_panggilan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nik</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $user->nik }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $user->no_hp }}">
                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $user->tempat_lahir }}">
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $user->tanggal_lahir }}">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ $user->jenis_kelamin }}">
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <input type="text" name="golongan_darah" class="form-control @error('golongan_darah') is-invalid @enderror" value="{{ $user->golongan_darah }}">
                            @error('golongan_darah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ $user->agama }}">
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <input type="text" name="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror" value="{{ $user->status_perkawinan }}">
                            @error('status_perkawinan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{ $user->pendidikan_terakhir }}">
                            @error('pendidikan_terakhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $user->pekerjaan }}">
                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="id_provinsi" class="form-label">Provinsi</label>
                            @php
                                $provinces = new App\Http\Controllers\DependantDropdownController;
                                $provinces = $provinces->provinces();
                            @endphp
                            <select class="form-select @error('id_provinsi') is-invalid @enderror" name="id_provinsi" id="id_provinsi" required>
                                <option></option>
                                @foreach ($provinces as $item)
                                    <option {{ old('id_provinsi', $user->id_provinsi) == $item->id ? 'selected' : ''  }} value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                @endforeach
                            </select>
                            @error('id_provinsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
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
                    </div>
                    <div class="col-md-3">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
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
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="rt_rw" class="form-label">Rt/Rw</label>
                            <input type="text" name="rt_rw" class="form-control @error('rt_rw') is-invalid @enderror" value="{{ $user->rt_rw }}">
                            @error('rt_rw')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_sesuai_ktp" class="form-label">Alamat Sesuai Ktp</label>
                            <textarea name="alamat_sesuai_ktp" class="form-control @error('alamat_sesuai_ktp') is-invalid @enderror">{{ $user->alamat_sesuai_ktp }}</textarea>
                            @error('alamat_sesuai_ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_saat_ini" class="form-label">Alamat Saat Ini</label>
                            <textarea name="alamat_saat_ini" class="form-control @error('alamat_saat_ini') is-invalid @enderror">{{ $user->alamat_saat_ini }}</textarea>
                            @error('alamat_saat_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
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
            onChangeSelect('{{ route("cities") }}', `{{ old('id_provinsi', $user->id_provinsi) }}`, 'id_kota', `{{ old('id_kota', $user->id_kota) }}`);
        }
        if ( $('#id_kota').val != "") {
            onChangeSelect('{{ route("districts") }}', `{{ old('id_kota', $user->id_kota) }}`, 'id_kecamatan', `{{ old('id_kecamatan', $user->id_kecamatan) }}`);
        }
        if ( $('#id_kecamatan').val != "") {
            onChangeSelect('{{ route("villages") }}', `{{ old('id_kecamatan', $user->id_kecamatan) }}`, 'id_kelurahan', `{{ old('id_kelurahan', $user->id_kelurahan) }}`);
        }
        $('#id_provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'id_kota', `{{ old('id_kota', $user->id_kota) }}`);
        });$('#id_kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'id_kecamatan', `{{ old('id_kecamatan', $user->id_kecamatan) }}`);
        });$('#id_kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'id_kelurahan', `{{ old('id_kelurahan', $user->id_kelurahan) }}`);
        });
        });
    </script>
@endsection
