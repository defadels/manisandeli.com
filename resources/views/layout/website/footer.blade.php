

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="footer-widget">
                <a class="footer-logo" href="#">
                    @if($profil)
                    <img src="{{ Storage::url($profil->logo)}}" alt="logo">
                    @else
                    <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
                    @endif
                </a>
                <p class="footer-desc">{{$profil->deskripsi ?? 'Deskripsi kosong'}}</p>
                <ul class="footer-social">
                    @foreach($sosmed_toko as $sosmed)
                    <li><a target="_blank" class="icofont-{{strtolower($sosmed->nama)}}" href="{{$sosmed->url}}"></a></li>
                    {{-- <li><a class="icofont-twitter" href="#"></a></li>
                    <li><a class="icofont-linkedin" href="#"></a></li>
                    <li><a class="icofont-instagram" href="#"></a></li>
                    <li><a class="icofont-pinterest" href="#"></a></li> --}}
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="footer-widget contact">
                <h3 class="footer-title">hubungi kami</h3>
                <ul class="footer-contact">
                    <li>
                        <i class="icofont-ui-email"></i>
                        <p>
                            <span>{{$profil->email ?? 'Email kosong'}}</span>
                            {{-- <span>carrer@greeny.com</span> --}}
                        </p>
                    </li>
                    <li>
                        <i class="icofont-ui-touch-phone"></i>
                        <p>
                            <span>{{$profil->nomor_hp ?? 'Nomor telepon kosong'}}</span>
                            {{-- <span>+120 279 532 14</span> --}}
                        </p>
                    </li>
                    <li>
                        <i class="icofont-location-pin"></i>
                        <p>{{$profil->alamat ?? 'Alamat kosong'}}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="footer-widget">
                <h3 class="footer-title">link pintasan</h3>
                <div class="footer-links">
                    <ul>
                        <li><a href="#">Akun Saya</a></li>
                        <li><a href="#">Produk</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        {{-- <li><a href="#">Best Seller</a></li> --}}
                        {{-- <li><a href="#">New Arrivals</a></li> --}}
                    </ul>
                   
                </div>
            </div>
        </div>
       
    </div>
    <div class="row">
        <div class="col-12">
            <div class="footer-bottom">
                <p class="footer-copytext">&copy;  All Copyrights Reserved by <a target="_blank" href="https://themeforest.net/user/mironcoder">Manisan Putra Deli</a></p>
                {{-- <div class="footer-card">
                    <a href="#"><img src="{{asset('frontend/images/payment/jpg/01.jpg')}}" alt="payment"></a>
                    <a href="#"><img src="{{asset('frontend/images/payment/jpg/02.jpg')}}" alt="payment"></a>
                    <a href="#"><img src="{{asset('frontend/images/payment/jpg/03.jpg')}}" alt="payment"></a>
                    <a href="#"><img src="{{asset('frontend/images/payment/jpg/04.jpg')}}" alt="payment"></a>
                </div> --}}
            </div>
        </div>
    </div>
</div>