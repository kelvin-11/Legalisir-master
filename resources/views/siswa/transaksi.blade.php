@extends('layout.user')

@section('user')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <form action="/transaksi/" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <input type="hidden" class="form-control" name="ijasah_id" value="{{ $ts->id }}">

                        <div class="form-group row mt-4">
                            <label class="col-sm-3 ms-5 col-form-label"><b>No WhatsApp Aktif</b></label>
                            <div class="col-sm-8">
                                <input type="text" id="jml_cetak" name="no_tlp" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-3 ms-5 col-form-label"><b>Jumlah cetak</b></label>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jml_cetak" id="optionsRadios2"
                                            value="5">5
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jml_cetak" id="optionsRadios2"
                                            value="10">10
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 ms-5 col-form-label"><b>Mode Penerimaan</b></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="mode_ambil" id="mode-terima" required>
                                    <option value="pilih">Pilih Opsi</option>
                                    <option value="ambil">Ambil</option>
                                    <option value="kirim">Kirim</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="mode-kirim">
                            <label class="col-sm-3 ms-5 col-form-label"><b>Mode Pengiriman</b></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="kirim" id="transaksi_id">
                                    <option value="">Pilih Opsi</option>
                                    @foreach ($jasa as $t)
                                        <option value="{{ $t->id }}">{{ $t->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-3 ms-5 col-form-label"><b>Ongkos Kirim</b></label>
                            <div class="col-sm-8 d-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                </div>
                                <input type="text" name="ongkos" id="detail_harga" class="form-control" readonly
                                    required>
                            </div>
                            <!--Alamat -->
                            <div class="form-group row mt-3" id="mode-alamat">
                                <label class="col-sm-3 ms-5 col-form-label"><b>Masukan alamat</b></label>
                                <div class="col-sm-8">
                                    <input type="text" name="alamat" class="form-control ml-2">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            
                            <button type="submit" class="btn btn-success mr-5 me-5 right-block mb-3 ">Submit</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#mode-kirim').hide()
        $('#mode-alamat').hide()
        $('#mode-terima').on('change', function(e) {
            console.log(e.target.value);
            if (e.target.value == "kirim") {
                $('#mode-kirim').show()
                $('#mode-alamat').show()
            } else if (e.target.value == "ambil") {
                $('#jadwal').show()
                $('#mode-kirim').hide()
                $('#mode-alamat').hide()
            } else if (e.target.value == "pilih") {
                $('#mode-kirim').hide()
                $('#mode-alamat').hide()
            }
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        $("#transaksi_id").change(function() {
            var transaksi_id = $("#transaksi_id").val();
            $.ajax({
                type: "GET",
                url: "{{ url('api/harga-jasa') }}/" + transaksi_id,
                cache: false,
                success: function(data) {
                    let harga = data.data.harga
                    $('#detail_harga').val(harga);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        });
    </script>
@endsection
