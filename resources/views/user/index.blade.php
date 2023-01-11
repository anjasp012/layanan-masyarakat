@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Daftar {{ $actived }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar {{ $actived }}</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th style="width: 1px">No</th>
                        <th>Nama</th>
                        @if (Request::routeIs('anggota.index') || Request::routeIs('dpp.index') || Request::routeIs('dpd.index'))
                            <th>No Kta</th>
                        @endif
                        @if (Request::routeIs('anggota.index'))
                            <th>Kepengurus</th>
                        @endif
                        @if (Request::routeIs('dpp.index') || Request::routeIs('dpd.index'))
                            <th>jabatan</th>
                        @endif
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $index => $data)
                        <tr>
                            <td style="width: 1px" class="text-center">{{ $index+1 }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            @if (Request::routeIs('anggota.index') || Request::routeIs('dpp.index') || Request::routeIs('dpd.index'))
                                <td>{{ $data->no_kta }}</td>
                            @endif
                            @if (Request::routeIs('anggota.index'))
                                <td>
                                    <div id="inputReadonly{{ $data->id }}" class="d-flex gap-1">
                                        <input readonly type="text" class="form-control form-control-sm w-50" value="{{ ($data->kepengurusan) ? $data->kepengurusan->nama_kepengurusan : '' }}">
                                        <button class="btn btn-warning btn-sm" onclick="ubahKepengurusan({{ $data->id }})">Ubah Kepengurusan</button>
                                    </div>
                                    <form id="formKepengurusan{{ $data->id }}" action="{{ route('anggota.updateKepengurusan', $data->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex gap-1">
                                            <select name="kepengurusan_id" id="kepengurusan_id" class="form-select form-select-sm w-50">
                                                    <option value=null></option>
                                                @foreach ($kepengurusan as $item)
                                                    <option {{ ( $item->id == $data->kepengurusan_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_kepengurusan }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="batalUbahKepengurusan({{ $data->id }})">Batal</button>
                                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                        </div>
                                    </form>
                                </td>
                            @endif
                            @if (Request::routeIs('dpp.index') || Request::routeIs('dpd.index'))
                                <td>
                                    <div id="inputReadonlyJabatan{{ $data->id }}" class="d-flex gap-1">
                                        <input readonly type="text" class="form-control form-control-sm w-50" value="{{ ($data->jabatan) ? $data->jabatan : '' }}">
                                        <button class="btn btn-warning btn-sm" onclick="ubahJabatan({{ $data->id }})">Ubah jabatan</button>
                                    </div>
                                    @if (Request::routeIs('dpp.index'))
                                        <form id="formJabatan{{ $data->id }}" action="{{ route('dpp.updateJabatan', $data->id) }}" method="POST" class="d-none">
                                    @elseif (Request::routeIs('dpd.index'))
                                        <form id="formJabatan{{ $data->id }}" action="{{ route('dpd.updateJabatan', $data->id) }}" method="POST" class="d-none">
                                    @endif
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex gap-1">
                                            <input type="text" name="jabatan" class="form-control form-control-sm w-50" value="{{ $data->jabatan }}">
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="batalUbahJabatan({{ $data->id }})">Batal</button>
                                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                        </div>
                                    </form>
                                </td>
                            @endif
                            <td>{{ $data->alamat_saat_ini }}</td>
                            @if ($data->aktif == 1)
                                <td>Aktif</td>
                            @elseif ($data->aktif == 2)
                                <td>Pending</td>
                            @elseif ($data->aktif == 0)
                                <td>Tidak Aktif</td>
                            @endif
                            <td>
                                @if ($data->aktif == 1)
                                    @if (Request::routeIs('anggota.*'))
                                        <form action="{{ route('anggota.statusNonAktif', $data->id) }}" method="POST">
                                    @elseif (Request::routeIs('staff.*'))
                                        <form action="{{ route('staff.statusNonAktif', $data->id) }}" method="POST">
                                    @elseif (Request::routeIs('relawan.*'))
                                        <form action="{{ route('relawan.statusNonAktif', $data->id) }}" method="POST">
                                    @endif
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="aktif" value="0" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger">NonAktifkan</button>
                                        @if (Request::routeIs('anggota.*'))
                                            <a class="btn btn-warning btn-sm" href="{{ route('anggota.edit', $data->id) }}">Edit</a>
                                            <a class="btn btn-info btn-sm" href="{{ route('anggota.show', $data->id) }}">Detail</a>
                                        @elseif (Request::routeIs('staff.*'))
                                            <a class="btn btn-warning btn-sm" href="{{ route('staff.edit', $data->id) }}">Edit</a>
                                            <a class="btn btn-info btn-sm" href="{{ route('staff.show', $data->id) }}">Detail</a>
                                        @elseif (Request::routeIs('relawan.*'))
                                            <a class="btn btn-warning btn-sm" href="{{ route('relawan.edit', $data->id) }}">Edit</a>
                                            <a class="btn btn-info btn-sm" href="{{ route('relawan.show', $data->id) }}">Detail</a>
                                        @endif
                                    </form>
                                @else
                                    @if (Request::routeIs('anggota.*'))
                                        <form class="d-inline-block" action="{{ route('anggota.statusAktif', $data->id) }}" method="POST">
                                    @elseif (Request::routeIs('staff.*'))
                                        <form class="d-inline-block" action="{{ route('staff.statusAktif', $data->id) }}" method="POST">
                                    @elseif (Request::routeIs('relawan.*'))
                                        <form class="d-inline-block" action="{{ route('relawan.statusAktif', $data->id) }}" method="POST">
                                    @endif
                                            @csrf
                                            @method('PATCH')
                                            <input type="text" name="aktif" value="1" hidden>
                                            <button type="submit" class="btn btn-sm btn-success">Aktifkan</button>
                                            @if (Request::routeIs('anggota.*'))
                                                <a class="btn btn-warning btn-sm" href="{{ route('anggota.edit', $data->id) }}">Edit</a>
                                                <a class="btn btn-info btn-sm" href="{{ route('anggota.show', $data->id) }}">Detail</a>
                                            @elseif (Request::routeIs('staff.*'))
                                                <a class="btn btn-warning btn-sm" href="{{ route('staff.edit', $data->id) }}">Edit</a>
                                                <a class="btn btn-info btn-sm" href="{{ route('staff.show', $data->id) }}">Detail</a>
                                            @elseif (Request::routeIs('relawan.*'))
                                                <a class="btn btn-warning btn-sm" href="{{ route('relawan.edit', $data->id) }}">Edit</a>
                                                <a class="btn btn-info btn-sm" href="{{ route('relawan.show', $data->id) }}">Detail</a>
                                            @endif
                                        </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function ubahKepengurusan(params) {
            console.log('formKepengurusan' +params);
            var form = document.getElementById('formKepengurusan' +params);
            var inputReadonly = document.getElementById('inputReadonly' +params);
            form.classList.remove("d-none");
            inputReadonly.classList.add("d-none");
        }
        function batalUbahKepengurusan(params) {
            var form = document.getElementById('formKepengurusan' +params);
            var inputReadonly = document.getElementById('inputReadonly' +params);
            form.classList.add("d-none");
            inputReadonly.classList.remove("d-none");
        }
        function ubahJabatan(params) {
            console.log('formJabatan' +params);
            var form = document.getElementById('formJabatan' +params);
            var inputReadonlyJabatan = document.getElementById('inputReadonlyJabatan' +params);
            form.classList.remove("d-none");
            inputReadonlyJabatan.classList.add("d-none");
        }
        function batalUbahJabatan(params) {
            var form = document.getElementById('formJabatan' +params);
            var inputReadonlyJabatan = document.getElementById('inputReadonlyJabatan' +params);
            form.classList.add("d-none");
            inputReadonlyJabatan.classList.remove("d-none");
        }
    </script>
@endsection
