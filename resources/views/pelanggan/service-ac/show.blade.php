@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Service Air Conditioner</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('serviceAc.index') }}">Daftar Data Request Service Air Conditioner</a></li>
        <li class="breadcrumb-item">Detail Request Service Air Conditioner</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                        <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control" value="{{ $serviceAirConditioner->nama_pemohon }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                        <input type="text" name="nama_rumah_ibadah" id="nama_rumah_ibadah" class="form-control" value="{{ $serviceAirConditioner->nama_rumah_ibadah }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="alamat_rumah_ibadah" class="form-label">Alamat masjid / mushollah</label>
                        <input type="text" name="alamat_rumah_ibadah" id="alamat_rumah_ibadah" class="form-control" value="{{ $serviceAirConditioner->alamat_rumah_ibadah }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="tanggal_jam_pelaksanaan" class="form-label">Tanggal & Jam Pelaksanaan</label>
                        <input type="datetime-local" name="tanggal_jam_pelaksanaan" id="tanggal_jam_pelaksanaan" class="form-control" value="{{ $serviceAirConditioner->tanggal_jam_pelaksanaan }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="titik_lokasi_akurat" class="form-label">Titik lokasi akurat</label>
                        <div class="input-group">
                            <input type="text" name="titik_lokasi_akurat" id="titik_lokasi_akurat" class="form-control" value="{{ $serviceAirConditioner->titik_lokasi_akurat }}" readonly>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#openLeaflet">Cek Lokasi</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="ada_persediaan_tangga" class="form-label">Ada Persediaan Tangga ?</label>
                        <select name="ada_persediaan_tangga" id="ada_persediaan_tangga" class="form-select">
                            <option selected disabled>Pilih</option>
                            <option {{ $serviceAirConditioner->ada_persediaan_tangga == '1' ? 'selected' : '' }} value="1">Ya</option>
                            <option {{ $serviceAirConditioner->ada_persediaan_tangga == '0' ? 'selected' : '' }} value="0">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="jumlah_service" class="form-label">Berapa jumlah unit ac yang akan di service ?</label>
                        <input type="number" name="jumlah_service" class="form-control" min="0" value="{{ $serviceAirConditioner->jumlah_service }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="ada_ac_rucak" class="form-label">Apakah di lokasi ada AC yang rusak ?</label>
                        <select name="ada_ac_rucak" id="ada_ac_rucak" class="form-select">
                            <option selected disabled>Pilih</option>
                            <option {{ $serviceAirConditioner->ada_ac_rucak == '1' ? 'selected' : '' }} value="1">Ya</option>
                            <option {{ $serviceAirConditioner->ada_ac_rucak == '0' ? 'selected' : '' }} value="0">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('content-mobile')
    <h1 class="mt-4">Service Air Conditioner</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('serviceAc.index') }}">Daftar Data Request Service Air Conditioner</a></li>
        <li class="breadcrumb-item">Detail Request Service Air Conditioner</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                        <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control" value="{{ $serviceAirConditioner->nama_pemohon }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                        <input type="text" name="nama_rumah_ibadah" id="nama_rumah_ibadah" class="form-control" value="{{ $serviceAirConditioner->nama_rumah_ibadah }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="alamat_rumah_ibadah" class="form-label">Alamat masjid / mushollah</label>
                        <input type="text" name="alamat_rumah_ibadah" id="alamat_rumah_ibadah" class="form-control" value="{{ $serviceAirConditioner->alamat_rumah_ibadah }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="tanggal_jam_pelaksanaan" class="form-label">Tanggal & Jam Pelaksanaan</label>
                        <input type="datetime-local" name="tanggal_jam_pelaksanaan" id="tanggal_jam_pelaksanaan" class="form-control" value="{{ $serviceAirConditioner->tanggal_jam_pelaksanaan }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="titik_lokasi_akurat" class="form-label">Titik lokasi akurat</label>
                        <div class="input-group">
                            <input type="text" name="titik_lokasi_akurat" id="titik_lokasi_akurat" class="form-control" value="{{ $serviceAirConditioner->titik_lokasi_akurat }}" readonly>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#openLeaflet">Cek Lokasi</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="ada_persediaan_tangga" class="form-label">Ada Persediaan Tangga ?</label>
                        <select name="ada_persediaan_tangga" id="ada_persediaan_tangga" class="form-select">
                            <option selected disabled>Pilih</option>
                            <option {{ $serviceAirConditioner->ada_persediaan_tangga == '1' ? 'selected' : '' }} value="1">Ya</option>
                            <option {{ $serviceAirConditioner->ada_persediaan_tangga == '0' ? 'selected' : '' }} value="0">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="jumlah_service" class="form-label">Berapa jumlah unit ac yang akan di service ?</label>
                        <input type="number" name="jumlah_service" class="form-control" min="0" value="{{ $serviceAirConditioner->jumlah_service }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="ada_ac_rucak" class="form-label">Apakah di lokasi ada AC yang rusak ?</label>
                        <select name="ada_ac_rucak" id="ada_ac_rucak" class="form-select">
                            <option selected disabled>Pilih</option>
                            <option {{ $serviceAirConditioner->ada_ac_rucak == '1' ? 'selected' : '' }} value="1">Ya</option>
                            <option {{ $serviceAirConditioner->ada_ac_rucak == '0' ? 'selected' : '' }} value="0">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection


    <!-- Modal -->
    <div class="modal fade" id="openLeaflet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Titik Lokasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="map" class="w-100 border border-3" style="height:500px"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        var titik = document.getElementById('titik_lokasi_akurat');
        var koordinat = titik.value.split(',');
        var lat = koordinat[0];
        var lng = koordinat[1];
        var map = L.map('map').setView([lat, lng], 11);
        L.marker([lat, lng]).addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Comment out the below code to see the difference.
        $('#openLeaflet').on('shown.bs.modal', function() {
            map.invalidateSize();
        });
    </script>
@endsection
