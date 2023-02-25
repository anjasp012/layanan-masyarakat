@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Rekening Bank</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Rekening Bank</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%" class="text-center">No</th>
                        <th style="width: 10%">Nama Bank</th>
                        <th style="width: 10%">No Rekening</th>
                        <th style="width: 10%">Saldo</th>
                        <th style="width: 2%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekening as $index => $data)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $data->nama_bank }}</td>
                            <td>{{ $data->no_rekening }}</td>
                            <td>Rp. {{ $data->saldo }}</td>
                            <td>
                                <form action="{{ route('rekening.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('rekening.edit', $data->id) }}" class="btn btn-info">Edit</a>
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
