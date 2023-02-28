@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Daftar {{ $actived }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar {{ $actived }}</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%" class="text-center">No</th>
                        <th style="width: 15%" class="text-center">Nama</th>
                        <th style="width: 9%" class="text-center">No Kta</th>
                        <th style="width: 20%" class="text-center">Jabatan</th>
                        <th style="width: 20%" class="text-center">Hak Akses</th>
                        <th style="width: 20%" class="text-center">Alamat</th>
                        <th style="width: 5%">Status</th>
                        <th style="width: 14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $index => $data)
                        <tr>
                            <td style="width: 1px" class="text-center">{{ $index+1 }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->no_kta }}</td>
                            <td>
                                <div id="inputReadonlyJabatan{{ $data->id }}" class="d-flex gap-1">
                                    <input readonly type="text" class="form-control form-control-sm w-50" value="{{ ($data->jabatan) ? $data->jabatan : '' }}">
                                    <button class="btn btn-warning btn-sm" onclick="ubahJabatan({{ $data->id }})">Ubah jabatan</button>
                                </div>
                                <form id="formJabatan{{ $data->id }}" action="{{ route('dpp.updateJabatan', $data->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex gap-1">
                                        <input type="text" name="jabatan" class="form-control form-control-sm w-50" value="{{ $data->jabatan }}">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="batalUbahJabatan({{ $data->id }})">Batal</button>
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div id="inputReadonlyAkses{{ $data->id }}" class="d-flex gap-1">
                                    <input readonly type="text" class="form-control form-control-sm w-50" value="{{ ($data->Akses) ? $data->akses->nama_hak_akses : '' }}">
                                    <button class="btn btn-warning btn-sm" onclick="ubahAkses({{ $data->id }})">Change</button>
                                </div>
                                <form id="formAkses{{ $data->id }}" action="{{ route('dpp.updateAkses', $data->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex gap-1">
                                        <select name="hak_akses_id" id="hak_akses_id" class="form-select form-select-sm w-50">
                                                <option value=null>NO AKSES</option>
                                            @foreach ($hakAkses as $item)
                                                <option {{ ( $item->id == $data->hak_akses_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_hak_akses }}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="batalUbahAkses({{ $data->id }})">Batal</button>
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $data->alamat_saat_ini }}</td>
                            @if ($data->aktif == 1)
                                <td>Aktif</td>
                            @elseif ($data->aktif == 2)
                                <td>Pending</td>
                            @elseif ($data->aktif == 0)
                                <td>Tidak Aktif</td>
                            @endif
                            <td class="d-flex gap-1">
                                <form action="{{ route('dpp.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin Untuk Menghapus Dari Dpp?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
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
        $(document).ready(function() {
            $('#datatablesSimple').DataTable( {
                dom: 'frtip',
                ordering: true,
                pageLength: 10,
                lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
            } );
        } );
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
        function ubahAkses(params) {
            console.log('formAkses' +params);
            var form = document.getElementById('formAkses' +params);
            var inputReadonlyAkses = document.getElementById('inputReadonlyAkses' +params);
            form.classList.remove("d-none");
            inputReadonlyAkses.classList.add("d-none");
        }
        function batalUbahAkses(params) {
            var form = document.getElementById('formAkses' +params);
            var inputReadonlyAkses = document.getElementById('inputReadonlyAkses' +params);
            form.classList.add("d-none");
            inputReadonlyAkses.classList.remove("d-none");
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
