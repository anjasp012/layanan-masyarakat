@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Transaksi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Data Transaksi</a></li>
        <li class="breadcrumb-item">Add Transaksi</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $transaksi->tanggal }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" id="jenis" class="form-select">
                                <option selected disabled>PILIH ..</option>
                                <option {{ $transaksi->jenis == 1 ? 'selected' : '' }} value="1">PEMASUKAN</option>
                                <option {{ $transaksi->jenis == 0 ? 'selected' : '' }} value="0">PENGELUARAN</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select">
                                <option selected disabled>PILIH ..</option>
                                @foreach ($kategori as $item)
                                    <option {{ $transaksi->kategori_id == $item->id ? 'selected' : '' }}  value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="rekening_bank_id" class="form-label">Rekening Bank</label>
                            <select name="rekening_bank_id" id="rekening_bank_id" class="form-select">
                                <option selected disabled>PILIH ..</option>
                                @foreach ($rekening as $item)
                                    <option {{ $transaksi->rekening_bank_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_bank }} | {{ $item->no_rekening }} | {{ $item->saldo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="text" name="nominal" id="nominal" class="form-control" value="{{ $transaksi->nominal }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="bukti_transaksi" class="form-label">Bukti Transaksi</label>
                            <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{ $transaksi->keterangan }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
