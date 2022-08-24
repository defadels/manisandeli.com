<div>
    <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url({{asset('frontend/images/single-banner.jpg')}}) no-repeat center;">
            <div class="container">
                <h2>checkout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop-4column.html">shop grid</a></li>
                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    CHECKOUT PART START
        =======================================-->
        <section class="inner-section checkout-part">
            <div class="container">
                <div class="row">
                 
                  <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Your order</h4>
                        </div>
                        <div class="account-content">
                            <div class="table-scroll">
                                @if(Cart::count() > 0)
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
                                            <td class="table-image"><img src="{{ $item->model->foto_produk ?? asset('frontend/images/product/01.jpg')}}" alt="product"></td>
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
                        @else 
                        <h5>Keranjang Kosong</h5>
                        <br>
                        <a class="btn btn-inline" href="{{route('website.produk')}}"> Belanja Sekarang</a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
 
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Your Profile</h4>
                            
                        </div>
                        <div class="account-content">
                            <div class="row">
                               
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">nama</label>
                                        <input class="form-control" placeholder="Nama lengkap Anda" type="text" wire:model="nama_lengkap">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Handphone</label>
                                        <input class="form-control" placeholder="Nomor telepon/handphone Anda" wire:model="nomor_hp" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" placeholder="Email Anda" wire:model="email" type="email">
                                    </div>
                                </div>

                               <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Metode Pembayaran</label>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="paymentMethod" id="paymentMethod1" wire:model="paymentmethod" value="cod">
                                        <label for="form-check-label">Cash On Delivery</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="paymentMethod" id="paymentMethod2" wire:model="paymentmethod" value="transfer">
                                        <label for="form-check-label">Transfer</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="paymentMethod" id="paymentMethod3" wire:model="paymentmethod" value="0">
                                        <label for="form-check-label">Bayar di Toko</label>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                {{-- <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>contact number</h4>
                            <button data-bs-toggle="modal" data-bs-target="#contact-add">add contact</button>
                        </div>
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact active">
                                        <h6>primary</h6>
                                        <p>+8801838288389</p>
                                        <ul>
                                            <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button></li>
                                            <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact">
                                        <h6>secondary</h6>
                                        <p>+8801941101915</p>
                                        <ul>
                                            <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button></li>
                                            <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact">
                                        <h6>secondary</h6>
                                        <p>+8801747875727</p>
                                        <ul>
                                            <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button></li>
                                            <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

              @if($paymentmethod == 'transfer')  
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>alamat pengiriman</h4>
                           
                        </div>
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Pilih Alamat</label>

                                          <br>
                                          <br>

                                          <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        
                                               @foreach($daftar_alamat as $alamat)
                                               <input type="radio" class="btn-check" wire:click.prevent="getAlamat({{ $alamat->id }})"  name="btnradio" id="btnradio{{$alamat->id}}" autocomplete="off">
                                               <label class="btn btn-sm btn-outline" for="btnradio{{$alamat->id}}">{{$alamat->label}}</label>
                                               @endforeach
                                               <input type="radio" class="btn-check" wire:click.prevent="customAlamat()"  name="btnradio" id="btnradiolast" autocomplete="off">
                                               <label class="btn btn-sm btn-outline" for="btnradiolast">Custom</label>
                                            </div>
                                          
                                    </div>
                                </div>
                                <input type="hidden" name="" wire:model="alamatId">
                                
                                
                                <div class="col-md-6 col-lg-4">
                                    

                                 <div class="form-group">
                                    <label for="" class="form-label">Label</label>
                                    <input type="text" wire:model="label" class="form-control">    
                                </div>   
                                    <div class="form-group">
                                        <label for="" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" placeholder="Provinsi" wire:model="provinsi">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kota</label>
                                        <input type="text" class="form-control" placeholder="Kota" wire:model="kota">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control" placeholder="Kode Pos" wire:model="kode_pos">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <label for="" class="form-label">Alamat Lengkap</label>
                                    <textarea wire:model="alamat_lengkap"  placeholder="Alamat lengkap" id="" style="height: 250px" class="form-control"></textarea>
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="account-card mb-0">
                        <div class="account-title">
                            <h4>metode pembayaran</h4>
                           
                        </div>
                        <div class="account-content">
                            <div class="row">
                              <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Pilih Bank/E-Wallet</label>
                                    <br>
                                    <br>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Bank</label>
                                    <input type="text" wire:model="nama_bank" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Pemilik</label>
                                    <input type="text" wire:model="nama_pemilik" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Nomor Rekening / Nomor HP</label>
                                    <input type="text" wire:model="nama_bank" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Je</label>
                                    <input type="text" wire:model="nama_pemilik" class="form-control">
                                </div>
                              </div>
                            </div>
                        </div>


                        @endif

                        @if($paymentmethod == 'cod')

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>alamat pengiriman</h4>
                                    
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Pilih Alamat</label>

                                                  <br>
                                                  <br>

                                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                
                                                       @foreach($daftar_alamat as $alamat)
                                                       <input type="radio" class="btn-check" wire:click.prevent="getAlamat({{ $alamat->id }})"  name="btnradio" id="btnradio{{$alamat->id}}" autocomplete="off">
                                                       <label class="btn btn-sm btn-outline" for="btnradio{{$alamat->id}}">{{$alamat->label}}</label>
                                                       @endforeach
                                                       <input type="radio" class="btn-check" wire:click.prevent="customAlamat()"  name="btnradio" id="btnradiolast" autocomplete="off">
                                                       <label class="btn btn-sm btn-outline" for="btnradiolast">Custom</label>
                                                    </div>
                                                  
                                            </div>
                                        </div>
                                        <input type="hidden" name="" wire:model="alamatId">
                                        
                                        
                                        <div class="col-md-6 col-lg-4">
                                            

                                         <div class="form-group">
                                            <label for="" class="form-label">Label</label>
                                            <input type="text" wire:model="label" class="form-control">    
                                        </div>   
                                            <div class="form-group">
                                                <label for="" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" placeholder="Provinsi" wire:model="provinsi">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Kota</label>
                                                <input type="text" class="form-control" placeholder="Kota" wire:model="kota">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" placeholder="Kode Pos" wire:model="kode_pos">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <label for="" class="form-label">Alamat Lengkap</label>
                                            <textarea wire:model="alamat_lengkap"  placeholder="Alamat lengkap" id="" style="height: 250px" class="form-control"></textarea>
                                        </div>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                        @if(Session::has('checkout'))  

                        <div class="account-content">
                        <div class="chekout-coupon">
                            <button class="coupon-btn">Punya kode kupon?</button>
                            <form class="coupon-form">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit"><span>masukkan</span></button>
                            </form>
                        </div>
                        <div class="checkout-charge">
                            <ul>
                                <li>
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
                                </li>
                            </ul>
                        </div>
                    </div>


                        <div class="checkout-check">
                            <input type="checkbox" id="checkout-check">
                            <label for="checkout-check">By making this purchase you agree to our <a href="#">Terms and Conditions</a>.</label>
                        </div>
                        <div class="checkout-proced">
                            <a href="invoice.html" class="btn btn-outline">proced to checkout</a>
                        </div>
                    </div>
                </div>

                
                  @else  
                    
                    <div class="col-lg-12">
                        <div class="alert-info">
                            <p>Returning customer? <a href="login.html">Click here to login</a></p>
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
