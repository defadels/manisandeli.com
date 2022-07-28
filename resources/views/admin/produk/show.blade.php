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
                    <h4>Produk {{ $produk->nama }} </h4>
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
                    {{-- <input type="text" class="form-control @error('kode_produk') {{'is-invalid'}} @enderror" name="kode_produk" value="{{old('kode_produk') ??  $produk->kode_produk ?? '' }}"> --}}
                    <p>{{ $produk->kode_produk }}</p>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    {{-- <input type="text" class="form-control @error('nama') {{'is-invalid'}} @enderror" name="nama" value="{{old('nama') ??  $produk->nama ?? '' }}"> --}}
                    <p>{{ $produk->nama }}</p>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    {{-- <input type="text" class="form-control @error('deskripsi') {{'is-invalid'}} @enderror" name="deskripsi" value="{{ old('deskripsi') ?? $produk->deskripsi ?? '' }}"> --}}
                    <p>{{ $produk->deskripsi }}</p>
                </div>

                <div class="form-group">
                    <label for="harga_pokok">Harga Pokok</label>
                    {{-- <input type="number" class="form-control @error('harga_pokok') {{'is-invalid'}} @enderror" name="harga_pokok" value="{{ old('harga_pokok') ?? $produk->harga_pokok ?? '' }}"> --}}
                    <p>{{ $produk->harga_pokok }}</p>
                </div>
                
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    {{-- <input type="number" class="form-control @error('harga_jual') {{'is-invalid'}} @enderror" name="harga_jual" value="{{ old('harga_jual') ?? $produk->harga_jual ?? '' }}"> --}}
                    <p>{{ $produk->harga_jual }}</p>
                </div>

                <div class="form-group">
                    <label for="konten">Konten Produk</label>
                    {{-- <textarea name="konten" id="summernote">{!! old('konten') ?? $produk->konten ?? '' !!}</textarea> --}}
                    <div class="bg-dark text-white radius-15 p-3 mb-2">
                        
                        <p>{!! $produk->konten !!}</p>
                    </div>
                </div>


            <div class="form-group mb-2">
                    <label for="status">Status</label>
                    <br>
                    <h4><span class="badge @if($produk->status == 'aktif') {{'badge-primary'}} @else {{ 'badge-danger '}} @endif ">{{ ucfirst($produk->status) }}</span></h4>
                </div>    
            
                <button type="button" onclick="window.history.back()" class="btn btn-md btn-secondary">Back</button>
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