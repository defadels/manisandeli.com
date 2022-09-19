@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/checkout.css')}}">
@endsection

<div>
    <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>checkout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">beranda</a></li>
                    <li class="breadcrumb-item"><a href="shop-4column.html">Pesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->
        @if(session()->has('message'))
        <div class="alert alert-success">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        @endif

        <!--=====================================
                    CHECKOUT PART START
        =======================================-->
        <section class="inner-section checkout-part">
            <div class="container">
                <div class="row">
                    @if(Cart::count() > 0)
                 
                  <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>pesanan anda</h4>
                        </div>
                        <div class="account-content">
                            <div class="table-scroll">
                                <table class="table-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">Serial</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Harga</th>
                                            {{-- <th scope="col">brand</th> --}}
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="table-serial"><h6>01</h6></td>
                                            <td class="table-image"><img src="{{ Storage::url($item->model->foto_produk)}}" alt="product"></td>
                                            <td class="table-name"><h6>{{$item->model->nama_produk}}</h6></td>
                                            <td class="table-price"><h6>Rp. {{number_format($item->model->harga_jual)}}<small>/kilo</small></h6></td>
                                            {{-- <td class="table-brand"><h6>Fresh Company</h6></td> --}}
                                            <td class="table-quantity"><h6>{{$item->qty}}</h6></td>
                                            <td class="table-action">
                                                <a class="view" href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a>
                                                <a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- <div class="chekout-coupon">
                                <button class="coupon-btn">Do you have a coupon code?</button>
                                <form class="coupon-form">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit"><span>apply</span></button>
                                </form>
                            </div>
                            <div class="checkout-charge">
                                <ul>
                                    <li>
                                        <span>Sub total</span>
                                        <span>Rp.{{Session::get('checkout')['subtotal']}}</span>
                                    </li>
                                    <li>
                                        <span>delivery fee</span>
                                        <span>Rp.{{Session::get('checkout')['tax']}}</span>
                                    </li>
                                    <li>
                                        <span>discount</span>
                                        <span>{{Session::get('checkout')['discount']}}</span>
                                    </li>
                                    <li>
                                        <span>Total<small>(Incl. VAT)</small></span>
                                        <span>Rp.{{Session::get('checkout')['total']}}</span>
                                    </li>
                                </ul>
                            </div> --}}

                        </div>
                      
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Metode Pembayaran</h4>
                        </div>

                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="col-md-6 col-lg-4" >

                                    <label for="" class= "form-label">Metode Pembayaran</label>

                                    <div class="form-group">

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Pilih Metode Pembayaran
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{ route('website.checkout.cod') }}">Cash On Delivery (COD)</a> </li>
                                              <li><a class="dropdown-item" href="{{ route('website.checkout.transfer') }}">Transfer</a> </li>
                                              <li><a class="dropdown-item" href="{{ route('website.checkout')}}">Bayar & Ambil di Toko</a> </li>
                                            </ul>
                                          </div>
            
                                    </div>
                                
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent="placeOrder">           
                
              
                    <div class="col-lg-12">
 
                        <div class="account-card">
                            <div class="account-title">
                                <h4>profil konsumen</h4>
                                
                            </div>
                            <div class="account-content">
                                <div class="row">
                                   
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">nama</label>
                                            <input class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama lengkap Anda" type="text" wire:model="nama_lengkap">
                                            @error('nama_lengkap')
                                                <span class="text-danger">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Nomor Handphone</label>
                                            <input class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="Nomor telepon/handphone Anda" wire:model="nomor_hp" type="text">
                                            @error('nomor_hp')
                                                <span class="text-danger">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda" wire:model="email" type="email">
                                            @error('email')
                                                <span class="text-danger">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                
                                </div>
                                          
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="account-content">
                        <div class="chekout-coupon">
                            {{-- <button class="coupon-btn">Punya kode kupon?</button>
                            <form class="coupon-form">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit"><span>masukkan</span></button>
                            </form> --}}
                        </div>

                       @if(Session::has('checkout')) 
                        <div class="checkout-charge">
                            <ul>
                                <li>
                                    <span>Sub total</span>
                                    <span>Rp.{{Cart::instance('cart')->subtotal()}}</span>
                                </li>
                                <li>
                                    <span>ongkos kirim</span>
                                    <span>Rp.0.00</span>
                                </li>
                                <li>
                                    <span>diskon</span>
                                    <span>Rp.0.00</span>
                                </li>
                                <li>
                                    <span>Total<small>(Incl. VAT)</small></span>
                                    <span>Rp.{{Cart::instance('cart')->subtotal()}}</span>
                                </li>
                                {{-- <li>
                                    <span>Sub total</span>
                                    <span>Rp.{{Session::get('checkout')['subtotal']}}</span>
                                </li>
                                <li>
                                    <span>ongkos kirim</span>
                                    <span>Rp.{{Session::get('checkout')['tax']}}</span>
                                </li>
                                <li>
                                    <span>diskon</span>
                                    <span>{{Session::get('checkout')['discount']}}</span>
                                </li>
                                <li>
                                    <span>Total<small>(Incl. VAT)</small></span>
                                    <span>Rp.{{Session::get('checkout')['total']}}</span>
                                </li> --}}
                            </ul>
                        </div>
                        @endif

                    </div>


                        {{-- <div class="checkout-check">
                            <input type="checkbox" id="checkout-check">
                            <label for="checkout-check">By making this purchase you agree to our <a href="#">Terms and Conditions</a>.</label>
                        </div> --}}
                        
                        <div class="checkout-proced">
                            {{-- <button type="submit" class="btn btn-outline">proses pembayaran</button> --}}
                            <input type="submit" value="Proses Pembayaran" class="btn btn-outline">
                        </form>
                        </div>
                    </div>
                </div>

                    @else 
                    <div class="col-lg-12">
                        <div class="alert-info">
                            <p>Keranjang Kosong <a href="{{route('website.produk')}}">Belanja sekarang</a></p>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </section>
        <!--=====================================
                    CHECKOUT PART END
        =======================================-->

</div>