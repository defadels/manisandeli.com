<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Produk $daftar_produk)
    {

        $q = $request->input('q');

        $daftar_produk = $daftar_produk->when($q, function($query) use ($q) {
            return $query->where('nama', 'like', '%'.$q.'%')
                        ->orWhere('kode_produk', 'like', '%'.$q.'%');
        })->paginate(10);

        return view('admin.produk.list', compact('daftar_produk', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = 'admin.produk.store';
        $button = 'Simpan';

        return view('admin.produk.form', compact('url', 'button'));
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
            'nama' => ['required', 'max:255'],
            'kode_produk' => ['required'],
            'foto_produk' => ['mimes:jpeg,jpg,png','max:10240'],
            'harga_pokok' => ['required','numeric'], 
            'harga_jual' => ['required','numeric'] 
        ];

        $messages = [
            'nama.required' => 'Nama produk harus diisi',
            'nama.max' => 'Nama harus maksimal 255 karakter',
            'foto_produk.mimes' => 'Foto harus berupa file jpeg, jpg dan png',
            'foto_produk.size' => 'Foto maksimal ukuran 1 MB',
            'harga_jual.required' => 'Harga jual harus diisi',
            'harga_jual.numeric' => 'Harga jual harus diisi angka',
            'harga_pokok.required' => 'Harga pokok harus diisi',
            'harga_pokok.numeric' => 'Harga pokok harus diisi angka',
        ];

        $validator = Validator::make($input, $rules, $messages)->validate();

        $produk = Produk::create(
            [
                'nama' => $request->nama,
                'kode_produk' => $request->kode_produk,
                'deskripsi' => $request->deskripsi,
                'harga_jual' => $request->harga_jual,
                'harga_pokok' => $request->harga_pokok,
                'konten' => $request->konten,
                'status' => $request->status,
            ]
        );

        if($request->hasFile('foto_produk')) {
            $nama_file = Str::uuid();

            $path = 'produk/foto/';
            $file_extension = $request->foto_produk->extension();
            $produk->foto_produk = $path.$nama_file.".".$file_extension;
            
            $gambar = $request->file('foto_produk');
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(450, 450, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$produk->foto_produk);

            $produk->save();
    
        }

        dd($produk);

        return redirect()->route('admin.produk')
        ->with('messages', __('pesan.create', ['module' => $request->input('nama')]));
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
