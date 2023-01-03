@extends('layout.layout')

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Jasa Kirim</h6>
            <button class="btn btn-primary btn-round ml-auto float-right" data-toggle="modal" data-target="#modalAddjasa">
                <i class="fa fa-plus"></i>
                Tambah Jasa Kirim
            </button>
        </div>
        <div class="card-body">
            <div class="table">
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
                                <form action="/jasa-kirim" method="get">
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
                            <th>Jasa Kirim</th>
                            <th>Biaya Ongkir</th>
                            <th style="width: 30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jasa as $u)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $u->jenis }}</td>
                                <td>{{ $u->harga }}</td>
                                <td>
                                    <a href="#modalEditjasa{{ $u->id }}" data-toggle="modal"
                                        class="btn btn-primary btn-xs" data-toggle="tooltip"
                                        data-original-title="Edit Data"><i class="fa fa-edit"></i> Edit</a>

                                    <a href="#modalHapusjasa{{ $u->id }}" data-toggle="modal"
                                        class="btn btn-danger btn-xs" data-toggle="tooltip"
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
                <div class="col-2">{{ $jasa->links() }}</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddjasa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah jasa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/jasa-kirim/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Jasa Kirim </label>
                            <input type="text" class="form-control" name="jenis" placeholder="Jasa Kirim ..." required>
                        </div>
                        <div class="form-group">
                            <label>Harga </label>
                            <div class="d-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                </div>
                                <input type="number" class="form-control" name="harga" placeholder="Biaya Kirim ..."
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @foreach ($jasa as $d)
        <div class="modal fade" id="modalEditjasa{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit jasa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/jasa-kirim/{{ $d->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{ $d->id }}" name="id" required>

                            <div class="form-group">
                                <label>Jasa Kirim </label>
                                <input type="text" class="form-control" value="{{ $d->jenis }}" name="jenis"
                                    placeholder="Jasa Kirim ..." required>
                            </div>
                            <div class="form-group">
                                <label>Harga </label>
                                <div class="d-flex">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    </div>
                                    <input type="number" value="{{ $d->harga }}" class="form-control"
                                        name="harga" placeholder="Biaya Kirim ..." required>
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

    @foreach ($jasa as $g)
        <div class="modal fade" id="modalHapusjasa{{ $g->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus jasa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/jasa-kirim/{{ $g->id }}/destroy" method="get" enctype="multipart/form-data">
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
