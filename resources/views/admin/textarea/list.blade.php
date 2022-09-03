@extends('layout.admin_layout')

@section('title', 'Textarea Halaman Depan')

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
                    <li class="breadcrumb-item active" aria-current="page">Slider</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    
    <div class="mb-2"><a href="{{route('admin.pengaturan.textarea.create')}}" class="btn btn-md btn-primary">+ Tambah Textarea</a></div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Textarea Halaman Depan</h4>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ url('admin/pengaturan/pembayaran') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-sm" value="{{ $req['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button data-toggle="modal" data-target="#exampleModal3" type="submit" class="btn btn-sm btn-secondary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                @if(count($daftar_textarea) > 0) 
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    
                    @php
                    $no = 1;    
                    @endphp
                    
                    <tbody>
                       @foreach($daftar_textarea as $textarea) 
                        <tr>
                            <td>{{$textarea->judul}}</td>  
                            <td>
                                <a href="{{route('admin.pengaturan.textarea.update', $textarea->id)}}" class="btn btn-sm btn-primary" title="Lihat"><i class="lni lni-pencil-alt"></i></a>
                                

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                @else
                    <h5 class="text-center">Textarea Kosong</h5>
                @endif
            </div>
        </div>
    </div>

    

</div>
@endsection