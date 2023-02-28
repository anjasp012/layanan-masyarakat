@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Pemasangan Cctv</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">{{ $actived }}</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%" class="text-center">No</th>
                        <th style="width: 10%">Nama Pemohon</th>
                        <th style="width: 10%">Nama Rumah Ibadah</th>
                        <th style="width: 20%">Alamat Rumah Ibadah</th>
                        <th style="width: 5%">Tanggal/Jam Pelaksanaan</th>
                        <th style="width: 5%">Persediaan Tangga</th>
                        <th style="width: 5%">Status Aprove</th>
                        <th style="width: 14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $data)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $data->nama_pemohon }}</td>
                            <td>{{ $data->nama_rumah_ibadah }}</td>
                            <td>{{ $data->alamat_rumah_ibadah }}</td>
                            <td>{{ $data->tanggal_jam_pelaksanaan }}</td>
                            <td>{{ $data->ada_persediaan_tangga }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Cek Status
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-check-label">
                                                            Humas
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if ($data->humas_aprove !== null)
                                                            <div class="btn btn-sm {{ $data->humas_aprove === 0 ? 'btn-danger' : 'btn-success' }} d-block" title="{{ $data->humas_aprove === 0 ? 'Ditolak' : 'Disetujui' }}"><i class="fas {{ $data->humas_aprove === 0 ? 'fa-times' : 'fa-check' }}"></i></div>
                                                        @else
                                                            <div class="btn btn-sm btn-outline-secondary d-block" title="Tunggu"><i class="fas fa-clock"></i></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-check-label">
                                                            Korlap
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- {{ $data->korlap_aprove }} --}}
                                                        @if ($data->korlap_aprove !== null)
                                                            <div class="btn btn-sm {{ $data->korlap_aprove === 0 ? 'btn-danger' : 'btn-success' }} d-block" title="{{ $data->korlap_aprove === 0 ? 'Ditolak' : 'Disetujui' }}"><i class="fas {{ $data->korlap_aprove === 0 ? 'fa-times' : 'fa-check' }}"></i></div>
                                                        @else
                                                            <div class="btn btn-sm btn-outline-secondary d-block"><i class="fas fa-clock"></i></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                {{-- <a class="btn btn-warning btn-sm" href="{{ route('pemasanganCctv.edit', $data->id) }}"><i class="fas fa-edit"></i></a> --}}
                                <a class="btn btn-info btn-sm" href="{{ route('pemasanganCctv.show', $data->id) }}"><i class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('content-mobile')
    <h1 class="mt-4">Pemasangan Cctv</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">{{ $actived }}</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%" class="text-center">No</th>
                            <th style="width: 10%">Nama Pemohon</th>
                            <th style="width: 10%">Nama Rumah Ibadah</th>
                            <th style="width: 20%">Alamat Rumah Ibadah</th>
                            <th style="width: 5%">Tanggal/Jam Pelaksanaan</th>
                            <th style="width: 5%">Persediaan Tangga</th>
                            <th style="width: 5%">Status Aprove</th>
                            <th style="width: 14%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $index => $data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->nama_pemohon }}</td>
                                <td>{{ $data->nama_rumah_ibadah }}</td>
                                <td>{{ $data->alamat_rumah_ibadah }}</td>
                                <td>{{ $data->tanggal_jam_pelaksanaan }}</td>
                                <td>{{ $data->ada_persediaan_tangga }}</td>
                                <td>
                                    <p class="fw-bold text-capitalize {{ !$data->aprove_humas ? 'text-info' : '' }}">
                                        @if ($data->aprove_humas == '0' || $data->aprove_korlap == '0' || $data->aprove_admin == '0')
                                            Di tolak
                                        @elseif ($data->aprove_admin == '1')
                                            Di Setujui
                                        @elseif ($data->aprove_korlap == '1')
                                            Survey Ke Lokasi
                                        @elseif ($data->aprove_humas == '1')
                                            Progress
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    {{-- <a class="btn btn-warning btn-sm" href="{{ route('pemasanganCctv.edit', $data->id) }}"><i class="fas fa-edit"></i></a> --}}
                                    <a class="btn btn-info btn-sm" href="{{ route('pemasanganCctv.show', $data->id) }}"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    </script>
@endsection
