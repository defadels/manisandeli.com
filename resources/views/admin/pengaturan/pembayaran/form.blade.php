@extends('layout.admin_layout')

@section('title','Form Tambah Produk')

@section('style')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Pengaturan</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Metode Pembayaran</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="mb-2">
        @if(isset($pembayaran))
        <a data-toggle="modal" data-target="#exampleModal1" class="btn btn-md btn-danger">Hapus Pembayaran</a>
        @endif
    </div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Form Tambah Metode Pembayaran</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route($url, $pembayaran->id ?? '') }}" method="POST">
            @csrf
                @if(isset($pembayaran))
                    @method('put')
                @endif

            

                <div class="form-group">
                    <label for="jenis">Jenis Pembayaran</label>
                    <select name="jenis" class="form-control  @error('jenis') {{ 'is-invalid' }} @enderror" id="">
                        @foreach($daftar_jenis as $jenis)
                            <option value="{{ $jenis }}" @if($pembayaran->jenis == $jenis) {{ 'selected' }} @endif>{{ $jenis }}</option>
                        @endforeach
                    </select>
                        @error('jenis')'
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Bank/E-Wallet/Lokasi COD</label>
                    <input type="text" class="form-control @error('nama') {{'is-invalid'}} @enderror" name="nama" value="{{old('nama') ??  $pembayaran->nama ?? '' }}">
                        @error('nama')'
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    
                    <textarea name="deskripsi" class="form-control @error('deskripsi') {{'is-invalid'}} @enderror" id="" cols="30" rows="10">{{ old('deskripsi') ?? $pembayaran->deskripsi ?? '' }}</textarea>

                    @error('deskripsi')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik / Atas Nama</label>
                    <input type="text" class="form-control @error('nama_pemilik') {{'is-invalid'}} @enderror" name="nama_pemilik" value="{{old('nama_pemilik') ??  $pembayaran->nama_pemilik ?? '' }}">
                        @error('nama_pemilik')'
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_rekening">Nomor Rekening</label>
                    <input type="text" class="form-control @error('nomor_rekening') {{'is-invalid'}} @enderror" name="nomor_rekening" value="{{ old('nomor_rekening') ?? $pembayaran->nomor_rekening ?? '' }}">
                
                    @error('nomor_rekening')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nomor_hp">Nomor Handphone</label>
                    <input type="text" class="form-control @error('nomor_hp') {{'is-invalid'}} @enderror" name="nomor_hp" value="{{ old('nomor_hp') ?? $pembayaran->nomor_hp ?? '' }}">
                
                    @error('nomor_hp')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


            <div class="form-group mb-2">
                    <label for="status">Status</label>
                </div>    
                <div class="form-check form-check-inline">
                    <input type="radio" value="Aktif" name="status" class="form-check-input" id="Aktif" @if((old('status') ?? $pembayaran->status ?? '') == 'Aktif') checked @endif>
                    <label for="Aktif" class="form-check-label">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" value="Nonaktif" name="status" class="form-check-input" id="Nonaktif" @if((old('status') ?? $pembayaran->status ?? '') == 'Nonaktif') checked @endif>
                    <label for="Nonaktif" class="form-check-label">Nonaktif</label>
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



@if(isset($pembayaran))
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin untuk menghapus data?</div>

            <form action="{{ route('admin.pengaturan.pembayaran.destroy', $pembayaran->id ?? '') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
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