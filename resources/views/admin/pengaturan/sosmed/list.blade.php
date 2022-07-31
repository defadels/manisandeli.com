@extends('layout.admin_layout')

@section('title', 'Daftar Sosmed Toko')

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
                    <li class="breadcrumb-item active" aria-current="page">Sosmed Toko</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
           
        </div>
    </div>
        <livewire:admin.sosmed-toko-create />
    <!--end breadcrumb-->
        <livewire:admin.sosmed-toko />

</div>
    
@endsection