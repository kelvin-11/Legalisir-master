<?php

namespace App\Http\Controllers;

use App\Models\Ijasah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IjasahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('search')){
            $ijasah = Ijasah::where('nis', 'LIKE', '%'. request('search') .'%')
            ->orWhere('nisn', 'LIKE', '%'. request('search') .'%')
            ->orWhere('nama', 'LIKE', '%'. request('search') .'%')
            ->orWhere('jurusan', 'LIKE', '%'. request('search') .'%')
            ->orWhere('thn_lulus', 'LIKE', '%'. request('search') .'%')
            ->orWhere('status', 'LIKE', '%'. request('search') .'%')->paginate(5);
        }else{
            $ijasah = Ijasah::paginate(5);
        }
        return view('admin.ijasah', compact('ijasah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('pdf');
        // $file_ext = $file->getClientOriginalExtension();
        // $file_name = rand(123456, 9999999) . '.' . $file_ext;
        // $path = public_path('/files');
        // $file->move($path, $file_name);
        // $file = new Ijasah;
        // Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        if($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $path = time(). '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' .$path,file_get_contents($file));
        Ijasah::create([
            'id'    => $request->id,
            'nis'    => $request->nis,
            'nisn'    => $request->nisn,
            'nama'    => $request->nama,
            'tmp_lahir'    => $request->tmp_lahir,
            'tgl_lahir'    => $request->tgl_lahir,
            'nama_ibu'    => $request->nama_ibu,
            'jurusan'    => $request->jurusan,
            'kelas'    => $request->kelas,
            'thn_lulus'    => $request->thn_lulus,
            'status'    => $request->status,
            'pdf' => $path
        ]);
    } else {
        Ijasah::create([
            'id'    => $request->id,
            'nis'    => $request->nis,
            'nisn'    => $request->nisn,
            'nama'    => $request->nama,
            'tmp_lahir'    => $request->tmp_lahir,
            'tgl_lahir'    => $request->tgl_lahir,
            'nama_ibu'    => $request->nama_ibu,
            'jurusan'    => $request->jurusan,
            'kelas'    => $request->kelas,
            'thn_lulus'    => $request->thn_lulus,
            'status'    => $request->status,
        ]);
    }
        return redirect('/ijasah')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ijasah  $ijasah
     * @return \Illuminate\Http\Response
     */
    public function show(Ijasah $ijasah, $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ijasah  $ijasah
     * @return \Illuminate\Http\Response
     */
    public function upload(Ijasah $file, Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ijasah  $ijasah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Ijasah $file)
    {
        $ijasah         = Ijasah::findOrFail($id);
        $file_name      = $file->pdf;
        $path           = public_path('storage' . $file_name);

        if ($request->hasFile('pdf')) {
            // unlink($path);

            //Upload New PDF
        $pdf = $request->file('pdf');
        $file_ext = $pdf->getClientOriginalExtension();
        $file_name = rand(123456, 9999999) . '.' . $file_ext;
        $path = public_path('storage');
        $request->pdf->move($path, $file_name);

        $ijasah->pdf = $file_name;
        // $pdf->storeAs('public/', $pdf->hashName());
        // $pdf->storeAs('public/' . $pdf, file_get_contents($file));
        //Delete PDF
        // Storage::delete('public/' . $pdf, file_get_contents($file));;
            $ijasah->nis    = $request->nis;
            $ijasah->nisn   = $request->nisn;
            $ijasah->nama   = $request->nama;
            $ijasah->tmp_lahir = $request->tmp_lahir;
            $ijasah->tgl_lahir = $request->tgl_lahir;
            $ijasah->nama_ibu  = $request->nama_ibu;
            $ijasah->jurusan   = $request->jurusan;
            $ijasah->kelas     = $request->kelas;
            $ijasah->thn_lulus = $request->thn_lulus;
            $ijasah->status    = $request->status;
            // $ijasah->pdf       = $request->file('pdf');
            $ijasah->save();
        } else {
            // $ijasah         = Ijasah::findOrFail($id);
            $ijasah->nis    = $request->nis;
            $ijasah->nisn   = $request->nisn;
            $ijasah->nama   = $request->nama;
            $ijasah->tmp_lahir = $request->tmp_lahir;
            $ijasah->tgl_lahir = $request->tgl_lahir;
            $ijasah->nama_ibu  = $request->nama_ibu;
            $ijasah->jurusan   = $request->jurusan;
            $ijasah->kelas     = $request->kelas;
            $ijasah->thn_lulus = $request->thn_lulus;
            $ijasah->status    = $request->status;
            $ijasah->save();
        }
        return redirect('/ijasah')->with('success', 'Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ijasah  $ijasah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijasah = Ijasah::find($id);
        $ijasah->delete();
        return redirect('/ijasah')->with('success', 'Data Berhasil Dihapus');
    }
}
