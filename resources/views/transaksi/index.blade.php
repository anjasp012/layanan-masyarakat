@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Transaksi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Transaksi</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%" class="text-center" rowspan="2">No</th>
                        <th style="width: 10%" rowspan="2">Tanggal</th>
                        <th style="width: 10%" rowspan="2">Kategori</th>
                        <th style="width: auto" rowspan="2">Keterangan</th>
                        <th style="width: 10%" class="text-center" colspan="2">Jenis</th>
                        <th style="width: 14%" rowspan="2">Aksi</th>
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
                            <td>
                                <form action="{{ route('transaksi.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
    </script>
@endsection
