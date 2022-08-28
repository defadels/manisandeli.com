@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/checkout.css')}}">
@endsection

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
                    @if(Cart::count() > 0)
                 
                  <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Your order</h4>
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
                      
                    </div>
                </div>

                <form wire:submit.prevent="placeOrder">            

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

                                <label for="" class="form-label">Metode Pembayaran</label>

                               <div class="col-md-6 col-lg-2">
                              
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault1" wire:model="paymentmethod" value="cod">
                                        <label for="form-check-label" for="flexRadioDefault1">
                                            Cash On Delivery
                                    </label>
                                    </div>
                                 
                              
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault2" wire:model="paymentmethod" value="transfer">
                                        <label for="form-check-label" for="flexRadioDefault2">
                                            Transfer
                                        </label>
                                    </div>
                                
                              
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault3" wire:model="paymentmethod" value="0">
                                        <label for="form-check-label" for="flexRadioDefault3">
                                            Bayar di Toko
                                        </label>
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
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Alamat</label>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Pilih Alamat
                                            </button>
                                            <ul class="dropdown-menu">
                                            @foreach($daftar_alamat as $alamat)
                                              <li><a class="dropdown-item" wire:click.prevent="getAlamat({{ $alamat->id }})" href="#">{{$alamat->label}}</a></li>
                                            @endforeach
                                              <li><a class="dropdown-item" wire:click.prevent="customAlamat()" href="#">Custom</a></li>
                                            </ul>
                                          </div>
                                          
                                    </div>
                                </div>
                                <input type="hidden" name="" wire:model="alamatId">
                                
                                
                                <div class="col-md-6 col-lg-4">
                                    

                                 <div class="form-group">
                                    <label for="" class="form-label">Label</label>
                                    <input type="text" wire:model="label" class="form-control">  
                                    @error('label')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
                                </div>   
                                    <div class="form-group">
                                        <label for="" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" placeholder="Provinsi" wire:model="provinsi">
                                        @error('provinsi')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kota</label>
                                        <input type="text" class="form-control @error('kota') is-invalid @enderror" placeholder="Kota" wire:model="kota">
                                        @error('kota')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Kode Pos" wire:model="kode_pos">
                                        @error('kode_pos')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-12">
                                    <label for="" class="form-label">Alamat Lengkap</label>
                                    <textarea wire:model="alamat_lengkap"  placeholder="Alamat lengkap" id="" style="height: 250px" class="form-control @error('alamat_lengkap') is-invalid @enderror"></textarea>
                                    @error('alamat_lengkap')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
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
                                    <label for="" class="form-label">Bank/E-Wallet</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Pilih bank / E-Wallet
                                        </button>
                                        <ul class="dropdown-menu">
                                        @foreach($daftar_bank_pelanggan as $bank_pelanggan)
                                          <li><a class="dropdown-item" wire:click.prevent="getBankPelanggan({{$bank_pelanggan->id}})">{{$bank_pelanggan->nama_bank}}</a></li>
                                        @endforeach 
                                          <li><a class="dropdown-item" wire:model="nama_bank" wire:click.prevent="customBankPelanggan()" >Custom</a></li>
                                        </ul>
                                      </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Bank</label>
                                    <input type="text" placeholder="Nama Bank" wire:model="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror">
                                      @error('nama_bank')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Pemilik</label>
                                    <input type="text" placeholder="Nama Pemilik" wire:model="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror">
                                      @error('nama_pemilik')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Nomor Rekening / Nomor HP</label>
                                    <input type="text" placeholder="Nomor Rekening / Nomor HP" wire:model="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror">
                                      @error('nomor_rekening')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Jenis</label>
                                    <input type="text" placeholder="Jenis" wire:model="jenis" class="form-control">
                                      @error('jenis')
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

                <div class="col-lg-12">
                    <div class="account-card mb-0">
                        <div class="account-title">
                            <h4>rekening tujuan</h4>   
                        </div>
                        <div class="account-content">
                            <div class="row">
                                @foreach($daftar_bank_toko as $bank_toko)
                              <div class="col-md-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" wire:click.prevent="getBankTujuan({{$bank_toko->id}})" type="radio" name="flexRadioDefault" id="flexRadioDefault{{$bank_toko->id}}">
                                    <label class="form-check-label" for="flexRadioDefault{{$bank_toko->id}}">
                                      {{$bank_toko->nama_bank}}
                                      <br>
                                      {{$bank_toko->nomor_rekening}}
                                      <br>
                                      A/N {{$bank_toko->nama_pemilik}}
                                    </label>
                                  </div>
                                </div>
                                @endforeach

                            <input type="hidden" name="" wire:model="bank_tujuan_id">

                            <input type="hidden" name="" wire:model="bank_tujuan">
                            <input type="hidden" name="" wire:model="pemilik_rekening_tujuan">
                            <input type="hidden" name="=" wire:model="rekening_tujuan">
                            </div>
                            
                        </div>
                    </div> 
                </div> 

                <div class="col-lg-12">
                    <div class="account-card mb-0">
                        <div class="account-title">
                            <h4>Foto Bukti Transfer</h4>
                        </div>
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Upload Foto Bukti Transfer</label>
                                        @if($foto_bukti_tf)
                                            <div class="col-lg-6 col-md-4">
                                                <img src="{{ $foto_bukti_tf->temporaryUrl() }}" class="img-fluid" alt="">

                                            </div>
                                        @endif
                                        <input type="file" wire:model="foto_bukti_tf" class="form-control @error('foto_bukti_tf') is-invalid @enderror">
                                        @error('foto_bukti_tf')
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

                        @endif

                        @if($paymentmethod == 'cod')

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>alamat pengiriman</h4>
                                    
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Alamat</label>

                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                      Pilih Alamat
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    @foreach($daftar_alamat as $alamat)
                                                      <li><a class="dropdown-item" wire:click.prevent="getAlamat({{ $alamat->id }})" href="#">{{$alamat->label}}</a></li>
                                                    @endforeach
                                                      <li><a class="dropdown-item" wire:click.prevent="customAlamat()" href="#">Custom</a></li>
                                                    </ul>
                                                  </div>

                                                  
                                                  
                                            </div>
                                        </div>
                                        <input type="hidden" name="" wire:model="alamatId">
                                
                                
                                <div class="col-md-6 col-lg-4">
                                    

                                 <div class="form-group">
                                    <label for="" class="form-label">Label</label>
                                    <input type="text" wire:model="label" class="form-control">  
                                    @error('label')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
                                </div>   
                                    <div class="form-group">
                                        <label for="" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" placeholder="Provinsi" wire:model="provinsi">
                                        @error('provinsi')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Kota</label>
                                        <input type="text" class="form-control @error('kota') is-invalid @enderror" placeholder="Kota" wire:model="kota">
                                        @error('kota')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Kode Pos" wire:model="kode_pos">
                                        @error('kode_pos')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-12">
                                    <label for="" class="form-label">Alamat Lengkap</label>
                                    <textarea wire:model="alamat_lengkap"  placeholder="Alamat lengkap" id="" style="height: 250px" class="form-control @error('alamat_lengkap') is-invalid @enderror"></textarea>
                                    @error('alamat_lengkap')
                                     <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                     </span>
                                    @enderror
                                </div>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

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
