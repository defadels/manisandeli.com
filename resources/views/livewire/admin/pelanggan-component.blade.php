@section('title', 'Daftar Pelanggan')
<div>
    <div class="page-content">
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Pelanggan</div>
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Pelanggan</li>
                    </ol>
                </nav>
            </div>
            <div class="ml-auto">
      
            </div>
        </div>

        <div class="card radius-15">

            <div class="card-header">
                <div class="row">
                    <div class="col-8 align-self-center">
                        <h4>Tabel Pelanggan</h4>
                    </div>
                    <div class="col-4">
                        <form method="get">
                            <div class="input-group">
                                <input type="text"  class="form-control form-control-sm" wire:model="search">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="addon-wrapping"><i class="lni lni-search-alt"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
    
                <div class="table-responsive">
                    @if(count($daftar_pelanggan) > 0) 
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor Handphone</th>
                                <th scope="col">Informasi</th>
                            </tr>
                        </thead>
                        
                        
                        @php
                        $no = 1;    
                        @endphp
                        
                        <tbody>
                           @foreach($daftar_pelanggan as $pelanggan) 
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$pelanggan->nama}}</td>
                                <td>{{$pelanggan->email}}</td>
                                <td>{{$pelanggan->nomor_hp}}</td>
                                <td>
                                    <a href="{{ route('admin.pelanggan.alamat', $pelanggan->id) }}" class="btn btn-md btn-primary" title="Biodata Pelanggan"><i class="lni lni-user"></i></a>
                                    {{-- <a href="{{ route('admin.pelanggan.keranjang', $pelanggan->id) }}" class="btn btn-md btn-warning" title="Keranjang"><i class="lni lni-cart-full"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                    @else
                        <h5 class="text-center">Pelanggan Kosong</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($statusView == true)
    <div wire:ignore.self class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Biodata Pelanggan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Profil Pelanggan</h5>
                    <table class="table">
                        <thead>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Handphone</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $pelanggan->nama }}</td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>{{ $pelanggan->nomor_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5>Alamat Pelanggan</h5>
                    <table class="table">
                        <thead>
                            <th>Label</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Kode Pos</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        
                    </div>

               
    
            </div>
        </div>
    </div>

    @endif

</div>
