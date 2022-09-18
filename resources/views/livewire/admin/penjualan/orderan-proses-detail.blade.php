<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Penjualan</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Diproses</li>
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
                            <th scope="row"><img src="{{ Storage::url($item->item->foto_produk )}}" class="img-thumbnail" style="width:150px;" alt=""></th>
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
                        <td>{{$transaksi->metode_pembayaran ?? '-'}}</td>
                        <th>Status</th>
                        <td>{{$transaksi->status ??'-' }}</td>
                        
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td>{{$transaksi->nama_bank ?? '~'}}</td>
                        <th>Nama Pemilik</th>
                        <td>{{$transaksi->nama_pemlik ?? '~'}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rekening</th>
                        <td>{{$transaksi->nomor_rekening ?? '~'}}</td>
                        {{-- <th>Provinsi</th>
                        <td>{{$transaksi->provinsi}}</td> --}}
                    </tr>
                    <tr>
                        <th>Bank Tujuan</th>
                        <td>{{$transaksi->bank_tujuan ?? '~'}}</td>
                        <th>Pemilik Rekening Tujuan</th>
                        <td>{{$transaksi->pemilik_rekening_tujuan ?? '~'}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rekening Tujuan</th>
                        <td>{{$transaksi->rekening_tujuan ?? '~'}}</td>
                        @if(isset($transaksi->foto_bukti_tf))
                        <td>

                            <button type="button" data-toggle="modal" data-target="#fotoTransfer" class="btn btn-primary radius-15"><i class="lni lni-image"></i> Foto Bukti Transfer</button>
                        </td>
                         @endif
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

    @if($orderan->pengiriman_berbeda)

    <div class="card radius-15">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h6>Konfirmasi Pengiriman</h6>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                 <button type="button" class="btn btn-sm btn-secondary ml-3" onclick="window.history.back()" > Kembali</button>
                
                <form wire:submit.prevent="konfirmasiOrderan">
                    <input type="hidden" name="" wire:model="orderan_id">
                    <button type="submit" class="btn btn-sm btn-success ml-3">Selesai</button>
                </form>
            </div>
           
        </div>
    </div>
    

    @else

    <div class="card radius-15">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h6>Konfirmasi Pembayaran</h6>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                 <button type="button" class="btn btn-sm btn-secondary ml-3" onclick="window.history.back()" > Kembali</button>
                
                <form wire:submit.prevent="konfirmasiOrderan">
                    <input type="hidden" name="" wire:model="orderan_id">
                    <button type="submit" class="btn btn-sm btn-success ml-3">Selesai</button>
                </form>
            </div>
           
        </div>
    </div>
    
    @endif


    @if(isset($transaksi->foto_bukti_tf))
    <div  wire:ignore.self class="modal fade" id="fotoTransfer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Foto Bukti Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="{{ Storage::url($transaksi->foto_bukti_tf) }}" alt="" class="img-fluid">

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
               
    
            </div>
        </div>
    </div>

    @endif
    
    
    
</div>
