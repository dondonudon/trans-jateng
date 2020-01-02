@extends('dashboard.layout')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar {{ ucfirst(request()->segment(3)) }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="iTanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="iTanggal" name="tanggal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="thead-dark table-sm table-striped" id="listTable" style="width: 100%"></div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="row justify-content-end">
                            <div class="col-sm-12 col-lg-2 mt-2 mt-lg-0">
                                <button type="button" id="btnDelete" class="btn btn-block btn-outline-danger" disabled>
                                    <i class="fas fa-times mr-2"></i>Delete
                                </button>
                            </div>
                            <div class="col-sm-12 col-lg-2 mt-2 mt-lg-0">
                                <button type="button" id="btnEdit" class="btn btn-block btn-danger" disabled>
                                    <i class="fas fa-pencil-alt mr-2"></i>Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        const btnDelete = $('#btnDelete');
        let btnEdit = $('#btnEdit');
        let iTanggal = $('#iTanggal').daterangepicker({
            startDate: moment().format('DD-MM-YYYY'),
            endDate: moment().add(14,'days').format('DD-MM-YYYY'),
            locale: {
                format: 'DD-MM-YYYY',
            },
        });

        let dataID;

        $(document).ready(function () {
            let listTable = new Tabulator("#listTable", {
                resizableColumns: false,
                layout: "fitDataStretch",
                selectable: 1,
                placeholder: 'No Data Available',
                pagination: "remote",
                ajaxURL: "{{ url('dashboard/master/hari-libur/data') }}",
                ajaxConfig: {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    }
                },
                ajaxURLGenerator:function(url, config, params){
                    let start = iTanggal.data('daterangepicker').startDate.format('YYYY-MM-DD');
                    let end = iTanggal.data('daterangepicker').endDate.format('YYYY-MM-DD');
                    return url + "?page=" + params.page+'&start='+start+'&end='+end;
                },
                columns: [
                    {title:"Tanggal",field:"tanggal"},
                    {title:"Penumpang",field:"penumpang"},
                    {title:"Keterangan",field:"keterangan"},
                ],
                rowSelectionChanged:function (data,rows) {
                    if (data.length === 1) {
                        btnEdit.removeAttr('disabled');
                        btnDelete.removeAttr('disabled');
                    } else {
                        btnEdit.attr('disabled',true);
                        btnDelete.attr('disabled',true);
                    }
                }
            });

            $('#iTanggal').on('apply.daterangepicker', function(ev, picker) {
                listTable.setData();
            });

            btnEdit.click(function (e) {
                e.preventDefault();
                let id = moment(listTable.getSelectedData()[0].tanggal).format('YYYY-MM-DD');
                window.location = '{{ url('dashboard/master/hari-libur/edit') }}/'+id;
            });

            btnDelete.click(function (e) {
                e.preventDefault();
                let id = listTable.getSelectedData()[0].id;
                Swal.fire({
                    title: 'Hapus hari libur ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Hari Libur'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ url('dashboard/master/hari-libur') }}/delete',
                            method: 'post',
                            data: {id:id},
                            success: function (response) {
                                if (response === 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Hari libur terhapus',
                                        onClose(modalElement) {
                                            listTable.setData();
                                        }
                                    });
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Gagal',
                                        text: 'Hari libur gagal terhapus',
                                    });
                                }
                            },
                            error: function (response) {
                                console.log(response);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'System Error',
                                    text: 'Silahkan hubungi WAVE Solusi Indonesia',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
