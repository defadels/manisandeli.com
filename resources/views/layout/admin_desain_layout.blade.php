@extends('layout.admin_layout')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">File Manager</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">File Manager</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">	<span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body"> <a href="javascript:;" class="btn btn-primary btn-block">+ Add File</a>
                    <h5 class="my-3">My Drive</h5>
                    <div class="fm-menu">
                        <div class="list-group list-group-flush"> <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-folder mr-2'></i><span>All Files</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-devices mr-2'></i><span>My Devices</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-analyse mr-2'></i><span>Recents</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-plug mr-2'></i><span>Important</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-trash-alt mr-2'></i><span>Deleted Files</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-file mr-2'></i><span>Documents</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-image mr-2'></i><span>Images</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-video mr-2'></i><span>Videos</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-music mr-2'></i><span>Audio</span></a>
                            <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-beer mr-2'></i><span>Zip Files</span></a>
                        </div>
                    </div>
                </div>
            </div>
           {{$slot ?? ''}}
    </div>
    <!--end row-->
</div>
@endsection