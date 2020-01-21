@extends('dashboard.layout')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah {{ ucfirst(request()->segment(3)) }} Baru</h4>
                    </div>
                    <form id="formData">
                        <input type="hidden" name="type" value="baru">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="iKoridor">Koridor</label>
                                <select style="width: 100%" id="iKoridor" name="koridor" required></select>
                            </div>
                            <div class="form-group">
                                <label for="iNama">Nama Shelter</label>
                                <input type="text" class="form-control" id="iNama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="iLokasi">Lokasi</label>
                                <input type="text" class="form-control" id="iLokasi" name="lokasi">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Lokasi MAP</label>
                                        <div style="width: 100%; height: 500px" id="mapContainer"></div>
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
        let formData = $('#formData');
        let iKoridor = $('#iKoridor');

        function initMap() {
            let myLocation = { lat: -6.966667, lng: 110.416664 };
            let map = new google.maps.Map(document.getElementById('mapContainer'), {
                center: myLocation,
                zoom: 12
            });

            map.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng, map);
            });
        }

        function placeMarkerAndPanTo(latLng, map, option) {
            clearMarker(map,option);
            mapMarker = new google.maps.Marker({
                position: latLng,
                map: map
            });
            map.panTo(latLng);
            mapMarkers = mapMarker;
        }

        function clearMarker(map) {
            if (mapMarkers !== null) {
                mapMarkers.setMap(null);
            }
        }
        let mapMarkers = null;

        $(document).ready(function () {
            iKoridor.select2({
                ajax: {
                    url: '{{ url('koridor') }}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            search: params.term,
                        }
                    }
                }
            });

            formData.submit(function (e) {
                e.preventDefault();
                let data = {
                    type: 'baru',
                    id_koridor: iKoridor.val(),
                    nama: $('#iNama').val(),
                    lokasi: $('#iLokasi').val(),
                    lat: mapMarkers.getPosition().lat(),
                    lng: mapMarkers.getPosition().lng(),
                };
                $.ajax({
                    url: '{{ url('dashboard/master/shelter/submit') }}',
                    method: 'post',
                    data: data,
                    success: function (response) {
                        // console.log(response);
                        if (response.status === 'success') {
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
                            Swal.fire({
                                icon: 'warning',
                                title: 'Data Gagal Tersimpan',
                                text: response.message,
                            });
                        }
                    },
                    error: function (response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'System Error',
                            text: 'Silahkan hubungi WAVE Solusi Indonesia',
                        });
                        console.log(response);
                    }
                })
            })
        });
    </script>
    @include('dashboard._partials.google-maps')
@endsection
