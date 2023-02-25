@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Add {{ $active }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaranDasar.index') }}">Data {{ $active }}</a></li>
        <li class="breadcrumb-item">Add {{ $active }}</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ Request::routeIs('anggaranDasar.*') ? route('anggaranDasar.store') : route('anggaranRumahTangga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Text Pengumuman</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
