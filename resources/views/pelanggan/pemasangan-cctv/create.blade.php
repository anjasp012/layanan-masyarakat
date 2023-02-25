@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Pemasangan Cctv</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pemasanganCctv.index') }}">Data Request Pemasangan Cctv</a></li>
        <li class="breadcrumb-item">Request Pemasangan Cctv</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('pemasanganCctv.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                            <input type="text" name="nama_pemohon" class="form-control" value="{{ auth()->user()->nama_pengurus }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                            <input type="text" name="nama_rumah_ibadah" class="form-control" value="{{ auth()->user()->nama_rumah_ibadah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_ibadah" class="form-label">Alamat masjid / mushollah</label>
                            <input type="text" name="alamat_rumah_ibadah" class="form-control" value="{{ auth()->user()->alamat_lengkap_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanggal_jam_pelaksanaan" class="form-label">Tanggal & Jam Pelaksanaan</label>
                            <input type="datetime-local" name="tanggal_jam_pelaksanaan" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="titik_lokasi_akurat" class="form-label">Titik lokasi akurat</label>
                            <div class="input-group">
                                <input type="text" name="titik_lokasi_akurat" id="titik_lokasi_akurat" class="form-control">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#openLeaflet"><i class="fas fa-fw fa-street-view"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ada_persediaan_tangga" class="form-label">Ada Persediaan Tangga ?</label>
                            <select name="ada_persediaan_tangga" id="ada_persediaan_tangga" class="form-select">
                                <option selected disabled>Pilih</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jumlah_pasang" class="form-label">berapa jumlah unit cctv yang rencana akan di pasang ?</label>
                            <input type="number" name="jumlah_pasang" class="form-control" min="0" value="0">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ada_ac_rucak" class="form-label">masukan file pendukung, berupa syarat pengajuan</label>
                            <input type="file" name="file_pendukung" id="file_pendukung" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content-mobile')
    <h1 class="mt-4">Pemasangan Cctv</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pemasanganCctv.index') }}">Data Request Pemasangan Cctv</a></li>
        <li class="breadcrumb-item">Request Pemasangan Cctv</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('pemasanganCctv.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                            <input type="text" name="nama_pemohon" class="form-control" value="{{ auth()->user()->nama_pengurus }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nama_rumah_ibadah" class="form-label">Nama Rumah Ibadah</label>
                            <input type="text" name="nama_rumah_ibadah" class="form-control" value="{{ auth()->user()->nama_rumah_ibadah }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="alamat_rumah_ibadah" class="form-label">Alamat masjid / mushollah</label>
                            <input type="text" name="alamat_rumah_ibadah" class="form-control" value="{{ auth()->user()->alamat_lengkap_rumah_ibadah }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanggal_jam_pelaksanaan" class="form-label">Tanggal & Jam Pelaksanaan</label>
                            <input type="datetime-local" name="tanggal_jam_pelaksanaan" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="titik_lokasi_akurat" class="form-label">Titik lokasi akurat</label>
                            <div class="input-group">
                                <input type="text" name="titik_lokasi_akurat" id="titik_lokasi_akurat" class="form-control">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#openLeaflet"><i class="fas fa-fw fa-street-view"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ada_persediaan_tangga" class="form-label">Ada Persediaan Tangga ?</label>
                            <select name="ada_persediaan_tangga" id="ada_persediaan_tangga" class="form-select">
                                <option selected disabled>Pilih</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jumlah_pasang" class="form-label">berapa jumlah unit cctv yang rencana akan di pasang ?</label>
                            <input type="number" name="jumlah_pasang" class="form-control" min="0" value="0">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ada_ac_rucak" class="form-label">masukan file pendukung, berupa syarat pengajuan</label>
                            <input type="file" name="file_pendukung" id="file_pendukung" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
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
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-danger" onclick="navigator.geolocation.getCurrentPosition(getPosition)"><i class="fas fa-fw fa-street-view"></i></button>
                    </div>
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
        var tileLayer = new L.TileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',{
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
        });
        var titik = document.getElementById('titik_lokasi_akurat');
        var koordinat = titik.value.split(',');
        if (koordinat) {
            var lat = -6.041185;
            var lng = 37.84151;
        } else {
            var lat = koordinat[0];
            var lng = koordinat[1];
        }
        var map = new L.Map('map', {
        'center': [lat, lng],
        'zoom': 18,
        'layers': [tileLayer]
        });
        var marker = L.marker([lat, lng],{
            draggable: true
        }).addTo(map);
        function getPosition(position) {
            // console.log(position)
            lat = position.coords.latitude
            long = position.coords.longitude
            if (marker) {
                map.removeLayer(marker)
            }
            marker = L.marker([lat, long],{
                draggable: true
            })
            var featureGroup = L.featureGroup([marker]).addTo(map)
            map.fitBounds(featureGroup.getBounds())
            titik.value = lat + ',' + long
            // console.log("Your coordinate is: Lat: " + lat + " Long: " + long)
            marker.on('dragend', function (e) {
                    titik.value =  marker.getLatLng().lat + ',' + marker.getLatLng().lng
                // console.log("Your coordinate is: Lat: " + marker.getLatLng().lat + " Long: " + marker.getLatLng().lng)
            });
        }
        marker.on('dragend', function (e) {
            titik.value =  marker.getLatLng().lat + ',' + marker.getLatLng().lng
        });
        $('#openLeaflet').on('shown.bs.modal', function() {
            map.invalidateSize();
        });
    </script>
@endsection
