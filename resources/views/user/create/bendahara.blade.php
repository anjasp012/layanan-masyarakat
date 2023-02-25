@extends('layouts.app')

@section('content')
    <h1 class="mt-4 text-capitalize">Add {{ strtolower($actived) }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Bendahara</li>
        <li class="breadcrumb-item text-capitailize">Add {{ strtolower($actived) }}</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('bendahara.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Anggota" class="form-label">Anggota</label>
                    <select multiple="multiple" class="form-control form-control-lg" placeholder="form-control-lg" name="user[]" id="anggota">
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('select').multipleSelect()
        })
    </script>
@endsection
