@extends('layout.admin_layout')

@section('title', 'Daftar Produk')

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
                    <li class="breadcrumb-item active" aria-current="page">Metode Pembayaran</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="mb-2"><a href="{{ route('admin.pengaturan.pembayaran.create') }}" class="btn btn-md btn-primary">+ Tambah Pembayaran</a></div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Tabel Metode Pembayaran</h4>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ url('admin/pengaturan/pembayaran') }}">
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
                @if(count($daftar_pembayaran) > 0) 
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Rekening / Nomor Handphone</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Nama Pemilik / Atas Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    
                    @php
                    $no = 1;    
                    @endphp
                    
                    <tbody>
                       @foreach($daftar_pembayaran as $pembayaran) 
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$pembayaran->nama}}</td>
                            <td>{{$pembayaran->nomor_rekening}}</td>
                            <td>{{ ucfirst($pembayaran->jenis) }}</td>
                            <td>{{$pembayaran->nama_pemilik}}</td>
                            <td>
                                <a href="{{ route('admin.pengaturan.pembayaran.edit', $pembayaran->id) }}" class="btn btn-md btn-primary">Edit</a>
                                <a href="{{ route('admin.pengaturan.pembayaran.show', $pembayaran->id) }}" class="btn btn-md btn-secondary">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                @else
                    <h5 class="text-center">Metode Pembayaran Kosong</h5>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection