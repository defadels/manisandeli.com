<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SliderComponent extends Component
{
    public $statusUpdate = false;

    public $fotoUrl, $judul, $deskripsi, $url, $foto;

    use WithFileUploads;
    
    public function render()
    {
        $daftar_slider = Slider::get();

        return view('livewire.admin.slider-component',compact('daftar_slider'))->layout('layout.admin_layout');
    }

    public function tambahData(){
        $this->validate([
            'judul' => 'required|string',
            'url' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'mimes:jpeg,png'
        ],
        [
            'judul.required' => 'Nama toko harus diisi',
            'judul.string' => 'Nama toko harus diinput dengan string',
            'url.required' => 'URL tombol harus diisi',
            'url.string' => 'URL tombol harus diinput dengan string',
            'foto.mimes' => 'Foto harus berupa gambar jpeg atau png'
        ]);

        $slider = Slider::create([
            'foto' => $this->foto,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'url' => $this->url
        ]);

        if($this->foto){
            $nama_file = Str::uuid();

            $path ='slider/';
            $file_extension = $this->foto->extension();
            $slider->foto = $path.$nama_file.".".$file_extension;

            $gambar = $this->foto;
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(580, 520, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$slider->foto);

            $slider->save();
        }

        $this->resetInput();
        return redirect()->route('admin.pengaturan.slider')
        ->with('message', __('pesan.create', ['module' => $slider->judul]));
    }

    public function resetInput(){
        $this->judul= null;
        $this->foto = null;
        $this->url = null;
        $this->deskripsi = null;
    }
}
