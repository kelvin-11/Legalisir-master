@extends('layout.user')

@section('user')
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <h4 class="card-title">SMKN 1 JENANGAN</h4>
                <form class="form-sample">
                    <h4 class="card-description">
                        <b>Data {{ $siswa->nama }}</b>
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nisn </label>
                                <div class="col-sm-8 ms-4">
                                    <input type="text" value="{{ $siswa->nisn }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama </label>
                                <div class="col-sm-8 ms-4">
                                    <input type="text" value="{{ $siswa->nama }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tempat Tanggal Lahir </label>
                                <div class="col-sm-8 ms-4">
                                    <input type="text" class="form-control"
                                        value="{{ $siswa->tmp_lahir }}, {{ date('d-m-Y', strtotime($siswa->tgl_lahir)) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kompotensi Keahlian </label>
                                <div class="col-sm-8 ms-4">
                                    <input class="form-control" value="{{ $siswa->jurusan }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelas </label>
                                <div class="col-sm-8 ms-4">
                                    <input type="text" value="{{ $siswa->kelas }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tahun Lulus </label>
                                <div class="col-sm-8 ms-4">
                                    <input value="{{ $siswa->thn_lulus }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#modalIjasah" class="btn btn-success mt-3" data-toggle="modal"><i class="fa fa-eye"></i>
                        Preview Ijazah</a>
                    <a href="#modalVerif" class="btn btn-success mt-3 right-block" data-toggle="modal"><i
                            class="fas fa-check-circle"></i> Verifikasi</a>
                    <a href="#modalHistory" class="btn btn-info mt-3 right-block" data-toggle="modal"><i
                            class="fas fa-check-circle"></i> History</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Preview Ijasah -->
    <div class="modal fade" id="modalIjasah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h4 class="modal-title" id="exampleModalLongTitle"><b class="text-success">Ijasah</b></h4> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @if ($siswa->pdf == null)
                    <center>
                        <form action="/find-data/{{ $siswa->id }}/upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3 mt-2" id="pdf">
                                <label for="pdf">Silahkan Upload File Ijazah Terlebih Dahulu</label>
                                <input type="file" name="pdf" id="pdf"
                                    class="mt-2 form-control col-lg-6 col-md-6">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                    changes</button>
                            </div>
                        </form>
                    </center>
            </div>
            @else
            @if (substr($siswa->pdf, -3) == 'pdf')
                <center>
                    <iframe type="application/pdf" src="{{ asset($url) }}#toolbar=0"  class="d-flex float-center" aria-readonly="true"
                        width="500" height="700">{{ $siswa->pdf }}</iframe>
                    {{-- <embed type="application/pdf" src="{{ asset($url) }}" class="d-flex float-center" aria-readonly="true"
                        width="500" height="700">{{ $siswa->pdf }}</embed> --}}
                </center>
            @endif
        @endif
        </div>
    </div>
    </div>

    <!-- Modal Verifikasi -->
    <div class="modal fade " id="modalVerif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b class="text-success">Yakin ?</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/transaksi/{{ $siswa->id }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4><b>Apakah Data Sudah Benar ?</b></h4>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Salah</button>
                                <button type="submit" class="btn btn-success"
                                    @if ($siswa->status !== 'belum legalisir') disabled @endif>Benar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Histroy -->
    <div class="modal fade" id="modalHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan Masukkan No-Resi Terlebih Dahulu</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/history" method="post">
                    @csrf
                <input type="hidden" class="form-control" name="ijasah_id" value="{{ $siswa->id }}" >
                <div class="modal-body">
                    <input type="number" class="form-control" name="No_Resi" required autofocus>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/js/file-upload.js"></script>
<script src="assets/js/typeahead.js"></script>
<script src="assets/js/select2.js"></script>
<!-- End custom js for this page-->
