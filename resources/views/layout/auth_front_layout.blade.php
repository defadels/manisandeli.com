<?php
use App\Models\SosmedTokoModel;
use App\Models\ProfilTokoModels;
use App\Models\Produk;

$sosmed_toko = SosmedTokoModel::get();
$profil = ProfilTokoModels::get()->first();


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
        <meta name="author" content="mironcoder">
        <meta name="email" content="mironcoder@gmail.com">
        <meta name="profile" content="https://themeforest.net/user/mironcoder">

        <!-- TEMPLATE META -->
        <meta name="name" content="Greeny">
        <meta name="title" content="Greeny - eCommerce HTML Template">
        <meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, webshop, farm, grocery, natural, online store">
        <!--=====================================
                    META-TAG PART END
        =======================================-->

        <!-- WEBPAGE TITLE -->
        <title>@yield('title')</title>

        <!--=====================================
                    CSS LINK PART START
        =======================================-->
        <!-- FAVICON -->
        <link rel="icon" href="{{asset('frontend/images/favicon.png')}}">

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
        <link rel="stylesheet" href="{{asset('frontend/css/user-auth.css')}}">
        <!--=====================================
                    CSS LINK PART END
        =======================================-->

        @livewireStyles
    </head>
    <body>
        <!--=====================================
                    USER FORM PART START
        =======================================-->
        <section class="user-form-part">
           @yield('content')
        </section>
        <!--=====================================
                    USER FORM PART END
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
    
        @livewireScripts
    </body>
</html>