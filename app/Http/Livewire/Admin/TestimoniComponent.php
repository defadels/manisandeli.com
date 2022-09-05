<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileuploads;
use App\Models\Testimoni;
use Image;
use Storage;
use Str;

class TestimoniComponent extends Component
{   

    use WithFileUploads;

    public $statusUpdate = false;

    public $nama_konsumen, $foto_konsumen, $fotoUrl, $keterangan, $konsumen_id;

    public function render()
    {

        $daftar_testimoni = Testimoni::get();

        return view('livewire.admin.testimoni-component',compact('daftar_testimoni'))->layout('layout.admin_layout');
    }

    public function store(){
        $this->validate([
            'nama_konsumen'=> 'required|string',
            'keterangan' =>' required|string',
            'foto_konsumen' => 'required|mimes:png,jpg'
        ],
        [
            'nama_konsumen.required' => 'Nama konsumen wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi',
            'foto_konsumen.required' => 'Foto konsumen harus di upload',
            'foto_konsumen.mimes' => 'Foto konsumen harus berupa file gambar PNG atau JPG',
        ]);

        $testimoni = Testimoni::create([
            'nama_konsumen' => $this->nama_konsumen,
            'keterangan' => $this->keterangan
        ]);

        if($this->foto_konsumen){
            $nama_file = Str::uuid();
            $path = 'testimoni/';
            $file_extension = $this->foto_konsumen->extension();

            $testimoni->foto_konsumen = $path.$nama_file.'.'.$file_extension;

            $gambar = $this->foto_konsumen;
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(80,80, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$testimoni->foto_konsumen);

            $testimoni->save();
        }

        $this->resetInput();

        return redirect()->route('admin.pengaturan.testimoni')
        ->with('message', __('pesan.create', ['module' => $testimoni->nama_konsumen]));
    }

    public function update(){
        $this->validate([
            'nama_konsumen'=> 'required|string',
            'keterangan' =>' required|string'
        ],
        [
            'nama_konsumen.required' => 'Nama konsumen wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi'
        ]);

        $testimoni = Testimoni::find($this->testimoni_id);

        $testimoni->nama_konsumen = $this->nama_konsumen;
        $testimoni->keterangan = $this->keterangan;

        if($this->foto_konsumen){
            $foto_lama = $testimoni->foto_konsumen;

            $nama_file = Str::uuid();

            $path = 'testimoni/';

            $file_extension = $this->foto_konsumen->extension();
            $testimoni->foto_konsumen = $path.$nama_file.'.'.$file_extension;

            $gambar = $this->foto_konsumen;
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(80,80, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$testimoni->foto_konsumen);

            Storage::disk('public')->delete($foto_lama);

        }

        $testimoni->save();
        $this->resetInput();
        return redirect()->route('admin.pengaturan.testimoni')
        ->with('message', __('pesan.create', ['module' => $testimoni->nama_konsumen]));
    }

    public function getData($id){
        $testimoni = Testimoni::where('id', $id)->first();

        $this->testimoni_id = $testimoni->id;
        $this->nama_konsumen = $testimoni->nama_konsumen;
        $this->keterangan = $testimoni->keterangan;
        $this->fotoUrl = $testimoni->foto_konsumen;

        $this->statusUpdate = true;
    }

    public function resetInput(){
        $this->nama_konsumen = null;
        $this->keterangan = null;
        $this->foto_konsumen = null;
    }

    public function destroy($id){
        $testimoni = Testimoni::where('id', $id)->first();

        Storage::disk('public')->delete($testimoni->foto_konsumen);

        $testimoni->delete();
        
    }
}
