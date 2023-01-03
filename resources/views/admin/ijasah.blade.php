@extends('layout.layout')

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Ijasah</h6>
            <button class="btn btn-primary btn-round ml-auto float-right" data-toggle="modal" data-target="#modalAddIjasah">
                <i class="fa fa-plus"></i>
                Tambah Data Ijasah
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
                                <form action="/ijasah" method="get">
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
                            <th>Nis</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>Status</th>
                            <th style="width: 30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($ijasah as $u)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $u->nis }}</td>
                                <td>{{ $u->nisn }}</td>
                                <td>{{ $u->nama }}</td>
                                <td>{{ $u->jurusan }}</td>
                                <td>{{ $u->thn_lulus }}</td>
                                <td>{{ $u->status }}</td>
                                <td>
                                    <a href="#modalEditIjasah{{ $u->id }}" data-toggle="modal"
                                        class="btn btn-primary btn-xs" data-toggle="tooltip"
                                        data-original-title="Edit Data"><i class="fa fa-edit"></i> Edit</a>

                                    <a href="#modalHapusIjasah{{ $u->id }}" data-toggle="modal"
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
                <div class="col-2">{{ $ijasah->links() }}</div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah data ijasah -->
    <div class="modal fade" id="modalAddIjasah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Buat Ijasah Siswa</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/ijasah/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-2">
                                <label for="nis">NIS</label>
                                <input type="number" name="nis" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="nama_ibu">Nama Ibu Kandung</label>
                                <input type="text" name="nama_ibu" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" class="form-control">
                            </div>
                            <div class="mb-2" id="thn-lulus">
                                <label for="thn_lulus">Tahun Lulus</label>
                                <input type="number" name="thn_lulus" id="thn-lulus" class="form-control">
                            </div>
                            <div class="mb-2" id="status">
                                {{-- <label for="status">Status</label> --}}
                                <input type="hidden" name="status" id="status" class="form-control"
                                    value="belum legalisir">
                            </div>
                            <div class="mb-3" id="pdf">
                                <label for="pdf">File PDF</label>
                                <input type="file" name="pdf" id="pdf" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($ijasah as $dd)
        <!-- Modal Edit data -->
        <div class="modal fade" id="modalEditIjasah{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Ijasah Siswa</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/ijasah/{{ $dd->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{ $dd->id }}" name="id" required>
                            <div class="mb-2">
                                <label for="nis">NIS</label>
                                <input type="number" name="nis" class="form-control" value="{{ $dd->nis }}">
                            </div>
                            <div class="mb-2">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control" value="{{ $dd->nisn }}">
                            </div>
                            <div class="mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $dd->nama }}">
                            </div>
                            <div class="mb-2">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" class="form-control"
                                    value="{{ $dd->tmp_lahir }}">
                            </div>
                            <div class="mb-2">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control"
                                    value="{{ $dd->tgl_lahir }}">
                            </div>
                            <div class="mb-2">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" value="{{ $dd->nama_ibu }}">
                            </div>
                            <div class="mb-2">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" value="{{ $dd->jurusan }}">
                            </div>
                            <div class="mb-2">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="{{ $dd->kelas }}">
                            </div>
                            <div class="mb-2">
                                <label for="thn_lulus">Tahun Lulus</label>
                                <input type="number" name="thn_lulus" class="form-control"
                                    value="{{ $dd->thn_lulus }}">
                            </div>
                            <div class="mb-2">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <option <?php if ($dd->status == 'belum legalisir') {
                                        echo 'selected';
                                    } ?> value="belum legalisir">Belum Legalisir</option>
                                    <option <?php if ($dd->status == 'sudah legalisir') {
                                        echo 'selected';
                                    } ?> value="sudah legalisir">Sudah Legalisir</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pdf">PDF</label>
                                <input type="file" name="pdf" class="form-control">
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

    {{-- Modal Hapus --}}
    @foreach ($ijasah as $g)
        <div class="modal fade" id="modalHapusIjasah{{ $g->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/ijasah/{{ $g->id }}/destroy" method="get" enctype="multipart/form-data">
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
