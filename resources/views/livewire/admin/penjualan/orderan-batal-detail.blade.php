<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Penjualan</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Batal</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    {{-- <div class="mb-2"><a href="{{ route('admin.pengaturan.pembayaran.create') }}" class="btn btn-md btn-primary">+ Tambah Pembayaran</a></div> --}}
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h6>Produk Dipesan</h6>
                </div>
                {{-- <div class="col-4">
                    <form method="get" action="{{ url('admin/pengaturan/pembayaran') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-sm" value="{{ $req['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-secondary">Search</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($orderan->order_item as $item) 
                        <tr>
                            <th scope="row"><img src="{{ Storage::url($item->item->foto_produk )}}" class="img-thumbnail" style="width:150px;" alt="{{$item->item->nama_produk}}"></th>
                            <td>{{$item->item->nama_produk}}</td>
                            <td>{{$item->jumlah}}kg</td>
                            <td>Rp.{{number_format($item->harga)}}</td>
                            <td>Rp.{{number_format($item->harga * $item->jumlah)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-12 align-self-center">
                    <h6>Order Summary</h6>
                </div>
                

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <p>Subtotal</p>
                </div>
                <div class="col-lg-6">
                    <strong>Rp. {{$orderan->subtotal}}</strong>  
                </div>
                <div class="col-lg-6">
                    <p>Ongkos Kirim</p>  
                </div>
                <div class="col-lg-6">
                    <strong>Rp. {{$orderan->ongkir}}</strong>  
                </div>
                <div class="col-lg-6">
                    <p>Total</p>  
                </div>
                <div class="col-lg-6">
                    <strong>Rp. {{$orderan->total}}</strong>  
                </div>
            </div>


        </div>

        

    </div>


    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h6>Detail Pembeli</h6>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{$orderan->nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$orderan->email}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Handphone</th>
                        <td>{{$orderan->nomor_hp}}</td>
                    </tr>
                    
                </table>
            </div>
            
        </div>
    </div>
    
    
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h6>Detail Pembayaran</h6>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0">
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>{{$orderan->transaksi->metode_pembayaran ?? '-'}}</td>
                        <th>Status</th>
                        <td>{{$orderan->transaksi->status ?? '-'}}</td>
                        
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td>{{$orderan->transaksi->nama_bank ?? '~'}}</td>
                        <th>Nama Pemilik</th>
                        <td>{{$orderan->transaksi->nama_pemlik ?? '~'}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rekening</th>
                        <td>{{$orderan->transaksi->nomor_rekening ?? '~'}}</td>
                        {{-- <th>Provinsi</th>
                        <td>{{$orderan->transaksi->provinsi}}</td> --}}
                    </tr>
                    <tr>
                        <th>Bank Tujuan</th>
                        <td>{{$orderan->transaksi->bank_tujuan ?? '~'}}</td>
                        <th>Pemilik Rekening Tujuan</th>
                        <td>{{$orderan->transaksi->pemilik_rekening_tujuan ?? '~'}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rekening Tujuan</th>
                        <td>{{$orderan->transaksi->rekening_tujuan ?? '~'}}</td>
                    </tr>
                    
                </table>
            </div>
            
        </div>
    </div>
    
    @if($orderan->pengiriman_berbeda)
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h6>Detail Pengiriman</h6>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{$orderan->nama_lengkap}}</td>
                        <th>Email</th>
                        <td>{{$orderan->email}}</td>
                        
                    </tr>
                    <tr>
                        <th>Nomor Handphone</th>
                        <td>{{$orderan->nomor_hp}}</td>
                        <th>Label</th>
                        <td>{{$orderan->pengiriman->label}}</td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <td>{{$orderan->pengiriman->kota}}</td>
                        <th>Provinsi</th>
                        <td>{{$orderan->pengiriman->provinsi}}</td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td>{{$orderan->pengiriman->kode_pos}}</td>
                        <th>Alamat Lengkap</th>
                        <td>{{$orderan->pengiriman->alamat_lengkap}}</td>
                    </tr>
                    
                </table>

                <hr>
                
              
            </div>
           
        </div>
    </div>
    @endif
    
    
    
</div>
