@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar Pelanggan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%" class="text-center">No</th>
                        <th style="width: 5%" class="text-center">Nama</th>
                        <th style="width: 10%" class="text-center">Alamat</th>
                        <th style="width: 5%">No hp</th>
                        <th style="width: 5%">Nama Rumah Ibadah</th>
                        <th style="width: 5%">Alamat Rumah Ibadah</th>
                        <th style="width: 14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $data)
                        <tr>
                            <td style="width: 1px" class="text-center">{{ $index+1 }}</td>
                            <td>{{ $data->nama_pengurus }}</td>
                            <td>{{ $data->alamat_rumah_pengurus }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->nama_rumah_ibadah }}</td>
                            <td>{{ $data->alamat_lengkap_rumah_ibadah }}</td>
                            <td>
                                @if ($data->aktif == 1)
                                    <form action="{{ route('pelanggan.statusNonAktif', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="aktif" value="0" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger">OFF</button>
                                        <a class="btn btn-warning btn-sm" href="{{ route('pelanggan.edit', $data->id) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('pelanggan.show', $data->id) }}"><i class="fas fa-info-circle"></i></a></td>
                                    </form>
                                @else
                                    <form class="d-inline-block" action="{{ route('pelanggan.statusAktif', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="aktif" value="1" hidden>
                                        <button type="submit" class="btn btn-sm btn-success">Aktifkan</button>
                                        <a class="btn btn-warning btn-sm" href="{{ route('pelanggan.edit', $data->id) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('pelanggan.show', $data->id) }}"><i class="fas fa-info-circle"></i></a></td>
                                    </form>
                                @endif

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
