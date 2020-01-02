@extends('dashboard.layout')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bus Report Detail</h4>
                    </div>
                    <form id="formData">
                        <input type="hidden" name="type" value="edit">
                        <input type="hidden" id="iID" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <dl class="row">
                                        <dt class="col-sm-3">Petugas</dt>
                                        <dd class="col-sm-9">{{ $data->name }}</dd>

                                        <dt class="col-sm-3">Shift</dt>
                                        <dd class="col-sm-9">{{ $data->shift }}</dd>

                                        <dt class="col-sm-3">Bus</dt>
                                        <dd class="col-sm-9">{{ $data->bus }}</dd>

                                        <dt class="col-sm-3">Koridor</dt>
                                        <dd class="col-sm-9">{{ $data->koridor }}</dd>

                                        <dt class="col-sm-3">Trip</dt>
                                        <dd class="col-sm-9">{{ $data->trip }}</dd>

                                        <dt class="col-sm-3">Keterangan</dt>
                                        <dd class="col-sm-9">{{ $data->keterangan }}</dd>
                                    </dl>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <div style="width: 100%; height: 300px" id="mapContainer"></div>
                                    </div>
                                    <button type="button" class="btn btn-block btn-outline-primary" id="btnMaps">
                                        <i class="fab fa-google mr-2"></i>Open in Maps
                                    </button>
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
        let btnMaps = $('#btnMaps');

        let mapMarker = new H.map.Icon('{{ asset('assets/img/bus.svg') }}', {size: {w: 32, h: 32}});
        let lokasi = {
            lat: '{{ $data->latitude }}',
            lng: '{{ $data->longitude }}'
        };
        const map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map,
            {
                zoom: 14,
                center: { lat: -6.966667, lng: 110.416664 }
            });
        const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
        const ui = H.ui.UI.createDefault(map, defaultLayers);

        $(document).ready(function () {
            if (lokasi.lat !== '') {
                let marker = new H.map.Marker(lokasi, {icon: mapMarker});
                map.addObject(marker);
                map.setCenter(lokasi);
            }

            btnMaps.click(function (e) {
                e.preventDefault();
                window.open('https://www.google.com/maps/search/?api=1&query='+lokasi.lat+','+lokasi.lng);
            });
        });
    </script>
@endsection
