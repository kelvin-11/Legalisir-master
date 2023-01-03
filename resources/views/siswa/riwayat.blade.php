@extends('layout.user')

@section('user')
    <div class="container">
        @if ($pengiriman->mode_ambil == 'kirim')
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
                                    <h3><b>SMKN 1 JENANGAN</b></h3>
                                    <h5>JL.Niken Gandini NO.98</h5>
                                    <h5>Plampitan, Kec.Jenangan, Kab.Ponorogo, Prov.Jawa Timur</h5>
                                    <h5>Telp. (0352) 481236</h5>
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
                                    <h6><b>No Resi : {{ $pengiriman->No_Resi }}</b></h6>
                                    <h6><b>Alamat : {{ $pengiriman->alamat }}</b></h6>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ms-5 mb-3">
                                    @if ($pengiriman->status == 'dikirim')
                                        <h6><b>Legalisir Dikirim Pada :
                                            </b>{{ date('d-m-Y', strtotime($pengiriman->updated_at)) }}</h6>
                                    @elseif ($pengiriman->status == 'terdistribusi')
                                        <h6><b>Legalisir Terdisribusi Pada :
                                            </b>{{ date('d-m-Y', strtotime($pengiriman->updated_at)) }}</h6>
                                    @elseif ($pengiriman->status == 'proses')
                                        <h6><i>Legalisir Anda Sedang Diproses Silahkan Tunggu Informasi Lebih
                                                Lanjut...!</i></h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover text-center">
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
                                            <th>{{ $pengiriman->ijasah->nama }}</th>
                                            <th>{{ $pengiriman->jml_cetak }}</th>
                                            <th>Rp. {{ number_format($pengiriman->ongkos) }}</th>
                                            <th>{{ $pengiriman->status }}</th>
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
            <form action="/pesanan/{{ $pengiriman->id }}" method="post">
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
                            <input type="hidden" name="id" value="{{ $pengiriman->id }}">
                            <input type="hidden" name="status" value="terdistribusi">
                            <div class="modal-body">Konfirmasi Barang Telah Diterima
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit"
                                    @if ($pengiriman->status == 'terdistribusi') disabled @endif>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @elseif ($pengiriman->mode_ambil == 'ambil')
            {{-- History Diambil --}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-lg-2">
                                        <img src="/assets/images/logo.png" alt="" class="ms-5" width="110vh" height="110vh">
                                    </div>
                                    <div class="col-lg-8">
                                        <h3><b>SMKN 1 JENANGAN</b></h3>
                                        <h5>JL.Niken Gandini NO.98</h5>
                                        <h5>Plampitan, Kec.Jenangan, Kab.Ponorogo, Prov.Jawa Timur</h5>
                                        <h5>Telp. (0352) 481236</h5>
                                    </div>
                                    <div class="col-lg-2">
                                        <img src="/assets/images/logoP.png" alt="" class="me-5" width="110vh" height="110vh">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h4 style="margin-left: 122vh">
                                        Ponorogo,{{ date('d-m-Y', strtotime($pengiriman->updated_at)) }}</h4>
                                    <div class="row mt-3">
                                        <div class="col-lg-6" style="margin-left: 24vh;">
                                            <h5><b>Nomor : </b>{{ $pengiriman->No_Resi }}</h5>
                                            <h5><b>Nama Penerima : </b>{{ $pengiriman->ijasah->nama }}</h5>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5><b>Status : </b> {{ $pengiriman->status }}</h5>
                                            <button class="btn btn-success" data-toggle="modal"
                                                data-target="#KonfirmasiModal"><b>Konfirmasi</b></button>
                                        </div>
                                        <div class="text-center mt-4">
                                            @if ($pengiriman->status == 'diambil')
                                                <h4><b>Legalisir Dapat Diambil Pada
                                                        :</b>{{ date('d-m-Y', strtotime($pengiriman->updated_at)) }}</h4>
                                            @elseif ($pengiriman->status == 'terdistribusi')
                                                <h4><b>Legalisir Anda Telah Terdisribusi Pada
                                                        :</b>{{ date('d-m-Y', strtotime($pengiriman->updated_at)) }}</h4>
                                            @elseif ($pengiriman->status == 'proses')
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
            <form action="/pesanan/{{ $pengiriman->id }}" method="post">
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
                            <input type="hidden" name="id" value="{{ $pengiriman->id }}">
                            <input type="hidden" name="status" value="terdistribusi">
                            <div class="modal-body">Konfirmasi Barang Telah Diterima</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit"
                                    @if ($pengiriman->status == 'terdistribusi') disabled @endif>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
