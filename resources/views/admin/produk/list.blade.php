@extends('layout.admin_layout')

@section('title', 'Daftar Produk')

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
    <div class="mb-2"><a href="{{ route('admin.produk.create') }}" class="btn btn-md btn-primary">+ Tambah Produk</a></div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Tabel Produk</h4>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ url('admin/produk') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-sm" value="{{ $req['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-secondary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                @if(count($daftar_produk) > 0) 
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Foto Produk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    
                    @php
                    $no = 0;    
                    @endphp
                    
                    <tbody>
                       @foreach($daftar_produk as $produk) 
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$produk->kode_produk}}</td>
                            <td>{{$produk->nama}}</td>
                            <td><img src="{{ Storage::url($produk->foto_produk) }}" alt=""></td>
                            <td>
                                <a href="" class="btn btn-md btn-primary">Edit</a>
                                <a href="" class="btn btn-md btn-secondary">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                @else
                    <h5 class="text-center">Produk Kosong</h5>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection