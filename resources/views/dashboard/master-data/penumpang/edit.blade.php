@extends('dashboard.layout')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit {{ ucfirst(request()->segment(3)) }}</h4>
                    </div>
                    <form id="formData">
                        <input type="hidden" name="type" value="edit">
                        <input type="hidden" id="iID" name="id" value="{{ $data['penumpang']->id }}">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="iJenis">Jenis</label>
                                        <input type="text" class="form-control" id="iJenis" name="jenis" value="{{ $data['penumpang']->jenis }}">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="iHarga">Harga</label>
                                        <input type="text" class="form-control" id="iHarga" name="harga">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="control-label">Opsi Pembayaran</div>
                                        <div class="custom-switches-stacked mt-2">
                                            @foreach($data['pembayaran'] as $p)
                                                <label class="custom-switch">
                                                    @if($data['bayar'] !== null)
                                                        @if(in_array($p->id,$data['bayar']))
                                                            <input type="checkbox" name="pembayaran[]" value="{{ $p->id }}" class="custom-switch-input" checked>
                                                        @else
                                                            <input type="checkbox" name="pembayaran[]" value="{{ $p->id }}" class="custom-switch-input">
                                                        @endif
                                                    @else
                                                        <input type="checkbox" name="pembayaran[]" value="{{ $p->id }}" class="custom-switch-input">
                                                    @endif
                                                        <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">{{ $p->nama }}</span>
                                                </label>
                                            @endforeach
                                        </div>
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
        const iJenis = $('#iJenis');
        const iHarga = new Cleave('#iHarga', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });

        $(document).ready(function () {
            iHarga.setRawValue('{{ $data['penumpang']->harga }}');
            formData.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ url('dashboard/master/penumpang/submit') }}',
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
                                    window.location = '{{ url()->previous() }}';
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
