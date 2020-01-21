@extends('dashboard.layout')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ ucfirst(str_replace('-',' ',request()->segment(3))) }} Baru</h4>
                    </div>
                    <form id="formData">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-4">
                                    <div class="form-group">
                                        <label for="iPetugas">Petugas</label>
                                        <select style="width: 100%" id="iPetugas" name="petugas" required></select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-1">
                                    <div class="form-group">
                                        <label for="iShift">Shift</label>
                                        <select style="width: 100%" id="iShift" name="shift" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-4">
                                    <div class="form-group">
                                        <label for="iKoridor">Koridor</label>
                                        <select style="width: 100%" id="iKoridor" name="koridor" required></select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="iBus">Bus</label>
                                        <select style="width: 100%" id="iBus" name="bus" required></select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="iPenumpang">Penumpang</label>
                                        <select style="width: 100%" id="iPenumpang" name="penumpang" required></select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="iHargaTiket">Harga per Tiket</label>
                                        <input type="text" class="form-control text-right" id="iHargaTiket" name="harga_tiket" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="iStartTiket">Nomor Tiket Awal</label>
                                        <input type="number" class="form-control" id="iStartTiket" name="start_tiket" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="iEndTiket">Nomor Tiket Akhir</label>
                                        <input type="number" class="form-control" id="iEndTiket" name="end_tiket" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="iTotal">Total Tiket</label>
                                        <input type="text" class="form-control text-right" id="iTotal" name="total_tiket" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-end">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="iTotalBiaya">Total Biaya</label>
                                        <input type="text" class="form-control text-right" id="iTotalBiaya" name="total_biaya" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <div class="row justify-content-end">
                                <div class="col-sm-12 col-lg-2 mt-2 mb-lg-0 text-center">
                                    <button type="submit" class="btn btn-block btn-success" id="btnSubmit">
                                        <i class="fas fa-check mr-2"></i>Simpan
                                    </button>
                                    <div class="spinner-border text-danger d-none" role="status" id="spinner">
                                        <span class="sr-only">Loading...</span>
                                    </div>
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
        function calculateTotal() {
            let hargaTiket = numeral(iHargaTiket.val()).value();
            let start = parseInt(iStartTiket.value);
            let end = parseInt(iEndTiket.value);
            if (start !== 0 && end !== 0 && start < end && hargaTiket !== null) {
                let totalTiket = end - (start-1);
                let totalBiaya = totalTiket*hargaTiket;
                iTotal.value = totalTiket;
                iTotalBiaya.value = numeral(totalBiaya).format('0,0.0');
            } else {
                iTotal.value = '';
                iTotalBiaya.value = '';
            }
        }
        let formData = $('#formData');
        const btnSubmit = $('#btnSubmit');
        const spinner = $('#spinner');
        const iHargaTiket = $('#iHargaTiket');
        const iStartTiket = document.getElementById('iStartTiket');
        const iEndTiket = document.getElementById('iEndTiket');
        const iTotal = document.getElementById('iTotal');
        const iTotalBiaya = document.getElementById('iTotalBiaya');
        const iKoridor = $('#iKoridor');
        const iPenumpang = $('#iPenumpang');
        const iPetugas = $('#iPetugas');
        const iShift = $('#iShift');
        const iBus = $('#iBus');

        $(document).ready(function () {
            iPetugas.select2({
                ajax: {
                    url: '{{ url('petugas') }}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            search: params.term,
                        }
                    }
                }
            });
            iShift.select2({
                data: [
                    {id:1, text:'1'},
                    {id:2, text:'2'},
                ]
            });
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
            iBus.select2({
                ajax: {
                    url: '{{ url('bus') }}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            search: params.term,
                        }
                    }
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
            iPenumpang.change(function () {
                let id = this.value;
                $.ajax({
                    url: '{{ url('penumpang') }}/'+id,
                    method: 'get',
                    success: function (response) {
                        iHargaTiket.val(numeral(response.harga).format('0,0.0'));
                        calculateTotal();
                    },
                    error: function (response) {
                        console.log(response);
                    }
                })
            });
            iStartTiket.addEventListener('keyup',function (e) {
                e.preventDefault();
                calculateTotal();
            });
            iEndTiket.addEventListener('keyup',function (e) {
                e.preventDefault();
                calculateTotal();
            });
            formData.submit(function (e) {
                e.preventDefault();
                // console.log($(this).serialize());
                btnSubmit.addClass('d-none');
                spinner.removeClass('d-none');
                $.ajax({
                    url: '{{ url('dashboard/penjualan/tiket-offline/submit') }}',
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
                                text: 'Pastikan nomor tiket belum pernah digunakan',
                            });
                        }
                    },
                    error: function (response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'System Error',
                        });
                    },
                    complete: function () {
                        btnSubmit.removeClass('d-none');
                        spinner.addClass('d-none');
                    }
                })
            })
        });
    </script>
@endsection
