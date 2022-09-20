<?php
use App\Models\SosmedTokoModel;
use App\Models\ProfilTokoModels;
use App\Models\Produk;

$sosmed_toko = SosmedTokoModel::get();
$profil = ProfilTokoModels::get()->first();

// if(Auth::check()){
    
//     Cart::instance('cart')->restore(Auth::user()->email);  
        
// }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!--=====================================
                    META TAG PART START
        =======================================-->
        <!-- REQUIRE META -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- AUTHOR META -->
        <meta name="author" content="Manisan Putra Deli">
        <meta name="email" content="manisanputradeli@gmail.com">
        <meta name="profile" content="https://manisanputradeli.com">

        <!-- TEMPLATE META -->
        <meta name="name" content="Manisan Putra Deli">
        <meta name="title" content="Manisan Putra Deli">
        <meta name="keywords" content="Toko online manisan di Indonesia">
        <!--=====================================
                    META-TAG PART END
        =======================================-->

        <!-- WEBPAGE TITLE -->
        <title>@yield('title','Manisan Putra Deli')</title>

        <!--=====================================
                    CSS LINK PART START
        =======================================-->
        <!-- FAVICON -->
        @if($profil)

        <link rel="icon" href="{{Storage::url($profil->logo)}}">
        @else
        <link rel="icon" href="{{asset('frontend/images/favicon.png')}}">

        @endif

        <!-- FONTS -->
        <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/fonts/icofont/icofont.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/fonts/fontawesome/fontawesome.min.css')}}">

        <!-- VENDOR -->
        <link rel="stylesheet" href="{{asset('frontend/vendor/venobox/venobox.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/vendor/slickslider/slick.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/vendor/niceselect/nice-select.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/bootstrap.min.css')}}">

        <!-- CUSTOM -->
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">

        @yield('style')
        <!--=====================================
                    CSS LINK PART END
        =======================================-->
        @livewireStyles
    </head>
    <body>
        <div class="backdrop"></div>
        {{-- <a class="backtop fas fa-arrow-up" href="#"></a> --}}
        
        <!--=====================================
                    HEADER TOP PART START
        =======================================-->
        <div class="header-top">
            @include('layout.website.header')
        </div>
        <!--=====================================
                    HEADER TOP PART END 
        =======================================-->



        <!--=====================================
                    HEADER PART START
        =======================================-->
       
            <livewire:website.headerpart-component />
        
        <!--=====================================
                    HEADER PART END
        =======================================-->


        <!--=====================================
                    NAVBAR PART START
        =======================================-->
        <nav class="navbar-part">
          @include('layout.website.navbar')
        </nav>
        <!--=====================================
                    NAVBAR PART END
        =======================================-->



        <!--=====================================
                CATEGORY SIDEBAR PART START
        =======================================-->
        {{-- <aside class="category-sidebar">
            <div class="category-header">
                <h4 class="category-title">
                    <i class="fas fa-align-left"></i>
                    <span>categories</span>
                </h4>
                <button class="category-close"><i class="icofont-close"></i></button>
            </div>
            <ul class="category-list">
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-vegetable"></i>
                        <span>vegetables</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">asparagus</a></li>
                        <li><a href="#">broccoli</a></li>
                        <li><a href="#">carrot</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-groceries"></i>
                        <span>groceries</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Grains & Bread</a></li>
                        <li><a href="#">Dairy & Eggs</a></li>
                        <li><a href="#">Oil & Fat</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-fruit"></i>
                        <span>fruits</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Apple</a></li>
                        <li><a href="#">Orange</a></li>
                        <li><a href="#">Strawberry</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-dairy-products"></i>
                        <span>dairy farm</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Egg</a></li>
                        <li><a href="#">milk</a></li>
                        <li><a href="#">butter</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-crab"></i>
                        <span>sea foods</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Lobster</a></li>
                        <li><a href="#">Octopus</a></li>
                        <li><a href="#">Shrimp</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-salad"></i>
                        <span>diet foods</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Salmon</a></li>
                        <li><a href="#">Potatoes</a></li>
                        <li><a href="#">Greens</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-dried-fruit"></i>
                        <span>dry foods</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">noodles</a></li>
                        <li><a href="#">Powdered milk</a></li>
                        <li><a href="#">nut & yeast</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-fast-food"></i>
                        <span>fast foods</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">mango</a></li>
                        <li><a href="#">plumsor</a></li>
                        <li><a href="#">raisins</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-cheers"></i>
                        <span>drinks</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Wine</a></li>
                        <li><a href="#">Juice</a></li>
                        <li><a href="#">Water</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-beverage"></i>
                        <span>coffee</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Cappuchino</a></li>
                        <li><a href="#">Espresso</a></li>
                        <li><a href="#">Latte</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-barbecue"></i>
                        <span>meats</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Meatball</a></li>
                        <li><a href="#">Sausage</a></li>
                        <li><a href="#">Poultry</a></li>
                    </ul>
                </li>
                <li class="category-item">
                    <a class="category-link dropdown-link" href="#">
                        <i class="flaticon-fish"></i>
                        <span>fishes</span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="#">Agujjim</a></li>
                        <li><a href="#">saltfish</a></li>
                        <li><a href="#">pazza</a></li>
                    </ul>
                </li>
            </ul>
            <div class="category-footer">
                <p>All Rights Reserved by <a href="#">Manisan Putra Deli</a></p>
            </div>
        </aside> --}}
        <!--=====================================
                CATEGORY SIDEBAR PART END
        =======================================-->


        <!--=====================================
                  CART SIDEBAR PART START
        =======================================-->
        
            <livewire:website.cart-component />
        
        <!--=====================================
                    CART SIDEBAR PART END
        =======================================-->


        <!--=====================================
                  NAV SIDEBAR PART START
        =======================================-->
        <aside class="nav-sidebar">   
            <div class="nav-header">
                @if(isset($profil->logo))
                <a href="{{route('website.home')}}"><img src="{{Storage::url($profil->logo)}}" alt="{{$profil->nama ?? 'Manisan Putra Deli'}}"></a>
                @else 

                <a href="{{route('website.home')}}"><img src="{{asset('frontend/images/logo.png')}}" alt="{{$profil->nama ?? 'Manisan Putra Deli'}}"></a>
                @endif
                <a href="#" class="nav-close"><i class="icofont-close"></i></a>
            </div>
            <div class="nav-content">
                

                <!-- This commentable code show when user login or register -->
              
                @if(Route::has('login'))
            
            @auth

                @if(Auth::user()->roles == 'admin')

                    <div class="nav-profile">
                            <a class="nav-user" href="#"><img src="@if(Auth::user()->foto_profil) {{Storage::url(Auth::user()->foto_profil)}} @else {{asset('frontend/images/user.png') }} @endif" alt="user"></a>
                            <h4 class="nav-name"><a href="profile.html">{{Auth::user()->nama}}</a></h4>
                    </div> 
                    

                    <ul class="nav-list">
                        <li>
                            <a class="nav-link" href="{{route('website.home')}}"><i class="icofont-home"></i>Beranda</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('website.produk')}}"><i class="icofont-food-cart"></i>Produk</a>
                        </li>
                    
                        <li>
                            <a class="nav-link dropdown-link" href="#"><i class="icofont-bag-alt"></i>akun saya</a>
                            <ul class="dropdown-list">
                                <li><a href="{{route('website.profile.user', Auth::user()->id)}}">profil</a></li>
                                {{-- <li><a href="wallet.html">wallet</a></li> --}}
                                {{-- <li><a href="{{route('website.coming-soon')}}">wishlist</a></li> --}}
                                {{-- <li><a href="{{route('website.coming-soon')}}">compare</a></li> --}}
                                <li><a href="{{route('admin.dashboard')}}">halaman dasbor</a></li>
                                <li><a href="{{route('website.checkout')}}">checkout</a></li>
                                <li><a href="{{route('website.orderanku')}}">orderanku</a></li>
                                {{-- <li><a href="invoice.html">order invoice</a></li> --}}
                                {{-- <li><a href="email-template.html">email template</a></li> --}}
                            </ul>
                        </li>

                        {{-- <li><a class="nav-link" href="offer.html"><i class="icofont-sale-discount"></i>offers</a></li> --}}
                        <li><a class="nav-link" href="{{route('website.tentang')}}"><i class="icofont-info-circle"></i>tentang kami</a></li>
                        {{-- <li><a class="nav-link" href="faq.html"><i class="icofont-support-faq"></i>need help</a></li> --}}
                        {{-- <li><a class="nav-link" href="contact.html"><i class="icofont-contacts"></i>contact us</a></li> --}}
                        <li><a class="nav-link" href="{{route('website.kebijakan-privasi')}}"><i class="icofont-warning"></i>kebijakan privasi</a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="icofont-logout"></i>logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>

                @endif

                @if(Auth::user()->roles == 'owner')

                    <div class="nav-profile">
                        <a class="nav-user" href="#"><img src="{{asset('frontend/images/user.png')}}" alt="user"></a>
                        <h4 class="nav-name"><a href="profile.html">{{Auth::user()->nama}}</a></h4>
                    </div> 
                

                    <ul class="nav-list">
                        <li>
                            <a class="nav-link" href="{{route('website.home')}}"><i class="icofont-home"></i>Beranda</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('website.produk')}}"><i class="icofont-food-cart"></i>Produk</a>
                        </li>
                    
                        <li>
                            <a class="nav-link dropdown-link" href="#"><i class="icofont-bag-alt"></i>akun saya</a>
                            <ul class="dropdown-list">
                                <li><a href="{{route('website.profile.user', Auth::user()->id)}}">profil</a></li>
                                {{-- <li><a href="wallet.html">wallet</a></li> --}}
                                {{-- <li><a href="{{route('website.coming-soon')}}">wishlist</a></li> --}}
                                {{-- <li><a href="{{route('website.coming-soon')}}">compare</a></li> --}}
                                <li><a href="{{route('admin.dashboard')}}">halaman dasbor</a></li>
                                <li><a href="{{route('website.checkout')}}">checkout</a></li>
                                <li><a href="{{route('website.orderanku')}}">orderanku</a></li>
                                {{-- <li><a href="invoice.html">order invoice</a></li> --}}
                                {{-- <li><a href="email-template.html">email template</a></li> --}}
                            </ul>
                        </li>

                        {{-- <li><a class="nav-link" href="offer.html"><i class="icofont-sale-discount"></i>offers</a></li> --}}
                        <li><a class="nav-link" href="{{route('website.tentang')}}"><i class="icofont-info-circle"></i>tentang kami</a></li>
                        {{-- <li><a class="nav-link" href="faq.html"><i class="icofont-support-faq"></i>need help</a></li> --}}
                        {{-- <li><a class="nav-link" href="contact.html"><i class="icofont-contacts"></i>contact us</a></li> --}}
                        <li><a class="nav-link" href="{{route('website.kebijakan-privasi')}}"><i class="icofont-warning"></i>kebijakan privasi</a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="icofont-logout"></i>logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>

                @endif

                @if(Auth::user()->roles == 'pelanggan')

                    <div class="nav-profile">
                        <a class="nav-user" href="#"><img src="{{asset('frontend/images/user.png')}}" alt="user"></a>
                        <h4 class="nav-name"><a href="profile.html">{{Auth::user()->nama}}</a></h4>
                    </div> 
                

                    <ul class="nav-list">
                        <li>
                            <a class="nav-link" href="{{route('website.home')}}"><i class="icofont-home"></i>Beranda</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('website.produk')}}"><i class="icofont-food-cart"></i>Produk</a>
                        </li>
                    
                        <li>
                            <a class="nav-link dropdown-link" href="#"><i class="icofont-bag-alt"></i>akun saya</a>
                            <ul class="dropdown-list">
                                <li><a href="{{route('website.profile.user', Auth::user()->id)}}">profil</a></li>
                                {{-- <li><a href="wallet.html">wallet</a></li> --}}
                                {{-- <li><a href="{{route('website.coming-soon')}}">wishlist</a></li> --}}
                                {{-- <li><a href="{{route('website.coming-soon')}}">compare</a></li> --}}
                                <li><a href="{{route('website.checkout')}}">checkout</a></li>
                                <li><a href="{{route('website.orderanku')}}">orderanku</a></li>
                                {{-- <li><a href="invoice.html">order invoice</a></li> --}}
                                {{-- <li><a href="email-template.html">email template</a></li> --}}
                            </ul>
                        </li>

                        {{-- <li><a class="nav-link" href="offer.html"><i class="icofont-sale-discount"></i>offers</a></li> --}}
                        <li><a class="nav-link" href="{{route('website.tentang')}}"><i class="icofont-info-circle"></i>tentang kami</a></li>
                        {{-- <li><a class="nav-link" href="faq.html"><i class="icofont-support-faq"></i>need help</a></li> --}}
                        {{-- <li><a class="nav-link" href="contact.html"><i class="icofont-contacts"></i>contact us</a></li> --}}
                        <li><a class="nav-link" href="{{route('website.kebijakan-privasi')}}"><i class="icofont-warning"></i>kebijakan privasi</a></li>
                        <li><a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="icofont-logout"></i>logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>

                @endif

                @else

            <div class="nav-btn">
                <a href="{{route('login')}}" class="btn btn-inline">
                    <i class="fa fa-unlock-alt"></i>
                    <span>LOGIN</span>
                </a>
            </div>
            
            @endauth

            
            

            @endif

            
                
                <div class="nav-info-group">
                    <div class="nav-info">
                        <i class="icofont-ui-touch-phone"></i>
                        <p>
                            <small>hubungi kami</small>
                            <span>{{$profil->nomor_hp ?? 'Nomor HP Kosong'}}</span>
                        </p>
                    </div>
                    <div class="nav-info">
                        <i class="icofont-ui-email"></i>
                        <p>
                            <small>email kami</small>
                            <span>{{$profil->email ?? 'Email Kosong'}}</span>
                        </p>
                    </div>
                </div>
                <div class="nav-footer">
                    <p>All Rights Reserved by <a href="{{route('website.home')}}">Manisan Putra Deli</a></p>
                </div>
            </div>
        </aside>
        <!--=====================================
                  NAV SIDEBAR PART END
        =======================================-->


        <!--=====================================
                    MOBILE-MENU PART START
        =======================================-->
        <div class="mobile-menu">
            <a href="{{route('website.home')}}" title="Home Page">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            {{-- <button class="cate-btn" title="Category List">
                <i class="fas fa-list"></i>
                <span>category</span>
            </button> --}}
            <button class="cart-btn" title="Cartlist">
                <i class="fas fa-shopping-basket"></i>
                <span>keranjang</span>
                <sup>{{Cart::content()->count()}}</sup>
            </button>
            {{-- <a href="{{route('website.coming-soon')}}" title="Wishlist">
                <i class="fas fa-heart"></i>
                <span>wishlist</span>
                <sup>0</sup>
            </a> --}}
            {{-- <a href="{{route('website.coming-soon')}}" title="Compare List">
                <i class="fas fa-random"></i>
                <span>perbandingan</span>
                <sup>0</sup>
            </a> --}}
        </div>
        <!--=====================================
                    MOBILE-MENU PART END
        =======================================-->

            @yield('content')
            {{$slot ?? ''}}

        <!--=====================================
                     FOOTER PART START
        =======================================-->
        <footer class="footer-part">
            @include('layout.website.footer')
        </footer>
        <!--=====================================
                      FOOTER PART END
        =======================================-->
        

        <!--=====================================
                    JS LINK PART START
        =======================================-->
        <!-- VENDOR -->
        <script src="{{asset('frontend/vendor/bootstrap/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/countdown/countdown.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/niceselect/nice-select.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/slickslider/slick.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/venobox/venobox.min.js')}}"></script>

        <!-- CUSTOM -->
        <script src="{{asset('frontend/js/nice-select.js')}}"></script>
        <script src="{{asset('frontend/js/countdown.js')}}"></script>
        <script src="{{asset('frontend/js/accordion.js')}}"></script>
        <script src="{{asset('frontend/js/venobox.js')}}"></script>
        <script src="{{asset('frontend/js/slick.js')}}"></script>
        <script src="{{asset('frontend/js/main.js')}}"></script> 
        <!--=====================================
                    JS LINK PART END
        =======================================-->
        <!--Start of Tawk.to Script-->

        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/630a4c0e37898912e9658972/1gbg3i6i9';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>

    <!--End of Tawk.to Script-->
        @yield('script')
        @livewireScripts
    </body>
</html>






