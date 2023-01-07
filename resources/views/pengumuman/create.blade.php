@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Add Pengumuman</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Pengumuman</li>
        <li class="breadcrumb-item">Add Pengumuman</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="pengumuman" class="form-label">Text Pengumuman</label>
                    <textarea name="pengumuman" id="pengumuman" class="form-control"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
