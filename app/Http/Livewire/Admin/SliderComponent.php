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

    public $fotoUrl, $judul, $deskripsi, $url, $foto, $slider_id;

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

    public function getData($id){
        $slider = Slider::where('id', $id)->first();

        $this->slider_id = $slider->id;
        $this->judul = $slider->judul;
        $this->deskripsi = $slider->deskripsi;
        $this->url = $slider->url;
        $this->fotoUrl = $slider->foto;

        $this->statusUpdate = true;
        $this->dispatchBrowserEvent('show-modal');

    }

    public function updateData(){

        $this->validate([
            'judul' => 'required|string',
            'url' => 'required|string',
            'deskripsi' => 'required|string',
        ],
        [
            'judul.required' => 'Nama toko harus diisi',
            'judul.string' => 'Nama toko harus diinput dengan string',
            'url.required' => 'URL tombol harus diisi',
            'url.string' => 'URL tombol harus diinput dengan string',
        ]);

        $slider = Slider::find($this->slider_id);

        $slider->judul = $this->judul;
        $slider->deskripsi = $this->deskripsi;
        $slider->url = $this->url;

        if($this->foto){
            $foto_lama = $this->foto;

            $nama_file = Str::uuid();

            $path ='slider/';
            $file_extension = $this->foto->extension();
            $slider->foto = $path.$nama_file.".".$file_extension;

            $gambar = $this->foto;
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(450, 450, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$slider->foto);

            Storage::disk('public')->delete($foto_lama);
        }

        $slider->save();
        $this->resetInput();
        return redirect()->route('admin.pengaturan.slider')
        ->with('message', __('pesan.create', ['module' => $slider->judul]));

    }


    public function deleteData(){
        try{
            $slider = Slider::find($this->slider_id);

            Storage::disk('public')->delete($slider->foto);

            $slider->delete();

        }catch(Exception $e){
            return redirect()->route('admin.pengaturan.slider')
            ->with('message', __('pesan.delete', ['module' => $slider->judul]));
        }
            return redirect()->route('admin.pengaturan.slider')
            ->with('message', __('pesan.delete', ['module' => $slider->judul]));
    }

    public function resetInput(){
        $this->judul= null;
        $this->foto = null;
        $this->url = null;
        $this->deskripsi = null;
    }
}
