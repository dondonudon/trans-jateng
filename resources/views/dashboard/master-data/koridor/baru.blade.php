@extends('dashboard.layout')

@section('page_menu')
    <li class="nav-item active">
        <a href="{{ url(request()->segment(1).'/'.request()->segment(2).'/'.request()->segment(3)) }}" class="nav-link">{{ ucfirst(request()->segment(3)) }} Baru</a>
    </li>
    <li class="nav-item">
        <a href="{{ url(request()->segment(1).'/'.request()->segment(2).'/'.request()->segment(3)) }}/list" class="nav-link">List {{ ucfirst(request()->segment(3)) }}</a>
    </li>
@endsection

@section('title','Master - Koridor')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah {{ ucfirst(request()->segment(3)) }} Baru</h4>
                    </div>
                    <form id="formData">
                        <input type="hidden" name="type" value="baru">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Koridor</label>
                                <input type="text" class="form-control" id="iKoridor" name="koridor">
                            </div>
                            <div class="form-group">
                                <label>Rute</label>
                                <input type="text" class="form-control" id="iRute" name="rute">
                            </div>
                            <div class="form-group">
                                <label>Trip A</label>
                                <input type="text" class="form-control" id="iTripA" name="trip_a">
                            </div>
                            <div class="form-group">
                                <label>Trip B</label>
                                <input type="text" class="form-control" id="iTripB" name="trip_b">
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <div style="width: 100%; height: 500px" id="mapContainer"></div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <div class="row justify-content-end">
                                <div class="col-sm-12 col-lg-2 mt-2 mb-lg-0">
                                    <button type="submit" class="btn btn-block btn-success"><i class="fas fa-check mr-2"></i>Simpan</button>
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
        let mapMarker = new H.map.Icon('{{ asset('assets/img/bus-stop.svg') }}', {size: {w: 32, h: 32}});
        let lastMarker = null;
        let lokasi = {lat: null, lng: null};
        const map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map,
            {
                zoom: 12,
                center: { lat: -6.966667, lng: 110.416664 }
            });
        const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
        const ui = H.ui.UI.createDefault(map, defaultLayers);

        $(document).ready(function () {
            map.addEventListener('tap',function (evt) {
                let coords = map.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                let marker = new H.map.Marker(coords, {icon: mapMarker});

                if (lastMarker === null) {
                    lastMarker = marker;
                } else {
                    map.removeObject(lastMarker);
                    lastMarker = marker;
                }
                map.addObject(marker);
                map.setCenter(coords);
                location.lat = coords.lat;
                location.lng = coords.lng;
            });

            formData.submit(function (e) {
                e.preventDefault();
                let data = {
                    type: 'baru',
                    koridor: $('#iKoridor').val(),
                    rute: $('#iRute').val(),
                    trip_a: $('#iTripA').val(),
                    trip_b: $('#iTripB').val(),
                    lat: location.lat,
                    lng: location.lng,
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
                                    window.location.reload();
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
                    },
                    error: function (response) {
                        console.log(response);
                    }
                })
            })
        });
    </script>
@endsection
