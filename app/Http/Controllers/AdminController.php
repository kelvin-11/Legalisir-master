<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Ijasah;
use App\Models\Jasa;
use App\Models\Pengambilan;
use App\Models\Pengiriman;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = User::count();
        $ijasah = Ijasah::count();
        $transaksi = Transaksi::count();
        $jasa   = Jasa::count();

        $date = date('d-m-Y');

        // $ijasah_thn    = Ijasah::where('created_at', '=', $date)->count();
        $transaksi_tdy = Transaksi::where('created_at', '=', $date)->count();

        $t_jan      = Transaksi::whereMonth('created_at', '01')->count();
        $t_feb      = Transaksi::whereMonth('created_at', '02')->count();
        $t_mar      = Transaksi::whereMonth('created_at', '03')->count();
        $t_apr      = Transaksi::whereMonth('created_at', '04')->count();
        $t_mei      = Transaksi::whereMonth('created_at', '05')->count();
        $t_jun      = Transaksi::whereMonth('created_at', '06')->count();
        $t_jul      = Transaksi::whereMonth('created_at', '07')->count();
        $t_agu      = Transaksi::whereMonth('created_at', '08')->count();
        $t_sep      = Transaksi::whereMonth('created_at', '09')->count();
        $t_okt      = Transaksi::whereMonth('created_at', '10')->count();
        $t_nov      = Transaksi::whereMonth('created_at', '11')->count();
        $t_des      = Transaksi::whereMonth('created_at', '12')->count();

        return view('admin.index', compact('user', 'ijasah', 'transaksi', 'jasa', 'transaksi_tdy',
        't_jan',  
        't_feb',
        't_mar',
        't_apr',
        't_mei',
        't_jun',
        't_jul',
        't_agu',
        't_sep',
        't_okt',
        't_nov',
        't_des'));
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
