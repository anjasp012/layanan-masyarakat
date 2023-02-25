@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Daerah</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar Daerah</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%" class="text-center">No</th>
                        <th style="width: 15%" class="text-center">Nama</th>
                        <th style="width: 20%" class="text-center">Jumlah Anggota</th>
                        <th style="width: 14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $data)
                        <tr>
                            <td style="width: 1px" class="text-center">{{ $index+1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->anggota->count() }}</td>
                            <td class="d-flex gap-1">
                                <form action="{{ route('dpd.kosongkandaerah', $data->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin Untuk Kosongkan Daerah ini?')" class="btn btn-dark btn-sm">Kosongkan</button>
                                </form>
                                <form action="{{ route('dpd.deletedaerah', $data->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin Untuk Menghapus Data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
