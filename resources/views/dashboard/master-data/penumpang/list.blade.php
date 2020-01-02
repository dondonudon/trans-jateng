@extends('dashboard.layout')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar {{ ucfirst(request()->segment(3)) }}</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="thead-dark table-sm table-striped" id="listTable" style="width: 100%"></div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="row justify-content-end">
                            <div class="col-sm-12 col-lg-3 mt-2 mt-lg-0">
                                <div class="btn-group btn-block mb-3" role="group" aria-label="Basic example">
                                    <button type="button" id="btnDisable" class="btn btn-danger disabled">
                                        <i class="fas fa-times mr-2"></i>Disable
                                    </button>
                                    <button type="button" id="btnActivate" class="btn btn-success disabled">
                                        <i class="fas fa-check mr-2"></i>Activate
                                    </button>
                                </div>
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
        function changeStatus(data,status,question,commit,successResponse,failedResponse,table) {
            Swal.fire({
                title: question,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: commit
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ url('dashboard/master/penumpang') }}/'+status,
                        method: 'post',
                        data: data,
                        success: function (response) {
                            if (response === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: successResponse,
                                    onClose(modalElement) {
                                        table.setData();
                                    }
                                });
                            } else {
                                console.log(response);
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Gagal',
                                    text: failedResponse,
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
        }

        const btnDisable = $('#btnDisable');
        const btnActivate = $('#btnActivate');
        let btnEdit = $('#btnEdit');

        let dataID;

        $(document).ready(function () {
            let listTable = new Tabulator("#listTable", {
                resizableColumns: false,
                layout: "fitDataStretch",
                selectable: 1,
                placeholder: 'No Data Available',
                pagination: "remote",
                ajaxURL: "{{ url('dashboard/master/penumpang/data') }}",
                ajaxConfig: {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    }
                },
                ajaxURLGenerator:function(url, config, params){
                    return url + "?page=" + params.page;
                },
                columns: [
                    {
                        title:"Status",field:"status",width:100,
                        formatter: function (row) {
                            if (row.getData().status === 1) {
                                row.getElement().style.backgroundColor = "rgba(0,155,0,0.81)";
                                row.getElement().style.color = "white";
                                row.getElement().style.textAlign = "center";
                                return 'Aktif';
                            } else {
                                row.getElement().style.backgroundColor = "rgb(155,0,10)";
                                row.getElement().style.color = "white";
                                row.getElement().style.textAlign = "center";
                                return 'Nonaktif';
                            }
                        }
                    },
                    {title:"Jenis Penumpang",field:"jenis"},
                    {
                        title:"Harga",field:"harga",
                        formatter: function (cell) {
                            return numeral(cell.getValue()).format('0,0.0');
                        }
                    },
                ],
                rowSelectionChanged:function (data,rows) {
                    if (data.length === 1) {
                        btnEdit.removeAttr('disabled');
                        if (data[0].status === 1) {
                            btnActivate.addClass('disabled');
                            btnDisable.removeClass('disabled');
                        } else {
                            btnActivate.removeClass('disabled');
                            btnDisable.addClass('disabled');
                        }
                    } else {
                        btnEdit.attr('disabled',true);
                        btnDisable.addClass('disabled');
                        btnActivate.addClass('disabled');
                    }
                }
            });
            {{--let listTable = $('#listTable').DataTable({--}}
            {{--    scrollX: true,--}}
            {{--    order: [--}}
            {{--        [ 0, 'asc' ],--}}
            {{--    ],--}}
            {{--    ajax: {--}}
            {{--        url: '{{ url('dashboard/master/penumpang/data') }}'--}}
            {{--    },--}}
            {{--    columns: [--}}
            {{--        {--}}
            {{--            data: 'status',--}}
            {{--            render: function (data) {--}}
            {{--                if (data === 1) {--}}
            {{--                    return 'Aktif';--}}
            {{--                } else {--}}
            {{--                    return 'Nonaktif';--}}
            {{--                }--}}
            {{--            },--}}
            {{--            createdCell: function (td, cellData, rowData, row, col) {--}}
            {{--                if (cellData === 1) {--}}
            {{--                    $(td).css('background-color', 'green');--}}
            {{--                    $(td).css('color', 'white');--}}
            {{--                } else {--}}
            {{--                    $(td).css('background-color', 'maroon');--}}
            {{--                    $(td).css('color', 'white');--}}
            {{--                }--}}
            {{--            }--}}
            {{--        },--}}
            {{--        {data: 'jenis'},--}}
            {{--        {data: 'harga'},--}}
            {{--    ],--}}
            {{--});--}}
            {{--$('#listTable tbody').on('click','tr',function () {--}}
            {{--    if ($(this).hasClass('selected')) {--}}
            {{--        $(this).removeClass('selected');--}}
            {{--        btnEdit.attr('disabled',true);--}}

            {{--        dataID = null;--}}
            {{--    } else {--}}
            {{--        listTable.$('tr.selected').removeClass('selected');--}}
            {{--        $(this).addClass('selected');--}}
            {{--        btnEdit.removeAttr('disabled');--}}

            {{--        let data = listTable.row('.selected').data();--}}
            {{--        dataID = data.id;--}}
            {{--    }--}}
            {{--});--}}

            btnEdit.click(function (e) {
                e.preventDefault();
                let id = listTable.getSelectedData()[0].id;
                window.location = '{{ url('dashboard/master/penumpang/edit') }}/'+id;
            });

            btnDisable.click(function (e) {
                e.preventDefault();
                let id = listTable.getSelectedData()[0].id;
                changeStatus(
                    {id: id},
                    'disable',
                    'Nonaktifkan penumpang ini?',
                    'Nonaktifkan Penumpang',
                    'Penumpang nonaktif!',
                    'Gagal menonaktifkan penumpang, silahkan coba lagi!',
                    listTable
                );
            });

            btnActivate.click(function (e) {
                e.preventDefault();
                let id = listTable.getSelectedData()[0].id;
                changeStatus(
                    {id: id},
                    'activate',
                    'Aktifkan penumpang ini?',
                    'Aktifkan Penumpang',
                    'Penumpang aktif!',
                    'Gagal mengaktifkan penumpang, silahkan coba lagi!',
                    listTable
                );
            });
        });
    </script>
@endsection
