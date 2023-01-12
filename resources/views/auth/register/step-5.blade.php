@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.store.step-5') }}" novalidate enctype="multipart/form-data">
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
                                        <td class="w-25">{{ $registerUser->jenis_Kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-25 fw-bold">Golongan Darah</td>
                                        <td class="w-25">{{ $registerUser->golongan_darah }}</td>
                                        <td class="w-25 fw-bold">Provinsi</td>
                                        <td class="w-25">{{ $registerUser->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-25 fw-bold">Kota</td>
                                        <td class="w-25">{{ $registerUser->kota }}</td>
                                        <td class="w-25 fw-bold">Kecamatan</td>
                                        <td class="w-25">{{ $registerUser->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-25 fw-bold">Kelurahan</td>
                                        <td class="w-25">{{ $registerUser->kelurahan }}</td>
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
                            <label for="photo_diri" class="form-label">{{ __('photo_diri') }}</label>

                            <div class="col-md-6">
                                {{-- <input type="file" id="image" name="image[]" multiple /><br/> --}}
                                <div id="frames"></div>
                                <input id="photo_diri" type="file" class="form-control @error('photo_diri') is-invalid @enderror" name="photo_diri" value="{{ old('photo_diri') }}" required autocomplete="name" autofocus>
                                @error('photo_diri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="persetujuan1">
                                    <label class="form-check-label @error('persetujuan1') is-invalid @enderror" for="flexCheckDefault">
                                        Dengan ini saya menyatakan bahwa saya MENYETUJUI AD / ART ORGANISASI
                                    </label>
                                    @error('persetujuan1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="persetujuan2">
                                  <label class="form-check-label @error('persetujuan2') is-invalid @enderror" for="flexCheckChecked">
                                    Saya menyatakan bahwa semua data yang tertulis di atas ini adalah benar dan saya bertanggung jawab penuh atas keabsahan data tersebut.
                                  </label>
                                    @error('persetujuan2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6">
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
