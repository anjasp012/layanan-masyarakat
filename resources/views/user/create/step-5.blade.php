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
                <form action="{{ route('anggota.store.step-5') }}" method="POST" novalidate enctype="multipart/form-data">
            @elseif (Request::routeis('staff.create.*'))
                <form action="{{ route('staff.store.step-5') }}" method="POST" novalidate enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row">
                    <table class="table col-md-6">
                        <tbody>
                            <tr>
                                <td class="w-25 fw-bold">Nama lengkap</td>
                                <td class="w-25">{{ $registerUser->nama_lengkap }}</td>
                                <td class="w-25 fw-bold">Nama Panggilan</td>
                                <td class="w-25">{{ $registerUser->nama_panggilan }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">NIK</td>
                                <td class="w-25">{{ $registerUser->nik }}</td>
                                <td class="w-25 fw-bold">Tempat Lahir</td>
                                <td class="w-25">{{ $registerUser->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Tanggal Lahir</td>
                                <td class="w-25">{{ $registerUser->tanggal_lahir }}</td>
                                <td class="w-25 fw-bold">Jenis Kelamin</td>
                                <td class="w-25">{{ $registerUser->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Golongan Darah</td>
                                <td class="w-25">{{ $registerUser->golongan_darah }}</td>
                                <td class="w-25 fw-bold">Provinsi</td>
                                <td class="w-25">{{ $laravolt['provinsi'] }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Kota</td>
                                <td class="w-25">{{ $laravolt['kota'] }}</td>
                                <td class="w-25 fw-bold">Kecamatan</td>
                                <td class="w-25">{{ $laravolt['kecamatan'] }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Kelurahan</td>
                                <td class="w-25">{{ $laravolt['kelurahan'] }}</td>
                                <td class="w-25 fw-bold">Rt Rw</td>
                                <td class="w-25">{{ $registerUser->rt_rw }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Alamat Sesuai KTP</td>
                                <td class="w-25">{{ $registerUser->alamat_sesuai_ktp }}</td>
                                <td class="w-25 fw-bold">Alamat Saat Ini</td>
                                <td class="w-25">{{ $registerUser->alamat_saat_ini }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Agama</td>
                                <td class="w-25">{{ $registerUser->agama }}</td>
                                <td class="w-25 fw-bold">Status Perkawinan</td>
                                <td class="w-25">{{ $registerUser->status_perkawinan }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Pekerjaan</td>
                                <td class="w-25">{{ $registerUser->pekerjaan }}</td>
                                <td class="w-25 fw-bold">Pendidikan Terakhir</td>
                                <td class="w-25">{{ $registerUser->pendidikan_terakhir }}</td>
                            </tr>
                            <tr>
                                <td class="w-25 fw-bold">Email</td>
                                <td class="w-25">{{ $registerUser->email }}</td>
                                <td class="w-25 fw-bold">Nomor Hp</td>
                                <td class="w-25">{{ $registerUser->no_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mb-3">
                    <label for="photo_diri" class="form-label">{{ __('Photo diri') }}</label>

                    <div class="col-md-6">
                        <div id="frames"></div>
                        <input id="photo_diri" type="file" class="form-control @error('photo_diri') is-invalid @enderror" name="photo_diri" value="{{ old('photo_diri') }}" required autocomplete="name" autofocus>
                        @error('photo_diri')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
    $(document).ready(function(){
        $('#photo_diri').change(function(){
            $("#frames").html('');
            for (var i = 0; i < $(this)[0].files.length; i++) {
                $("#frames").append('<img style="margin-bottom: 10px" src="'+window.URL.createObjectURL(this.files[i])+'" width="151.18px" height="	226.77px"/>');
            }
        });
    });
</script>
@endsection
