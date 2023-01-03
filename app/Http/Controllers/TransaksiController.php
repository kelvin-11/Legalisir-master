<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Ijasah;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ts = Ijasah::findOrFail($id);
        $jasa = Jasa::all();
        return view('siswa.transaksi', compact('ts', 'jasa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Transaksi $id)
    {
        if(request('search')){
            $transaksi = Transaksi::where('mode_ambil', 'LIKE', '%'. request('search') .'%')
            ->orWhere('jml_cetak', 'LIKE', '%'. request('search') .'%')
            ->orWhere('status', 'LIKE', '%'. request('search') .'%')
            ->orWhere('created_at', 'LIKE', '%'. request('search') .'%')->paginate(5);
        }else{
            $transaksi = Transaksi::paginate(5);
        }
        return view('admin.transaksi', compact('transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'id' => $request->id,
            'ijasah_id' => $request->ijasah_id,
            'no_tlp' => $request->no_tlp,
            'jml_cetak' => $request->jml_cetak,
            'mode_ambil' => $request->mode_ambil,
            'ambil' => $request->ambil,
            'kirim' => $request->kirim,
            'ongkos' => $request->ongkos,
            'alamat' => $request->alamat,
            'No_Resi' => mt_rand(10000, 1000000)
        ]);
        $id = Transaksi::latest()->first();
        return redirect('/transaksi/show/' . $id->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, Ijasah $upload)
    {
        $pengiriman = Transaksi::where('id', $id)->get();
        return view('siswa.history', compact('pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function pesanan(Transaksi $transaksi,Request $request, $id)
    {
        $pesanan = Transaksi::findOrFail($id);
        $pesanan->update($request->all());
        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect('/transaksi-admin')->with('success', 'Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi-admin')->with('success', 'Data Berhasil Dihapus');
    }

    public function hargaJasa($id)
    {
        $jasa = Jasa::findOrFail($id);

        return response()->json([
            "data" => $jasa
        ]);
    }
}
