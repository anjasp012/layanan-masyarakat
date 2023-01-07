@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Pengumuman</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengumuman</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="w-auto">No</th>
                        <th>text</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">No</th>
                        <th>Text Pengumuman</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pengumuman as $index => $data)
                        <tr>
                            <td scope="row">{{ $index+1 }}</td>
                            <td>{{ $data->pengumuman }}</td>
                            <td>
                                <a href="" class="btn btn-info">Detail</a>
                                <a href="" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
