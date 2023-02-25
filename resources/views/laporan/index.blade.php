@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Laporan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            Filter Laporan
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.filter') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="mulai_tanggal" class="form-label">Mulai Tanggal</label>
                        <input type="date" id="mulai_tanggal" class="form-control" name="mulai_tanggal" value="{{ Route::is('laporan.filter') ? $oldFilterMulai : '' }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="sampai_tanggal" class="form-label">Sampai Tanggal</label>
                        <input type="date" id="sampai_tanggal" class="form-control" name="sampai_tanggal" value="{{ Route::is('laporan.filter') ? $oldFilterSampai : ''}}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-select" required>
                            <option value="">PILIH ..</option>
                            <option {{ Route::is('laporan.filter') ? 'Semua Kategori' == $oldFilterKategori ? 'selected' : '' : '' }} value="Semua Kategori">-Semua Kategori-</option>
                            @foreach ($kategori as $item)
                                <option {{  Route::is('laporan.filter') ? $item->id == $oldFilterKategori ? 'selected' : '' : '' }} value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="rekening_bank_id" class="form-label">Rekening Bank</label>
                        <select name="rekening_bank_id" id="rekening_bank_id" class="form-select" required>
                            <option value="">PILIH ..</option>
                            <option {{ Route::is('laporan.filter') ? 'Semua Bank' == $oldFilterBank ? 'selected' : '' : '' }} value="Semua Bank">-Semua Bank-</option>
                            @foreach ($rekening as $item)
                                <option {{ $item->id ==  Route::is('laporan.filter') ? $oldFilterBank ? 'selected' : '' : ''}} value="{{ $item->id }}">{{ $item->nama_bank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-md-3">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Laporan Pemasukan & Pengeluaran</div>
        <div class="card-body">
            @if (Route::is('laporan.filter'))
                @if ($transaksi->count() > 0)
                <div class="row">
                    <div class="col-md-4">
                        <table class="table">
                            <tr class="border">
                                <th>Dari Tanggal</th>
                                <th>:</th>
                                <td>{{ $oldFilterMulai }}</td>
                            </tr>
                            <tr class="border">
                                <th>Sampai Tanggal</th>
                                <th>:</th>
                                <td>{{ $oldFilterSampai }}</td>
                            </tr>
                            <tr class="border">
                                <th>Kategori</th>
                                <th>:</th>
                                <td>{{ $filterKategori }}</td>
                            </tr>
                            <tr class="border">
                                <th>Bank</th>
                                <th>:</th>
                                <td>{{ $filterBank }}</td>
                            </tr>
                        </table>
                        <button class="btn btn-success" onclick="$('.buttons-pdf').click()">Cetak Pdf</button>
                        <button class="btn btn-primary" onclick="$('.buttons-print').click()">Print</button>
                    </div>
                </div>
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 1%" class="text-center" rowspan="2">No</th>
                                <th style="width: 10%" rowspan="2">Tanggal</th>
                                <th style="width: 10%" rowspan="2">Kategori</th>
                                <th style="width: auto" rowspan="2">Keterangan</th>
                                <th style="width: 10%" class="text-center" colspan="2">Jenis</th>
                                <th style="width: 1%" rowspan="2">Rekening Bank</th>
                            </tr>
                            <tr>
                                <th style="width: 10%" class="text-center">PEMASUKAN</th>
                                <th style="width: 10%" class="text-center">PENGELUARAN</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($transaksi as $index => $data)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->kategori->nama_kategori }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ $data->jenis == 1 ? $data->nominal : '-' }}</td>
                                        <td>{{ $data->jenis == 0 ? $data->nominal : '-' }}</td>
                                        <td>{{ $data->rekening->nama_bank }}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class='bg-danger text-white text-center'>Hasil Filter Tidak Ditemukan</h3>
                @endif
            @else
                <h3 class='bg-danger text-white text-center'>Silahkan Filter Laporan Terlebih Dulu</h3>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>

        $(document).ready(function() {
            $('#datatablesSimple').DataTable( {
                "language": {
                    "emptyTable": "<h3 class='bg-danger text-white'>Silahkan Filter Laporan Terlebih Dulu</h3>"
                },
                dom: 'Bfrtip',
                ordering: true,
                pageLength: 10,
                lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            } );
            $('.dt-buttons').addClass( 'd-none' );
        } );
    </script>
@endsection
