<div class="container">
    <div class="header-content">
        <div class="header-media-group">
            <button class="header-user"><img src="{{asset('frontend/images/user.png')}}" alt="user"></button>
            <a href="index.html"><img src="{{asset('frontend/images/logo.png')}}" alt="logo"></a>
            <button class="header-src"><i class="fas fa-search"></i></button>
        </div>

        <a href="index.html" class="header-logo">
            <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
        </a>
       

        @if(Route::has('login'))

        @auth

            @if(Auth::user()->roles == 'pelanggan')
            <a href="{{route('website.profile.user', Auth::user()->id)}}" class="header-widget" title="My Account">
                <img src="@if(Auth::user()->foto_profil)  {{ Storage::url(Auth::user()->foto_profil) }} @else {{asset('frontend/images/user.png')}} @endif" alt="user">
                <span>{{Auth::user()->nama}}</span>
            </a>

            @endif

            @if(Auth::user()->roles == 'admin')
            <a href="{{route('website.profile.user', ['id' => Auth::user()->id])}}" class="header-widget" title="My Account">
                <img src="@if(Auth::user()->foto_profil)  {{ Storage::url(Auth::user()->foto_profil) }} @else {{asset('frontend/images/user.png')}} @endif" alt="user">
                <span>{{Auth::user()->nama}}</span>
            </a>
            @endif


            @if(Auth::user()->roles == 'owner')
            <a href="{{route('website.profile.user', Auth::user()->id)}}" class="header-widget" title="My Account">
                <img src="@if(Auth::user()->foto_profil)  {{ Storage::url(Auth::user()->foto_profil) }} @else {{asset('frontend/images/user.png')}} @endif" alt="user">
                <span>{{Auth::user()->nama}}</span>
            </a>
            @endif
            
            @endauth

            @else
            <a href="{{route('login')}}" class="header-widget" title="Login">
                <span>Login</span>
                
            </a>
            <a class="header-widget" title="My Account">
                <span>| |</span>
                
            </a>
            
            <a href="{{route('register')}}" class="header-widget" title="Register">
                <span>Register</span>
            </a>

        @endif

        

        <form class="header-form">
            <input type="text" placeholder="Search anything...">
            <button><i class="fas fa-search"></i></button>
        </form>

        <div class="header-widget-group">
            {{-- <a href="compare.html" class="header-widget" title="Compare List">
                <i class="fas fa-random"></i>
                <sup>0</sup>
            </a>
            <a href="wishlist.html" class="header-widget" title="Wishlist">
                <i class="fas fa-heart"></i>
                <sup>0</sup>
            </a> --}}
            <button class="header-widget header-cart" title="Cartlist">
                <i class="fas fa-shopping-basket"></i>
                <sup>9+</sup>
                <span>total price<small>$345.00</small></span>
            </button>
        </div>
    </div>
</div>