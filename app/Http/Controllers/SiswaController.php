<?php

namespace App\Http\Controllers;


use App\Models\Ijasah;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function find(Request $req, Ijasah $upload)
    {
        $siswa = Ijasah::where('nisn', $req->nisn)->where('nama_ibu', $req->nama_ibu)->first();
        $url = Storage::url($siswa->pdf);
        if (!$siswa && !$url) {
            return redirect('/home');
        } else {
            return view('siswa.datasiswa', compact('siswa', 'url'));
        }
        // return $this->displayData($siswa);
    }

    // public function displayData(Ijasah $siswa)
    // {
    //     $url = Storage::url($siswa->pdf);
    //     if (!$siswa && !$url) {
    //         return redirect('/home');
    //     } else {
    //         return view('siswa.datasiswa', compact('siswa', 'url'));
    //     }
    // }

    public function update(Request $request, $id,  Ijasah $file)
    {
        $ijasah         = Ijasah::findOrFail($id);
        $file_name      = $file->pdf;
        $path           = public_path('storage' . $file_name);
        // unlink($path);

        //Upload New PDF
        try {
            $pdf = $request->file('pdf');
            $file_ext = $pdf->getClientOriginalExtension();
            $file_name = rand(123456, 9999999) . '.' . $file_ext;
            $path = public_path('storage');
            $request->pdf->move($path, $file_name);

            $ijasah->pdf = $file_name;
            $ijasah->save();
            return redirect('/home');
            // return $this->displayData($ijasah)->with('success', 'Upload Succes');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ijasah  $Ijasah
     * @return \Illuminate\Http\Response
     */
    public function history(Request $req)
    {
        $pengiriman = Transaksi::where('ijasah_id', $req->ijasah_id)->where('No_Resi', $req->No_Resi)->first();
        if($pengiriman){
            return $this->tampil($pengiriman);
        }else{
            return redirect('/home');
        }
    }
    
    public function tampil(Transaksi $pengiriman)
    {
        return view('siswa.riwayat',compact('pengiriman'));
    }
    
}
