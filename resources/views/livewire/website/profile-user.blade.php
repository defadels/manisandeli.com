@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/profile.css')}}">
@endsection
<div>
    
    <!--=====================================
                    BANNER PART START
        =======================================-->
        
        <section class="inner-section single-banner" style="background: url({{asset('frontend/images/single-banner.jpg')}}) no-repeat center;">
            <div class="container">
                <h2>my profile</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">profile</li>
                </ol>
            </div>
            
        </section>
        
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    PROFILE PART START
        =======================================-->
        
        <section class="inner-section profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Sukses</h4>
                            <p class="mb-0">{{session('message')}}</p>
                            <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                        @endif
                        <div class="account-card">
                            <div class="account-title">
                                <h4>Your Profile</h4>
                                <button data-bs-toggle="modal" wire:click="getData({{ $user->id }})"  data-bs-target="#profile-edit">edit profile</button>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="profile-image">
                                            <a href="#"><img src="@if($user->foto_profil)  {{ Storage::url($user->foto_profil) }} @else {{asset('frontend/images/user.png')}} @endif" alt="user"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">nama</label>
                                            <input readonly class="form-control" type="text" value="{{$user->nama}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input readonly class="form-control" type="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="profile-btn">
                                            <a href="{{route('password.request')}}">change pass.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--=====================================
                               CONTACT NUMBER LIST HIDDEN
                    =======================================-->
                    
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
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>alamat pengiriman</h4>
                                <button data-bs-toggle="modal" data-bs-target="#address-add">tambah alamat</button>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    @if(count($daftar_alamat) > 0)
                                    @foreach($daftar_alamat as $alamat)
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card address">
                                            <h6>{{$alamat->label}}</h6>
                                            <p>{{$alamat->alamat}}</p>
                                            <ul class="user-action">
                                                <li><button class="edit icofont-edit" wire:click="getDataAlamat({{ $alamat->id }})" title="Edit This" data-bs-toggle="modal" data-bs-target="#address-edit"></button></li>
                                                <li><button class="trash icofont-ui-delete" wire:click="destroyAddress({{ $alamat->id }})" title="Remove This" data-bs-dismiss="alert"></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    @else

                                    <h5 class="text-center">
                                        Silahkan Tambah Data Alamat
                                    </h5>

                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="account-card mb-0">
                            <div class="account-title">
                                <h4>metode pembayaran</h4>
                                <button data-bs-toggle="modal" data-bs-target="#payment-add">tambah pembayaran</button>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    @if(count($daftar_pembayaran) > 0)

                                        @foreach($daftar_pembayaran as $pembayaran)
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card payment">
                                                {{-- <img src="{{asset('frontend/images/payment/png/01.png')}}" alt="payment"> --}}
                                                <h4>{{$pembayaran->nama_bank}}</h4>
                                                {{-- <p>
                                                    <span>****</span>
                                                    <span>****</span>
                                                    <span>****</span>
                                                    <sup>1876</sup>
                                                </p> --}}
                                                <p>{{ $pembayaran->nomor_rekening }}</p>
                                                <h5>{{$pembayaran->nama_pemilik}}</h5>
                                                <ul class="user-action">
                                                    <li><button class="edit icofont-edit" wire:click="getDataPembayaran({{ $pembayaran->id }})" title="Edit This" data-bs-toggle="modal" data-bs-target="#payment-edit"></button></li>
                                                    <li><button class="trash icofont-ui-delete" wire:click="destoryPayment({{ $pembayaran->id }})" title="Remove This" data-bs-dismiss="alert"></button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach

                                    @else
                                        <h5 class="text-center">
                                            Silahkan Tambah Data Pembayaran
                                        </h5>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!--=====================================
                    PROFILE PART END
        =======================================-->


        <!--=====================================
                    MODAL ADD FORM START
        =======================================-->
        <!-- contact add form -->
        <div class="modal fade" id="contact-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>add new contact</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="primary">primary</option>
                                <option value="secondary">secondary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">number</label>
                            <input class="form-control" type="text" placeholder="Enter your number">
                        </div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- address add form -->
        <div wire:ignore.self class="modal fade" id="address-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" wire:submit.prevent="createAddress">
                        @csrf
                        <div class="form-title">
                            <h3>tambah alamat baru</h3>
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="home">home</option>
                                <option value="office">office</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="academy">academy</option>
                                <option value="others">others</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="" class="form-label">label alamat</label>
                            <input type="text" class="form-control @error('label') is-invalid @enderror" wire:model="label" placeholder="Label alamat">
                            @error('label')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" placeholder="Masukkan alamat lengkap"></textarea>
                            @error('alamat')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="form-btn" type="submit">simpan alamat</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- payment add form -->
        <div wire:ignore.self class="modal fade" id="payment-add">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" wire:submit.prevent="createPayment">
                        @csrf
                        <div class="form-title">
                            <h3>tambah kartu pembayaran</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">nama bank/e-wallet</label>
                            <input class="form-control @error('nama_bank') is-invalid @enderror" type="text" wire:model="nama_bank" placeholder="Nama bank / e-wallet">
                            @error('nama_bank')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">nama pemilik</label>
                            <input class="form-control @error('nama_pemilik') is-invalid @enderror" type="text" wire:model="nama_pemilik" placeholder="Nama pemilik">
                            @error('nama_pemilik')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">nomor rekening</label>
                            <input class="form-control @error('nomor_rekening') is-invalid @enderror" type="text" wire:model="nomor_rekening" placeholder="Nomor rekening">
                            @error('nomor_rekening')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi" placeholder="Masukkan deskripsi"></textarea>
                            @error('deskripsi')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">jenis</label>
                            <select wire:model="jenis" class="form-select @error('jenis') is-invalid @enderror">
                                <option selected>pilih jenis</option>
                                <option value="COD">COD</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="Custom">Custom</option>
                            </select>
                            @error('jenis')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="" class="form-label">status</label>
                            <select wire:model="status" name="" id="" class="form-select @error('status') is-invalid @enderror">
                                <option selected>pilih status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            @error('status')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        </div>
                        <button class="form-btn" type="submit">simpan kartu pembayaran</button>
                    </form>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    MODAL ADD FORM END
        =======================================-->

        
        <!--=====================================
                    MODAL EDIT FORM START
        =======================================-->
        <!-- profile edit form -->
        <div wire:ignore.self class="modal fade" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" wire:submit.prevent="userUpdate">
                        @csrf
                        <input type="hidden" name="" wire:model="userId">
                        <div class="form-title">
                            <h3>edit profile info</h3>
                        </div>
                        <div class="form-group">
                       @if($statusUpdate == true)    

                            @if($user->foto_profil)
                            <img src="{{ empty(!$foto_profil) ? $foto_profil->temporaryUrl():route('website.profile.user',$user->id)}}" class="img-fluid" alt="" srcset="">
                            @endif
                            @if($fotoUrl && !$foto_profil)
                                <img src="{{ Storage::url($fotoUrl) }}" alt="" class="img-fluid">
                            @endif

                        @endif
                        
                            <label class="form-label">profile image</label>
                            <input class="form-control @error('foto_profil') is-invalid @enderror" wire:model="foto_profil" type="file">
                             @error('foto_profil')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" wire:model="nama">
                            @error('nama')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">nomor handphone</label>
                            <input class="form-control @error('nomor_hp') is-invalid @enderror" type="text" wire:model="nomor_hp">
                             @error('nomor_hp')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model="email">
                             @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="form-btn" type="submit">simpan</button>
                    </form>
                </div> 
                
            </div> 
        </div>

        <!-- contact edit form -->
        <div class="modal fade" id="contact-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form">
                        <div class="form-title">
                            <h3>edit contact info</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option value="primary" selected>primary</option>
                                <option value="secondary">secondary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">number</label>
                            <input class="form-control" type="text" value="+8801838288389">
                        </div>
                        <button class="form-btn" type="submit">save contact info</button>
                    </form>
                </div> 
            </div> 
        </div>

        <!-- address edit form -->
        <div wire:ignore.self class="modal fade" id="address-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" wire:submit.prevent="updateAddress">
                        @csrf
                        <input type="hidden" name="" wire:model="alamatId">
                        <div class="form-title">
                            <h3>edit alamat</h3>
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label">title</label>
                            <select class="form-select">
                                <option selected>choose title</option>
                                <option value="home">home</option>
                                <option value="office">office</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="academy">academy</option>
                                <option value="others">others</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="" class="form-label">label alamat</label>
                            <input type="text" class="form-control @error('label') is-invalid @enderror" wire:model="label" placeholder="Label alamat">
                            @error('label')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" placeholder="Masukkan alamat lengkap"></textarea>
                            @error('alamat')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="form-btn" type="submit">ubah alamat</button>
                    </form>
                </div> 
            </div> 
        </div>

         <!-- payment edit form -->
         <div wire:ignore.self class="modal fade" id="payment-edit">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" wire:submit.prevent="updatePayment">
                        @csrf
                        <input type="hidden" name="" wire:model="pembayaranId">
                        <div class="form-title">
                            <h3>edit kartu pembayaran</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">nama bank/e-wallet</label>
                            <input class="form-control @error('nama_bank') is-invalid @enderror" type="text" wire:model="nama_bank" placeholder="Nama bank / e-wallet">
                            @error('nama_bank')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">nama pemilik</label>
                            <input class="form-control @error('nama_pemilik') is-invalid @enderror" type="text" wire:model="nama_pemilik" placeholder="Nama pemilik">
                            @error('nama_pemilik')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">nomor rekening</label>
                            <input class="form-control @error('nomor_rekening') is-invalid @enderror" type="text" wire:model="nomor_rekening" placeholder="Nomor rekening">
                            @error('nomor_rekening')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi" placeholder="Masukkan deskripsi"></textarea>
                            @error('deskripsi')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">jenis</label>
                            <select wire:model="jenis" class="form-select @error('jenis') is-invalid @enderror">
                                <option selected>pilih jenis</option>
                                <option value="COD">COD</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="Custom">Custom</option>
                            </select>
                            @error('jenis')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="" class="form-label">status</label>
                            <select wire:model="status" name="" id="" class="form-select @error('status') is-invalid @enderror">
                                <option selected>pilih status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            @error('status')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        </div>
                        <button class="form-btn" type="submit">simpan kartu pembayaran</button>
                    </form>
                </div> 
            </div> 
        </div>
        <!--=====================================
                    MODAL EDIT FORM END
        =======================================-->
</div>

@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#profile-edit').modal('hide');
            $('#address-add').modal('hide');
            $('#address-edit').modal('hide');
            $('#payment-add').modal('hide');
            $('#payment-edit').modal('hide');
        });
    </script>
@endsection