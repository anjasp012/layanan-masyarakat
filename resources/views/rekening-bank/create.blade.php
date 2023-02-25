@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Rekening Bank</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('rekening.index') }}">Data Rekening Bank</a></li>
        <li class="breadcrumb-item">Add Rekening Rekening</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('rekening.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input type="text" id="nama_bank" name="nama_bank" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="no_rekening" class="form-label">Nomor Rekening</label>
                            <input type="text" id="no_rekening" name="no_rekening" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="saldo" class="form-label">Saldo</label>
                            <input type="text" id="saldo" name="saldo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
