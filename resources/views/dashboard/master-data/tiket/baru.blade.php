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
                                <label for="iPenumpang">Tipe Penumpang</label>
                                <select style="width: 100%" id="iPenumpang" name="penumpang" required></select>
                            </div>
                            <div class="form-group">
                                <label for="iAwal">No Awal</label>
                                <input type="number" class="form-control" id="iAwal" name="awal" required>
                            </div>
                            <div class="form-group">
                                <label for="iAkhir">No Akhir</label>
                                <input type="number" class="form-control" id="iAkhir" name="akhir" required>
                            </div>
                            <div class="form-group">
                                <label for="iQty">QTY</label>
                                <input type="text" class="form-control" id="iQty" name="qty" readonly>
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
        let iPenumpang = $('#iPenumpang');

        $(document).ready(function () {
            $('#iAkhir').on('change',function(){
            var awal    =$("#iAwal").val();
            var akhir    =$("#iAkhir").val();
            if (akhir<awal){
                Swal.fire({
                    icon: 'error',
                    title: 'Koreksi No Awal dan No Akhir',
                    text: 'Silahkan coba lagi atau hubungi WAVE Solusi Indonesia',
                });
            }else{
                var qty  = (akhir - awal)+1;
                $("#iQty").val(qty);
            }
            });

            iPenumpang.select2({
                ajax: {
                    url: '{{ url('penumpang') }}',
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
                $.ajax({
                    url: '{{ url('dashboard/master/tiket/submit') }}',
                    method: 'post',
                    data: $(this).serialize(),
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
