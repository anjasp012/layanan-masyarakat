@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Data Kategori</a></li>
        <li class="breadcrumb-item">Add Kategori</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
