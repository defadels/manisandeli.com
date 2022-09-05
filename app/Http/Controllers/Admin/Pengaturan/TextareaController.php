<?php

namespace App\Http\Controllers\Admin\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Textarea;

class TextareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $daftar_textarea = Textarea::get();

        return view('admin.textarea.list', compact('daftar_textarea'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = 'admin.pengaturan.textarea.store';
        $button = 'Simpan';

        return view('admin.textarea.form', compact('url', 'button'));
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
            'judul' => ['required','string'],
            'konten' => ['required'],
        ];

        $messages = [
            'judul.required' => 'Judul harus diisi',
            'konten.required' => 'Konten harus diisi',

        ];


        $validator = Validator::make($input,$rules,$messages)->validate();

        $textarea = Textarea::create(
            [
                'judul' => $request->judul,
                'konten' => $request->konten,

            ]
        );

        return redirect()->route('admin.pengaturan.textarea')
        ->with('messages', __('pesan.create', ['module' => $textarea->judul]));
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
    public function edit(Textarea $textarea)
    {
        $url = 'admin.pengaturan.textarea.update';
        $button = 'Ubah';

        return view('admin.textarea.form', compact('textarea','url', 'button'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Textarea $textarea)
    {
        $input = $request->all();

        $rules = [
            'judul' => ['required','string'],
            'konten' => ['required'],
        ];

        $messages = [
            'judul.required' => 'Judul harus diisi',
            'konten.required' => 'Konten harus diisi',

        ];


        $validator = Validator::make($input,$rules,$messages)->validate();

        $textarea->judul = $request->judul;
        $textarea->konten = $request->konten;
        $textarea->save();

        return redirect()->route('admin.pengaturan.textarea')
        ->with('messages', __('pesan.update', ['module' => $textarea->judul]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Textarea $textarea)
    {
        try{
            $judul = $textarea->judul;

            $textarea->delete();

        }catch(Exception $e){
            return redirect()->route('admin.pengaturan.textarea')
            ->with('messages', __('pesan.error', ['module' => $judul]));
        }
            return redirect()->route('admin.pengaturan.textarea')
            ->with('messages', __('pesan.delete', ['module' => $judul]));
    }
}
