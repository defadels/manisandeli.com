<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $daftar_pelanggan = User::where('roles', 'pelanggan')->get();

        $orderan_sampai = Order::where('status', 'selesai')->get();

        $orderan_batal = Order::where('status', 'batal')->get();

        $karyawan = User::where('roles', 'pelanggan')->get();

        $daftar_orderan = Order::orderBy('created_at', 'DESC')->get();

        $pelanggan_baru = User::where('roles','pelanggan')->orderBy('created_at', 'DESC')->get();

        return view('admin.dashboard', compact('daftar_pelanggan', 'orderan_sampai', 'orderan_batal', 'karyawan', 'daftar_orderan', 'pelanggan_baru'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
