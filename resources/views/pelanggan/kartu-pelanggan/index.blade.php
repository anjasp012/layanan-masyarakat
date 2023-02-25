@extends('layouts.app')

@section('content')
<h1 class="mt-4">Kartu Tanda Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kartu Tanda Anggota</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center fw-bold">No Pelanggan</div>
                    <div class="card-body py-5">
                        <table>
                            <tr>
                                <th style="width: 41%">Nama Pengurus</th>
                                <td style="width: 10%">:</td>
                                <td>{{ $pelanggan->nama_pengurus }}</td>
                            </tr>
                            <tr>
                                <th style="width: 41%">Nomor Pelanggan</th>
                                <td style="width: 10%">:</td>
                                <td>{{ $pelanggan->no_pelanggan }}</td>
                            </tr>
                            <tr>
                                <th style="width: 41%">Alamat Pengurus</th>
                                <td style="width: 10%">:</td>
                                <td>{{ $pelanggan->alamat_rumah_pengurus }}</td>
                            </tr>
                            <tr>
                                <th style="width: 41%">Alamat Rumah Ibadah</th>
                                <td style="width: 10%">:</td>
                                <td>{{ $pelanggan->alamat_lengkap_rumah_ibadah }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
