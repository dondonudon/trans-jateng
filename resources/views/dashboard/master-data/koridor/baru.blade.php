@extends('dashboard.layout')

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
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label>Kode Koridor</label>
                                        <input type="text" class="form-control" id="iKoridor" name="koridor">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label>Trip A</label>
                                        <input type="text" class="form-control" id="iTripA" name="trip_a">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label>Trip B</label>
                                        <input type="text" class="form-control" id="iTripB" name="trip_b">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Rute</label>
                                <input type="text" class="form-control" id="iRute" name="rute" readonly>
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
        function initMap() {
            let myLocation = { lat: -6.966667, lng: 110.416664 }
            let mapA = new google.maps.Map(document.getElementById('mapContainerA'), {
                center: myLocation,
                zoom: 12
            });
            mapA.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng, mapA, 'a');
            });

            let mapB = new google.maps.Map(document.getElementById('mapContainerB'), {
                center: myLocation,
                zoom: 12
            });
            mapB.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng, mapB, 'b');
            });
        }

        function placeMarkerAndPanTo(latLng, map, option) {
            clearMarker(map,option);
            mapMarker = new google.maps.Marker({
                position: latLng,
                map: map
            });
            map.panTo(latLng);
            if (option === 'a') {
                mapMarkers.a = mapMarker;
            } else {
                mapMarkers.b = mapMarker;
            }
        }

        function clearMarker(map,option) {
            if (option === 'a') {
                if (mapMarkers.a !== null) {
                    mapMarkers.a.setMap(null);
                }
            } else {
                if (mapMarkers.b !== null) {
                    mapMarkers.b.setMap(null);
                }
            }
        }

        let mapMarkers = {
            a: null,
            b: null
        };
        let formData = $('#formData');
        let iTripA = $('#iTripA');
        let iTripB = $('#iTripB');
        let iRute = $('#iRute');

        $(document).ready(function () {
            iTripA.keyup(function () {
                let A = $(this).val();
                let B = iTripB.val();
                iRute.val(A+'-'+B);
            });
            iTripB.keyup(function () {
                let A = iTripA.val();
                let B = $(this).val();
                iRute.val(A+'-'+B);
            });
            formData.submit(function (e) {
                e.preventDefault();
                let data = {
                    type: 'baru',
                    koridor: $('#iKoridor').val(),
                    rute: $('#iRute').val(),
                    trip_a: $('#iTripA').val(),
                    trip_b: $('#iTripB').val(),
                    lat_a: mapMarkers.a.getPosition().lat(),
                    lng_a: mapMarkers.a.getPosition().lng(),
                    lat_b: mapMarkers.b.getPosition().lat(),
                    lng_b: mapMarkers.b.getPosition().lng(),
                };
                console.log(data);
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
                });
            });
        });
    </script>
    @include('dashboard._partials.google-maps')
@endsection
