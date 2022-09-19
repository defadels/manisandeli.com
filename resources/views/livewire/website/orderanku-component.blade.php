@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/orderlist.css')}}">
@endsection

<div>
        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>Daftar Orderanku</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('website.home')}}">beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">orderanku</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->

         <!--=====================================
                    ORDERLIST PART START
        =======================================-->
        <section class="inner-section orderlist-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="orderlist-filter">
                            <h5>total order <span>- {{$daftar_orderan->count()}}</span></h5>
                            {{-- <div class="filter-short">
                                <label class="form-label">short by:</label>
                                <select class="form-select">
                                    <option value="all" selected>all order</option>
                                    <option value="recieved">recieved order</option>
                                    <option value="processed">processed order</option>
                                    <option value="shipped">shipped order</option>
                                    <option value="delivered">delivered order</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        @foreach($daftar_orderan as $orderan)

                        <div class="orderlist">
                            <div class="orderlist-head">
                                <h5>#{{$orderan->invoice}}</h5>
                                <h5>orderan {{$orderan->status}}</h5>
                            </div>
                            <div class="orderlist-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order-track">
                                            <ul class="order-track-list">

                                                @if($orderan->status == 'masuk')

                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diterima</span>
                                                </li>
                                                <li class="order-track-item">
                                                    <i class="icofont-close"></i>
                                                    <span>orderan diproses</span>
                                                </li>
                                                <li class="order-track-item">
                                                    <i class="icofont-close"></i>
                                                    <span>orderan dikemas</span>
                                                </li>
                                                <li class="order-track-item">
                                                    <i class="icofont-close"></i>
                                                    <span>orderan sampai & selesai</span>
                                                </li>

                                                @endif

                                                @if($orderan->status == 'diproses')

                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diterima</span>
                                                </li>
                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diproses</span>
                                                </li>
                                                <li class="order-track-item">
                                                    <i class="icofont-close"></i>
                                                    <span>orderan dikemas</span>
                                                </li>
                                                <li class="order-track-item">
                                                    <i class="icofont-close"></i>
                                                    <span>orderan sampai & selesai</span>
                                                </li>

                                                @endif

                                                @if($orderan->status == 'dikirim')

                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diterima</span>
                                                </li>
                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diproses</span>
                                                </li>
                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan dikemas</span>
                                                </li>
                                                <li class="order-track-item">
                                                    <i class="icofont-close"></i>
                                                    <span>orderan sampai & selesai</span>
                                                </li>

                                                @endif

                                                @if($orderan->status == 'selesai')

                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diterima</span>
                                                </li>
                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan diproses</span>
                                                </li>
                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan dikemas</span>
                                                </li>
                                                <li class="order-track-item active">
                                                    <i class="icofont-check"></i>
                                                    <span>orderan sampai & selesai</span>
                                                </li>

                                                @endif


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <ul class="orderlist-details">
                                            <li>
                                                <h6>order id</h6>
                                                <p>{{$orderan->invoice}}</p>
                                            </li>
                                            <li>
                                                <h6>metode pembayaran</h6>
                                                <p>{{$orderan->transaksi->metode_pembayaran ?? '-'}}</p>
                                            </li>
                                            <li>
                                                <h6>Total Item</h6>
                                                <p>{{$orderan->order_item->count()}} Item</p>
                                            </li>
                                            <li>
                                                <h6>Tanggal Order</h6>
                                                <p>{{$orderan->created_at->format('d-m-Y')}}</p>
                                            </li>
                                            {{-- <li>
                                                <h6>Delivery Time</h6>
                                                <p>12th February 2021</p>
                                            </li> --}}
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="orderlist-details">
                                            <li>
                                                <h6>Sub Total</h6>
                                                <p>Rp.{{$orderan->subtotal}}</p>
                                            </li>
                                            <li>
                                                <h6>diskon</h6>
                                                <p>Rp.{{$orderan->diskon}}</p>
                                            </li>
                                            <li>
                                                <h6>ongkos kirim</h6>
                                                <p>Rp.{{$orderan->ongkir}}</p>
                                            </li>
                                            <li>
                                                <h6>Total<small>(Incl. VAT)</small></h6>
                                                <p>Rp.{{$orderan->total}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="orderlist-deliver">
                                            <h6>Lokasi pengiriman</h6>
                                            <p>{{$orderan->pengiriman->alamat_lengkap ?? 'Ambil di Toko'}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="table-scroll">
                                            <table class="table-list">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Serial</th>
                                                        <th scope="col">Produk</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderan->order_item as $item) 
                                                    <tr>
                                                        <td class="table-serial"><h6>01</h6></td>
                                                        @if(isset($item->item->foto_produk))
                                                        <td class="table-image"><img src="{{Storage::url($item->item->foto_produk)}}" alt="product"></td>
                                                        @else
                                                        <td class="table-image"><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></td>

                                                        @endif
                                                        <td class="table-name"><h6>{{$item->item->nama_produk}}</h6></td>
                                                        <td class="table-price"><h6>Rp.{{$item->harga}}<small>/kilo</small></h6></td>
                                                        <td class="table-quantity"><h6>{{ $item->jumlah }}</h6></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
                
            </div>
        </section>
        <!--=====================================
                    ORDERLIST PART END
        =======================================-->

</div>
