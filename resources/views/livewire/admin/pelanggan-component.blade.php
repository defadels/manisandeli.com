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
                                    <a href="{{ route('admin.pelanggan.alamat', $pelanggan->id) }}" class="btn btn-md btn-primary" title="Alamat Pelanggan"><i class="lni lni-map-marker"></i></a>
                                    <a href="{{ route('admin.pelanggan.keranjang', $pelanggan->id) }}" class="btn btn-md btn-warning" title="Keranjang"><i class="lni lni-cart-full"></i></a>
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
</div>
