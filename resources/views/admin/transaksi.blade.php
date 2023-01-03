@extends('layout.layout')

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="tablec">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="dataTables_length" id="dataTable_length">
                                    <label class="form-label">Show</label>
                                </div>
                            </div>
                            <div class="col-md-4 ml-3">
                                <select name="dataTable_length" aria-controls="dataTable"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row float-right">
                            <div class="col-md-4">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label for="search">Search:</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <form action="/transaksi-admin" method="get">
                                    <input name="search" type="search" class="form-control form-control-sm"
                                        placeholder="Search . . ." value="{{ request('search') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered text-center mt-4" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah Cetak</th>
                            <th>Mode Pengiriman</th>
                            <th>Nomor Resi</th>
                            <th>Status</th>
                            <th>Tanggal Pembuatan</th>
                            <th style="width: 28%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($transaksi as $u)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $u->ijasah->nama }}</td>
                                <td>{{ $u->jml_cetak }}</td>
                                <td>{{ $u->mode_ambil }}</td>
                                <td>{{ $u->No_Resi }}</td>
                                <td>{{ $u->status }}</td>
                                <td>{{ date('d-m-Y', strtotime($u->created_at)) }}</td>
                                <td>
                                    <a href="#modalDetailTransaksi{{ $u->id }}" data-toggle="modal"
                                        class="btn btn-success btn-sm" data-toggle="tooltip"
                                        data-original-title="Detail Data"><i class="fa fa-eye"></i>
                                        Detail</a>

                                    <a href="#modalEditTransaksi{{ $u->id }}" data-toggle="modal"
                                        class="btn btn-primary btn-sm" data-toggle="tooltip"
                                        data-original-title="Edit Data"><i class="fa fa-edit"></i> Edit</a>

                                    <a href="#modalHapusTransaksi{{ $u->id }}" data-toggle="modal"
                                        class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-original-title="Hapus Data"><i class="fa fa-trash"></i>
                                        Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-2">{{ $transaksi->links() }}</div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Transaksi -->
    @foreach ($transaksi as $dd)
        <div class="modal fade" id="modalEditTransaksi{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Transaksi</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="/transaksi/{{ $dd->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label for="ijasah_id">Ijasah_id</label>
                                    <input type="number" name="ijasah_id" class="form-control"
                                        value="{{ $dd->ijasah_id }}">
                                </div>
                                <div class="mb-2">
                                    <label for="No_Resi">No_Resi</label>
                                    <input type="number" name="No_Resi" class="form-control" value="{{ $dd->No_Resi }}">
                                </div>
                                <div class="mb-2">
                                    <label for="mode_ambil">Mode_ambil</label>
                                    <input type="text" name="mode_ambil" class="form-control"
                                        value="{{ $dd->mode_ambil }}">
                                </div>
                                <div class="mb-2">
                                    <label for="kirim">Kirim</label>
                                    <input type="text" name="kirim" class="form-control"
                                        value="{{ $dd->kirim }}">
                                </div>
                                <div class="mb-2">
                                    <label for="ongkos">Ongkir</label>
                                    <input type="number" name="ongkos" class="form-control"
                                        value="{{ $dd->ongkos }}">
                                </div>
                                <div class="mb-2">
                                    <label for="jml_cetak">Jumlah Cetak</label>
                                    <input type="number" name="jml_cetak" class="form-control"
                                        value="{{ $dd->jml_cetak }}">
                                </div>
                                <div class="mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option <?php if ($dd->status == 'proses') {
                                            echo 'selected';
                                        } ?> value="proses">Proses</option>
                                        <option <?php if ($dd->status == 'dikirim') {
                                            echo 'selected';
                                        } ?> value="dikirim">Dikirim</option>
                                        <option <?php if ($dd->status == 'diambil') {
                                            echo 'selected';
                                        } ?> value="diambil">Diambil</option>
                                        <option <?php if ($dd->status == 'terdistribusi') {
                                            echo 'selected';
                                        } ?> value="terdistribusi">Terdistribusi</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ $dd->alamat }}">
                                </div>
                                <div class="mb-2">
                                    <label for="no_tlp">No Hp</label>
                                    <input type="text" name="no_tlp" class="form-control"
                                        value="{{ $dd->no_tlp }}">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Detail -->
    @foreach ($transaksi as $tr)
        <div class="modal fade" id="modalDetailTransaksi{{ $tr->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Detail Data Ijasah</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @if ($tr->mode_ambil == 'kirim')
                            {{-- History Dikirm --}}
                            <div class="row align-items-center" style="height: 100vh;">
                                <div class="col-lg-12">
                                    <div class="card ">
                                        <div class="row mt-3">
                                            <div class="col-lg-2">

                                            </div>
                                            <div class="col-lg-8">
                                                <div class="text-center mt-3">
                                                    <h2><b>SMKN 1 JENANGAN</b></h2>
                                                    <h4>JL.Niken Gandini NO.98</h4>
                                                    <h4>Plampitan, Kec.Jenangan, Kab.Ponorogo, Prov.Jawa Timur</h4>
                                                    <h4>Telp. (0352) 481236</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-lg-6" style="margin-left: 20vh;">
                                                <div class=" mb-3">
                                                    <h5><b>No Resi : {{ $tr->No_Resi }}</b></h5>
                                                    <h5><b>Alamat : {{ $tr->alamat }}</b></h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ms-5 mb-3">
                                                    @if ($tr->status == 'dikirim')
                                                        <h5><b>Legalisir Dikirim Pada :
                                                            </b> {{ date('d-m-Y', strtotime($tr->updated_at)) }}</h5>
                                                    @elseif ($tr->status == 'terdistribusi')
                                                        <h5><b>Legalisir Terdisribusi Pada :
                                                            </b> {{ date('d-m-Y', strtotime($tr->updated_at)) }}</h5>
                                                    @elseif ($tr->status == 'proses')
                                                        <h5><i>Legalisir Anda Sedang Diproses Silahkan Tunggu
                                                                Informasi
                                                                Lebih
                                                                Lanjut...!</i></h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="basic-datatables"
                                                    class="display table table-striped table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Penerima</th>
                                                            <th>Jumlah Cetak</th>
                                                            <th>Biaya Pengiriman</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <th>{{ $tr->ijasah->nama }}</th>
                                                            <th>{{ $tr->jml_cetak }}</th>
                                                            <th>Rp. {{ number_format($tr->ongkos) }}</th>
                                                            <th>{{ $tr->status }}</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($tr->mode_ambil == 'ambil')
                            {{-- History Diambil --}}
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-lg-2">

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h2><b>SMKN 1 JENANGAN</b></h2>
                                                        <h4>JL.Niken Gandini NO.98</h4>
                                                        <h4>Plampitan, Kec.Jenangan, Kab.Ponorogo, Prov.Jawa Timur</h4>
                                                        <h4>Telp. (0352) 481236</h4>
                                                    </div>
                                                    <div class="col-lg-2">

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="div">
                                                        <h4 class="text-right">
                                                            Ponorogo,{{ date('d-m-Y', strtotime($tr->updated_at)) }}
                                                        </h4>
                                                        <div class="row" style="margin-left: 10vh">
                                                            <div class="col-lg-6">
                                                                <h4><b>Nomor : </b>{{ $tr->No_Resi }}</h4>
                                                                <h4><b>Nama Penerima :</b>{{ $tr->ijasah->nama }}</h4>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h4><b>Status : </b> {{ $tr->status }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            @if ($tr->status == 'diambil')
                                                                <h4><b>Legalisir Dapat Diambil Pada
                                                                        :</b>{{ date('d-m-Y', strtotime($tr->tanggal)) }}
                                                                </h4>
                                                            @elseif ($tr->status == 'terdistribusi')
                                                                <h4><b>Legalsir Anda Telah Terdisribusi Pada
                                                                        :</b>{{ date('d-m-Y', strtotime($tr->tanggal)) }}
                                                                </h4>
                                                            @elseif ($tr->status == 'proses')
                                                                <h4><b>Legalisir Anda Sedang Diproses Silahkan
                                                                        Tunggu
                                                                        Informasi
                                                                        Lebih
                                                                        Lanjut...!</b></h4>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Hapus --}}
    @foreach ($transaksi as $g)
        <div class="modal fade" id="modalHapusTransaksi{{ $g->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/transaksi/{{ $g->id }}/destroy" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{ $g->id }}" name="id" required>

                            <div class="form-group">
                                <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-undo"></i> Close</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Hapus</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
