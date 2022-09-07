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

    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Produk {{ $produk->nama_produk }} </h4>
                </div>
            </div>
        </div>
        <div class="card-body">

                @if(isset($produk->foto_produk))
                <div class="form-group">
                    <img src="{{ Storage::url($produk->foto_produk) }}" alt="" class="thumbnail">
                </div>
                @endif


                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    
                    <p>{{ $produk->kode_produk }}</p>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    
                    <p>{{ $produk->nama_produk }}</p>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    
                    <p>{{ $produk->deskripsi }}</p>
                </div>

                <div class="form-group">
                    <label for="harga_pokok">Harga Pokok</label>
          
                    <p>{{ $produk->harga_pokok }}</p>
                </div>
                
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                   
                    <p>{{ $produk->harga_jual }}</p>
                </div>

                <div class="form-group">
                    <label for="konten">Konten Produk</label>
                    
                    <div class="bg-dark text-white radius-15 p-3 mb-2">
                        
                        <p>{!! $produk->konten !!}</p>
                    </div>
                </div>


            <div class="form-group mb-4">
                    <label for="status">Status</label>
                    <br>
                    {{-- <h4><span class="badge @if($produk->status == 'aktif') {{'badge-primary'}} @else {{ 'badge-danger '}} @endif ">{{ ucfirst($produk->status) }}</span></h4> --}}
                    <a href="#" class="btn btn-sm @if($produk->status == 'aktif') {{'btn-light-success'}} @else {{ 'btn-light-danger '}} @endif">{{ ucfirst($produk->status) }}</a>
                </div>    
            
                <button type="button" onclick="window.history.back()" class="btn btn-md btn-secondary mt-4">Kembali</button>
          
            
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