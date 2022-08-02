@extends('layout.admin_layout')

@section('title','Profil Toko')

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

    </div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-11 align-self-center">
                    <h4>Tabel Metode Pembayaran</h4>
                </div>
                <div class="col-1">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-secondary">Edit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            
            
        </div>
    </div>

</div>


@endsection
