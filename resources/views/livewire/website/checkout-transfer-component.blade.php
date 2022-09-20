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

<section class="inner-section checkout-part">
    <div class="container">
        <div class="row">

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
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $item)
                                    <tr>
                                        <td class="table-serial"><h6>01</h6></td>
                                        <td class="table-image"><img src="{{ Storage::url($item->model->foto_produk)}}" alt="{{$item->model->nama_produk}}"></td>
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

                                <form wire:submit.prevent="placeOrder"> 
                                         
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                    
                    <div class="col-md-6 col-lg-4">
                        <label for="" class="form-label">Metode Pengiriman</label>
                        
                        <div class="form-group">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Pilih Metode Pengiriman
                                </button>
                                <ul class="dropdown-menu">
                               
                                  <li><a class="dropdown-item" href="{{ route('website.checkout.transfer.alamat') }}">Alamat Pribadi</a> </li>
                                
                                  <li><a class="dropdown-item" href="{{ route('website.checkout.transfer.ditoko') }}">Ambil di Toko</a> </li>
                                </ul>
                              </div>

                        </div>
                        
                    </div>

                <form wire:submit.prevent="placeOrder"> 
                
                </div>
                          
                </div>
            </div>
        </div>
    </div>


    @if($shipping == 'alamat')
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
                            <input type="text" wire:model="label" placeholder="Label Alamat" class="form-control">  
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
                        
                        <input type="hidden" name="" mire:model="pembayaran_pelanggan_id">

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

                        <fieldset id="banktujuan{{$bank_toko->id}}">
                        <div class="form-check">
                                <input class="form-check-input" wire:click.prevent="getBankTujuan({{$bank_toko->id}})" type="radio" name="banktujuan{{$bank_toko->id}}" id="banktujuan{{$bank_toko->id}}" wire:model="bank_tujuan_id" value="{{$bank_toko->id}}">
                                    <label class="form-check-label" for="banktujuan{{$bank_toko->id}}">
                                    {{$bank_toko->nama_bank}}
                                    <br>
                                    {{$bank_toko->nomor_rekening}}
                                    <br>
                                    A/N {{$bank_toko->nama_pemilik}}
                                    </label>
                                
                                </div>
                            </fieldset>

                        
                    </div>
                        
                        @endforeach

                    <input type="hidden" name="bank_tujuan_id" wire:model="bank_tujuan_id">

                    <input type="hidden" name="bank_tujuan" wire:model="bank_tujuan">
                    <input type="hidden" name="pemilik_rekening_tujuan" wire:model="pemilik_rekening_tujuan">
                    <input type="hidden" name="rekening_tujuan" wire:model="rekening_tujuan">
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

        <div class="account-content">
            <div class="chekout-coupon">
        
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
                        <span>Rp.{{Cart::instance('cart')->tax()}}</span>
                    </li>
                    <li>
                        <span>diskon</span>
                        <span>{{Cart::instance('cart')->discount}}</span>
                    </li>
                    <li>
                        <span>Total<small>(Incl. VAT)</small></span>
                        <span>Rp.{{Cart::instance('cart')->total()}}</span>
                    </li>
                </ul>
            </div>
            @endif
        
        </div>
        
        
            
            <div class="checkout-proced">
                {{-- <button type="submit" class="btn btn-outline">proses pembayaran</button> --}}
                <input type="submit" value="Proses Pembayaran" class="btn btn-outline">
            </form>
            </div>

@endif

@if($shipping == 'ditoko')

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

                    <fieldset id="banktujuan{{$bank_toko->id}}">
                    <div class="form-check">
                            <input class="form-check-input" wire:click.prevent="getBankTujuan({{$bank_toko->id}})" type="radio" name="banktujuan{{$bank_toko->id}}" id="banktujuan{{$bank_toko->id}}" wire:model="bank_tujuan_id" value="{{$bank_toko->id}}">
                                <label class="form-check-label" for="banktujuan{{$bank_toko->id}}">
                                {{$bank_toko->nama_bank}}
                                <br>
                                {{$bank_toko->nomor_rekening}}
                                <br>
                                A/N {{$bank_toko->nama_pemilik}}
                                </label>
                            
                            </div>
                        </fieldset>

                    
                </div>
                    
                    @endforeach

                <input type="hidden" name="bank_tujuan_id" wire:model="bank_tujuan_id">

                <input type="hidden" name="bank_tujuan" wire:model="bank_tujuan">
                <input type="hidden" name="pemilik_rekening_tujuan" wire:model="pemilik_rekening_tujuan">
                <input type="hidden" name="rekening_tujuan" wire:model="rekening_tujuan">
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

    
<div class="account-content">
    <div class="chekout-coupon">

    </div>

   @if(Session::has('checkout')) 
    <div class="checkout-charge">
        <ul>
            <li>
                <span>Sub total</span>
                <span>Rp.{{number_format(Cart::instance('cart')->subtotal())}}</span>
            </li>
            <li>
                <span>ongkos kirim</span>
                <span>Rp.{{number_format(Cart::instance('cart')->tax())}}</span>
            </li>
            <li>
                <span>diskon</span>
                <span>Rp.0.00</span>
            </li>
            <li>
                <span>Total<small>(Incl. VAT)</small></span>
                <span>Rp.{{number_format(Cart::instance('cart')->total())}}</span>
            </li>
        </ul>
    </div>
    @endif

</div>


    
    <div class="checkout-proced">
        <button type="submit" class="btn btn-outline">proses pembayaran</button>
        {{-- <input type="submit" value="Proses Pembayaran" class="btn btn-outline"> --}}
    </form>
    </div>

@endif


    
</div>
</div>


        </div>
    </div>
</section>

</div>
