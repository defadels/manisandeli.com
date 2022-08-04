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
                    <li class="breadcrumb-item active" aria-current="page">Profil Toko</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->

    @if($profil == null)
    <livewire:admin.profil-toko-create />
    @elseif($profil)
    <livewire:admin.profil-toko />
    @endif

</div>


@endsection

@section('scripts')

<script>
    function myFunction(){
        var x = document.getElementById("updateForm");

        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

@endsection