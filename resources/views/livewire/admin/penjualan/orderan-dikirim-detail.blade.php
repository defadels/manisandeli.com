
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Penjualan</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dikirim</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
   
    <div class="card radius-15">

        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-right">
                        <a href="{{route('admin.orderan.print', $orderan->id)}}" target="_blank" class="btn btn-dark"><i class="fa fa-print"></i> Print</a>
                        {{-- <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> --}}
                    </div>
                    <hr/>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 400px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
                                        @if(isset($profil_toko->logo))
                                        <img src="{{Storage::url($profil_toko->logo)}}" width="80" alt="" />
                                        @else
                                        <img src="{{asset('backend/assets/images/logo-icon.png')}}" width="80" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                <a target="_blank" href="javascript:;">
                                {{$profil_toko->nama ?? 'Nama Toko'}}
                                </a>
                            </h2>
                                    <div>{{$profil_toko->alamat ?? 'Alamat toko'}}</div>
                                    <div>{{ $profil_toko->nomor_hp ?? 'Telepon toko' }}</div>
                                    <div>{{$profil_toko->emnil ?? 'Email toko'}}</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE KEPADA:</div>
                                    <h2 class="to">{{$orderan->nama_lengkap}}</h2>
                                    <div class="address">{{$orderan->pengiriman->alamat_lengkap ?? $orderan->transaksi->metode_pembayaran}}</div>
                                    <div class="email"><a href="{{$orderan->email}}">{{$orderan->email}}</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h4 class="invoice-id">{{$orderan->invoice}}</h4>
                                    <div class="date">Tanggal Invoice: {{$orderan->created_at->format('d/m/Y')}}</div>
                                    <div class="date">Batas Pembayaran: {{$orderan->created_at->addDay(30)->format('d/m/Y')}}</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">PRODUK</th>
                                        <th class="text-right">JUMLAH</th>
                                        <th class="text-right">HARGA</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                @php    
                                     $no = 1;
                                @endphp
                                <tbody>
                                    @foreach($orderan->order_item as $item) 
                                    <tr>
                                        <td class="no">{{$no++}}</td>
                                        <td class="text-left">
                                            <h3>{{$item->item->nama_produk}}</h3>  </td>
                                        <td class="qty">{{$item->jumlah}}</td>
                                        <td class="unit">Rp.{{number_format($item->harga)}}</td>
                                        <td class="total">Rp.{{number_format($item->harga * $item->jumlah)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>Rp.{{number_format($orderan->subtotal)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">ONGKOS KIRIM 25%</td>
                                        <td>Rp.{{number_format($orderan->ongkir)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>Rp.{{number_format($orderan->total)}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks ml-4">Terima kasih!</div>
                            <div class="notices">
                                <div>PERINGATAN:</div>
                                <div class="notice">Biaya keuangan sebesar 1,5% akan dikenakan pada saldo yang belum dibayar setelah 30 hari.</div>
                            </div>
                        </main>
                        <footer>Faktur dibuat di komputer dan berlaku tanpa tanda tangan dan stempel.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>

        </div>

    
    </div>


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
                    <button type="submit" class="btn btn-sm btn-success ml-3">Sampai Tujuan</button>
                </form>
            </div>
           
        </div>
    </div>
    
    
</div>
