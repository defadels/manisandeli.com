@section('title', 'User Pengelola')

<div>
   <div class="page-content">
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Pengaturan</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
           
        </div>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

   
    @if($statusUpdate)
    <livewire:admin.user-update-component />
    @else
    <livewire:admin.user-create-component />
    @endif
    
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-md-8 mb-4 align-self-center">
                    <h5>Tabel User Pengelola</h5>
                </div>
                <div class="col-md-4">
                    <form method="get" action="">
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
                @if(count($daftar_user) > 0) 
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    
                    @php
                    $no = 1;    
                    @endphp
                    
                    <tbody>
                    @foreach($daftar_user as $user) 
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$user->nama}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles}}</td>
                            <td>
                                <button wire:click="getData({{$user->id}})" class="btn btn-md btn-primary">Edit</button>
                                <button wire:click="destroy({{$user->id}})" class="btn btn-md btn-danger">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
                @else
                    <h5 class="text-center">User Pengelola Kosong</h5>
                @endif
            </div>
        </div>
    </div>

   </div>
</div>
