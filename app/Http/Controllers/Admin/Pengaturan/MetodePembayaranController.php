<?php

namespace App\Http\Controllers\Admin\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MetodePembayaranToko;
use Illuminate\Support\Facades\Validator;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, MetodePembayaranToko $daftar_pembayaran)
    {
        $q = $request->input('q');

        $daftar_pembayaran = $daftar_pembayaran->when($q, function($query) use ($q) {
            return $query->where('nama_bank', 'like', '%'.$q.'%')
                        ->orWhere('nomor_rekening', 'like', '%'.$q.'%');
        })->paginate(10);


        return view('admin.pengaturan.pembayaran.list', compact('q','request','daftar_pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $url = 'admin.pengaturan.pembayaran.store';
        $button = 'Simpan';
        
        $daftar_jenis = [

            'Bank' => 'Bank',
            'E-Wallet' => 'E-Wallet'
        ];

        return view('admin.pengaturan.pembayaran.form', compact('url','button', 'daftar_jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'nama_bank' => ['required','string'],
            'nama_pemilik' => ['string'],
            'nomor_rekening' => ['max:16'],
            'nomor_hp' => ['required', 'max:13'],
            'jenis' => ['required'],
        ];

        $messages = [
            'nama_bank.required' => 'Nama harus diisi',
            'nama_bank.string' => 'Nama harus berupa teks',
            'nama_pemilik.string' => 'Nama pemilik berusaa teks',
            'nomor_rekening.max' => 'Nomor rekening maksimal 16 digit',
            'nomor_hp.required' => ['Nomor handphone harus diisi'],
            'nomor_hp.max' => 'Nomor hp maksimal 13 digit',
            'jenis.requried' => 'Jenis pembayaran harus diisi', 
        ];


        $validator = Validator::make($input,$rules,$messages)->validate();

        $pembayaran = MetodePembayaranToko::create(
            [
                'nama_bank' => $request->nama_bank,
                'nama_pemilik' => $request->nama_pemilik,
                'deskripsi' => $request->deskripsi,
                'nomor_rekening' => $request->nomor_rekening,
                'nomor_hp' => $request->nomor_hp,
                'jenis' => $request->jenis,
                'status' => $request->status
            ]
        );

        return redirect()->route('admin.pengaturan.pembayaran')
        ->with('messages', __('pesan.update', ['module' => $pembayaran->nama_bank]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MetodePembayaranToko $pembayaran)
    {
        return view('admin.pengaturan.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MetodePembayaranToko $pembayaran)
    {
        $url = 'admin.pengaturan.pembayaran.update';

        $button = 'Simpan';
        
        $daftar_jenis = [
            'Bank' => 'Bank',
            'E-Wallet' => 'E-Wallet'
        ];

        return view('admin.pengaturan.pembayaran.form', compact('url','button', 'daftar_jenis', 'pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetodePembayaranToko $pembayaran)
    {
        $input = $request->all();

        $rules = [
            'nama_bank' => ['required','string'],
            'nama_pemilik' => ['string'],
            'nomor_rekening' => ['max:16'],
            'nomor_hp' => ['required', 'max:13'],
            'jenis' => ['required'],
        ];

        $messages = [
            'nama_bank.required' => 'Nama harus diisi',
            'nama_bank.string' => 'Nama harus berupa teks',
            'nama_pemilik.string' => 'Nama pemilik berusaa teks',
            'nomor_rekening.max' => 'Nomor rekening maksimal 16 digit',
            'nomor_hp.required' => ['Nomor handphone harus diisi'],
            'nomor_hp.max' => 'Nomor hp maksimal 13 digit',
            'jenis.requried' => 'Jenis pembayaran harus diisi', 
        ];


        $validator = Validator::make($input,$rules,$messages)->validate();

        $pembayaran->nama_bank = $request->nama_bank;
        $pembayaran->nama_pemilik = $request->nama_pemilik;
        $pembayaran->deskripsi = $request->deskripsi;
        $pembayaran->nomor_rekening = $request->nomor_rekening;
        $pembayaran->nomor_hp = $request->nomor_hp;
        $pembayaran->jenis = $request->jenis;

        $pembayaran->save();

        return redirect()->route('admin.pengaturan.pembayaran')
        ->with('messages', __('pesan.create', ['module' => $pembayaran->nama_bank]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetodePembayaranToko $pembayaran)
    {
        try {  

            $nama_bank = $pembayaran->nama_bank;

            $pembayaran->delete();

        } 
        catch(Exception $e){
            return redirect()->route('admin.pengaturan.pembayaran')
            ->with('messages', __('pesan.delete', ['module' => $nama_bank]));
        }
            return redirect()->route('admin.pengaturan.pembayaran')
            ->with('messages', __('pesan.delete', ['module' => $nama_bank]));
    }
}
