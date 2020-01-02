@extends('dashboard.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">
                        Tiket Terjual Hari Ini
                    </div>
                    <div class="card-stats-items">
                        @php($total = 0)
                        @foreach($transaksi as $t)
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $t->total }}</div>
                                <div class="card-stats-item-label">{{ $t->jenis }}</div>
                            </div>
                            @php($total += $t->total)
                        @endforeach
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Tiket</h4>
                    </div>
                    <div class="card-body">
                        {{ $total }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div style="width: 100%; height: 45vh" id="mapContainer"></div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        const map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map,
            {
                zoom: 12,
                center: { lat: -6.966667, lng: 110.416664 }
            }
        );
        const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
        const ui = H.ui.UI.createDefault(map, defaultLayers);

        $(document).ready(function () {
            // setTimeout(function () {
            //     $('#sidebarToggle').click();
            // },8000);
        });
    </script>
@endsection
