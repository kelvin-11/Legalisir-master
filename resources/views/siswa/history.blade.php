@extends('layout.user')

@section('user')
    <div class="container">
        @foreach ($pengiriman as $p)
            @if ($p->mode_ambil == 'kirim')
                {{-- dHistory Dikirm --}}
                <div class="row align-items-center" style="height: 100vh;">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="row mt-3">
                                <div class="col-lg-2">
                                    <img src="/assets/images/logo.png" alt="" class="ms-5" width="110vh" height="110vh">
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
                                    <img src="/assets/images/logoP.png" alt="" class="me-5" width="110vh" height="110vh">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-lg-6" style="margin-left: 20vh;">
                                    <div class=" mb-3">
                                        <h5><b>No Resi : {{ $p->No_Resi }}</b></h5>
                                        <h6 class="text-danger">(Simpan No Transaksi)</h6>
                                        <h5><b>Alamat : {{ $p->alamat }}</b></h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ms-5 mb-3">
                                        @if ($p->status == 'dikirim')
                                            <h5><b>Legalisir Dikirim Pada :
                                                </b>{{ date('d-m-Y', strtotime($p->updated_at)) }}</h5>
                                        @elseif ($p->status == 'terdistribusi')
                                            <h5><b>Legalisir Terdisribusi Pada :
                                                </b>{{ date('d-m-Y', strtotime($p->updated_at)) }}</h5>
                                        @elseif ($p->status == 'proses')
                                            <h5><i>Legalisir Anda Sedang Diproses Silahkan Tunggu Informasi Lebih
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
                                                <th>Biaya P</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>{{ $p->ijasah->nama }}</th>
                                                <th>{{ $p->jml_cetak }}</th>
                                                <th>Rp. {{ number_format($p->ongkos) }}</th>
                                                <th>{{ $p->status }}</th>
                                                <th><button class="btn btn-success" data-toggle="modal"
                                                        data-target="#KonfirmasiModal"><b>Konfirmasi</b></button></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Konfirmasi --}}
                <form action="/pesanan/{{ $p->id }}" method="post">
                    @csrf
                    <div class="modal fade" id="KonfirmasiModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">
                                        Konfirmasi
                                        Pesanan</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{ $p->id }}">
                                <input type="hidden" name="status" value="terdistribusi">
                                <div class="modal-body">Konfirmasi Barang Telah Diterima
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit"
                                        @if ($p->status == 'terdistribusi') disabled @endif>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @elseif ($p->mode_ambil == 'ambil')
                {{-- History Diambil --}}
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-lg-2">
                                            <img src="/assets/images/logo.png" alt="" class="ms-5" width="110vh" height="110vh">
                                        </div>
                                        <div class="col-lg-8">
                                            <h2><b>SMKN 1 JENANGAN</b></h2>
                                            <h4>JL.Niken Gandini NO.98</h4>
                                            <h4>Plampitan, Kec.Jenangan, Kab.Ponorogo, Prov.Jawa Timur</h4>
                                            <h4>Telp. (0352) 481236</h4>
                                        </div>
                                        <div class="col-lg-2">
                                            <img src="/assets/images/logoP.png" alt="" class="me-5" width="110vh" height="110vh">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h4 style="margin-left: 142vh">
                                            Ponorogo,{{ date('d-m-Y', strtotime($p->updated_at)) }}</h4>
                                        <div class="row mt-3">
                                            <div class="col-lg-6" style="margin-left: 24vh;"> 
                                                <h4><b>Nomor : {{ $p->No_Resi }}</b></h4>
                                                <h6 class="text-danger">(Simpan No Transaksi)</h6>
                                                <h4><b>Nama Penerima : </b>{{ $p->ijasah->nama }}</h4>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4><b>Status : </b> {{ $p->status }}</h4>
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#KonfirmasiModal"><b>Konfirmasi</b></button>
                                            </div>
                                            <div class="text-center mt-4">
                                                @if ($p->status == 'diambil')
                                                    <h4><b>Legalisir Dapat Diambil Pada
                                                            :</b>{{ date('d-m-Y', strtotime($p->updated_at)) }}</h4>
                                                @elseif ($p->status == 'terdistribusi')
                                                    <h4><b>Legalisir Anda Telah Terdisribusi Pada
                                                            :</b>{{ date('d-m-Y', strtotime($p->updated_at)) }}</h4>
                                                @elseif ($p->status == 'proses')
                                                    <h4><b>Legalisir Anda Sedang Diproses Silahkan Tunggu Informasi
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
                {{-- Modal Konfirmasi --}}
                <form action="/pesanan/{{ $p->id }}" method="post">
                    @csrf
                    <div class="modal fade" id="KonfirmasiModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Konfirmasi
                                        Pesanan</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{ $p->id }}">
                                <input type="hidden" name="status" value="terdistribusi">
                                <div class="modal-body">Konfirmasi Barang Telah Diterima</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit"
                                        @if ($p->status == 'terdistribusi') disabled @endif>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        @endforeach
    </div>
@endsection
