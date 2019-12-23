@extends('dashboard.layout')

@section('page_menu')
    <li class="nav-item {{ (request()->segment(4) == null) ? 'active' : '' }}">
        <a href="{{ url(request()->segment(1).'/'.request()->segment(2).'/'.request()->segment(3)) }}" class="nav-link">
            <i class="fas fa-plus-circle mr-2" style="font-size: x-large; vertical-align: middle;"></i>
            <div class="d-none d-lg-inline-block d-xl-inline-block">Tambah {{ ucfirst(request()->segment(3)) }}</div>
        </a>
    </li>
    <li class="nav-item {{ (request()->segment(4) == 'list') ? 'active' : '' }}">
        <a href="{{ url(request()->segment(1).'/'.request()->segment(2).'/'.request()->segment(3)) }}/list" class="nav-link">
            <i class="fas fa-table mr-2" style="font-size: x-large; vertical-align: middle;"></i>
            <span class="d-none d-lg-inline-block d-xl-inline-block">
                 Daftar {{ ucfirst(request()->segment(3)) }}
            </span>
        </a>
    </li>
@endsection

@section('title','System Utility - Group Menu')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Group Menu</h4>
                    </div>
                    <form id="formData">
                        <input type="hidden" name="type" value="edit">
                        <input type="hidden" id="iID" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Koridor</label>
                                <input type="text" class="form-control" id="iKoridor" name="koridor" value="{{ $data->koridor }}">
                            </div>
                            <div class="form-group">
                                <label>Rute</label>
                                <input type="text" class="form-control" id="iRute" name="rute" value="{{ $data->rute }}">
                            </div>
                            <div class="form-group">
                                <label>Trip A</label>
                                <input type="text" class="form-control" id="iTripA" name="trip_a" value="{{ $data->trip_a }}">
                            </div>
                            <div class="form-group">
                                <label>Trip B</label>
                                <input type="text" class="form-control" id="iTripB" name="trip_b" value="{{ $data->trip_b }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Lokasi A</label>
                                        <div style="width: 100%; height: 500px" id="mapContainerA"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Lokasi B</label>
                                        <div style="width: 100%; height: 500px" id="mapContainerB"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <div class="row justify-content-end">
                                <div class="col-sm-12 col-lg-2 mt-2 mb-lg-0">
                                    <button type="button" class="btn btn-block btn-outline-danger" onclick="window.location = '{{ url()->previous() }}'">
                                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                                    </button>
                                </div>
                                <div class="col-sm-12 col-lg-2 mt-2 mb-lg-0">
                                    <button type="submit" id="btnBaru" class="btn btn-block btn-success">
                                        <i class="fas fa-check mr-2"></i>Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let formData = $('#formData');
        let lastMarkerA = null;
        let lastMarkerB = null;

        let mapMarker = new H.map.Icon('{{ asset('assets/img/bus-stop.svg') }}', {size: {w: 32, h: 32}});
        let lokasi = {
            a: {lat: '{{ $data->latitude_a }}', lng: '{{ $data->longitude_a }}'},
            b: {lat: '{{ $data->latitude_b }}', lng: '{{ $data->longitude_b }}'},
        };
        const mapA = new H.Map(
            document.getElementById('mapContainerA'),
            defaultLayers.vector.normal.map,
            {
                zoom: 12,
                center: { lat: -6.966667, lng: 110.416664 }
            });
        const behaviorA = new H.mapevents.Behavior(new H.mapevents.MapEvents(mapA));
        const uiA = H.ui.UI.createDefault(mapA, defaultLayers);

        const mapB = new H.Map(
            document.getElementById('mapContainerB'),
            defaultLayers.vector.normal.map,
            {
                zoom: 12,
                center: { lat: -6.966667, lng: 110.416664 }
            });
        const behaviorB = new H.mapevents.Behavior(new H.mapevents.MapEvents(mapB));
        const uiB = H.ui.UI.createDefault(mapB, defaultLayers);

        $(document).ready(function () {
            if (lokasi.a.lat !== '') {
                let markerA = new H.map.Marker(lokasi.a, {icon: mapMarker});
                let markerB = new H.map.Marker(lokasi.b, {icon: mapMarker});
                lastMarkerA = markerA;
                lastMarkerB = markerB;
                mapA.addObject(markerA);
                mapB.addObject(markerB);
                mapA.setCenter(lokasi.a);
                mapB.setCenter(lokasi.b);
            }
            mapA.addEventListener('tap',function (evt) {
                let coordsA = mapA.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                let markerA = new H.map.Marker(coordsA, {icon: mapMarker});

                if (lastMarkerA === null) {
                    lastMarkerA = markerA;
                } else {
                    mapA.removeObject(lastMarkerA);
                    lastMarkerA = markerA;
                }
                mapA.addObject(markerA);
                mapA.setCenter(coordsA);
                lokasi.a.lat = coordsA.lat;
                lokasi.a.lng = coordsA.lng;
            });
            mapB.addEventListener('tap',function (evt) {
                let coordsB = mapB.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                let markerB = new H.map.Marker(coordsB, {icon: mapMarker});

                if (lastMarkerB === null) {
                    lastMarkerB = markerB;
                } else {
                    mapB.removeObject(lastMarkerB);
                    lastMarkerB = markerB;
                }
                mapB.addObject(markerB);
                mapB.setCenter(coordsB);
                lokasi.b.lat = coordsB.lat;
                lokasi.b.lng = coordsB.lng;
            });

            formData.submit(function (e) {
                e.preventDefault();
                let data = {
                    type: 'edit',
                    id: $('#iID').val(),
                    koridor: $('#iKoridor').val(),
                    rute: $('#iRute').val(),
                    trip_a: $('#iTripA').val(),
                    trip_b: $('#iTripB').val(),
                    lat_a: lokasi.a.lat,
                    lng_a: lokasi.a.lng,
                    lat_b: lokasi.b.lat,
                    lng_b: lokasi.b.lng,
                };
                $.ajax({
                    url: '{{ url('dashboard/master/koridor/submit') }}',
                    method: 'post',
                    data: data,
                    success: function (response) {
                        if (response === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data Tersimpan',
                                showConfirmButton: false,
                                timer: 1000,
                                onClose: function () {
                                    window.location = '{{ url('dashboard/master/koridor/list') }}';
                                }
                            });
                        } else {
                            console.log(response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Data Gagal Tersimpan',
                                text: 'Silahkan coba lagi atau hubungi WAVE Solusi Indonesia',
                            });
                        }
                    }
                })
            })
        });
    </script>
@endsection
