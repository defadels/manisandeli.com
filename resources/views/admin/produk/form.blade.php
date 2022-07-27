@extends('layout.admin_layout')

@section('title','Form Tambah Produk')

@section('style')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Produk</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="mb-2">
        @if(isset($produk))
        <a href="{{ route('admin.produk.destroy', $produk->id) }}" class="btn btn-md btn-danger">Hapus Produk</a>
        @endif
    </div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Form Tambah Produk</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route($url, $produk->id ?? '') }}" method="POST">
            @csrf
                @if(isset($produk))
                    @method('put')
                @endif

                <div class="form-group">
                        
                        <label for="foto_produk">Foto Produk</label>
                        <input type="file" class="form-control" name="foto_produk" value="{{old('foto_produk')}} ?? ''">
                        @error('foto_produk')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" class="form-control @error('kode_produk') {{'is-invalid'}} @enderror" name="kode_produk" value="{{old('kode_produk') ??  $produk->kode_produk ?? '' }}">
                        @error('kode_produk')'
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control @error('nama') {{'is-invalid'}} @enderror" name="nama" value="{{old('nama') ??  $produk->nama ?? '' }}">
                        @error('nama')'
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') {{'is-invalid'}} @enderror" name="deskripsi" value="{{ old('deskripsi') ?? $produk->deskripsi ?? '' }}">
                
                    @error('deskripsi')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga_pokok">Harga Pokok</label>
                    <input type="number" class="form-control @error('harga_pokok') {{'is-invalid'}} @enderror" name="harga_pokok" value="{{ old('harga_pokok') ?? $produk->harga_pokok ?? '' }}">
                
                    @error('harga_pokok')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="number" class="form-control @error('harga_jual') {{'is-invalid'}} @enderror" name="harga_jual" value="{{ old('harga_jual') ?? $produk->harga_jual ?? '' }}">
                
                    @error('harga_jual')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="konten">Konten Produk</label>
                    <textarea name="konten" id="summernote">{!! old('konten') ?? $produk->konten ?? '' !!}</textarea>
                </div>


            <div class="form-group mb-2">
                    <label for="status">Status</label>
                </div>    
                <div class="form-check form-check-inline">
                    <input type="radio" value="aktif" name="status" class="form-check-input" id="aktif" @if((old('status') ?? $produk->status ?? '') == 'aktif') checked @endif>
                    <label for="aktif" class="form-check-label">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" value="nonaktif" name="status" class="form-check-input" id="nonaktif" @if((old('status') ?? $produk->status ?? '') == 'nonaktif') checked @endif>
                    <label for="nonaktif" class="form-check-label">Nonaktif</label>
                </div>

                <div>
                    @error('status')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            
                <div class="form-group mt-2">
                    <button type="button" onclick="window.history.back()" class="btn btn-md btn-secondary">Back</button>
                    <button type="submit" class="btn btn-primary btn-md">{{$button}}</button>
                </div>
            
            
            </form>
            
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{asset('/assets-admin/plugins/input-tags/js/tagsinput.js') }}"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

	<script>
      $('#summernote').summernote({
        placeholder: 'Isi konten produk',
        tabsize: 2,
        height: 400
      });
    </script>
@endsection