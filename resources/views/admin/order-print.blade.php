<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Orderan {{$orderan->invoice}}</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- Vector CSS -->
	<link href="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<!--plugins-->
	<link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/icons.css')}}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/app.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-sidebar.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}" />
</head>
<body>
    <div class="page-content">
        <div class="card radius-15">
            <div class="card-body">
                <div id="invoice">
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
    </div>
	<!-- App JS -->
	<script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
      </script>
</body>
</html>