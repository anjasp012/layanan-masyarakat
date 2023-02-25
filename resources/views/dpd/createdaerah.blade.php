@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Add Dpd Daerah</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Dpd</li>
        <li class="breadcrumb-item">Add Dpd Daerah</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('dpd.storedaerah') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
