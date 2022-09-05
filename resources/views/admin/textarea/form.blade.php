@extends('layout.admin_layout')

@section('title', 'Form Textarea')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Profil Toko</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Textarea</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>

    <div class="mb-2">
        @if(isset($textarea))
        <a data-toggle="modal" data-target="#exampleModal1" class="btn btn-md btn-danger"><i class="lni lni-trash"></i> Hapus Textarea</a>
        @endif
    </div>
<div class="card radius-15">

    <form method="POST" action="{{ route($url, $textarea->id ?? '') }}" >
        @csrf

        @if(isset($textarea))
            @method('put')
        @endif

    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h5>Judul Textarea</h5> 
            </div>
        </div>
    </div>
    <div class="card-body">

       <div class="form-group">
        <input type="text" placeholder="Masukkan judul textarea" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') ?? $textarea->judul ?? '' }}"> 
        
        @error('judul')
            <span class="text-danger">
                <strong>{{$message}}</strong>
            </span>

        @enderror
        
        </div>    
    </div>
</div>

<div class="card radius-15">

    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h5>Konten Textarea</h5>
                
            </div>
        </div>
    </div>
    <div class="card-body">

       <div class="form-group">
       
        <textarea name="konten" id="summernote">{!! old('konten') ?? $textarea->konten ?? '' !!}</textarea>

        @error('konten')
        <span class="text-danger">
            <strong>{{$message}}</strong>
        </span>

        @enderror
        </div>    
        
        <button type="button" class="btn btn-sm btn-secondary" onclick="window.history.back()">Kembali</button>
        <button type="submit" class="btn btn-sm btn-success">{{$button}}</button>
    </div>


</form>
</div>
</div>

@if(isset($textarea))
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

            <form action="{{ route('admin.pengaturan.textarea.destroy', $textarea->id ?? '') }}" method="POST">
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


@section('scripts')
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