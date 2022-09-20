<div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    <button class="header-user">
                        @if($profil)
                        <img src="{{ Storage::url($profil->logo)}}" alt="logo">
                        @else
                        <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
                        @endif
                    </button>
                    <a href="{{route('website.home')}}">
                        @if($profil)
                        <img src="{{ Storage::url($profil->logo)}}" alt="logo">
                        @else
                        <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
                        @endif
                    </a>
                    <button class="header-src"><i class="fas fa-search"></i></button>
                </div>
        
                <a href="{{route('website.home')}}" class="header-logo">
                    @if($profil)
                    <img src="{{ Storage::url($profil->logo)}}" alt="logo">
                    @else
                    <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
                    @endif
                    
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
                @endauth
                
                    
        
                @endif
        
                
        
                <form class="header-form">
                    {{-- <input type="text" placeholder="Selamat berbelanja!" disabled> --}}
                    {{-- <button><i class="fas fa-search"></i></button> --}}
                </form>
        
                <div class="header-widget-group">
                    {{-- <a href="{{route('website.coming-soon')}}" class="header-widget" title="Compare List">
                        <i class="fas fa-random"></i>
                        <sup>0</sup>
                    </a> --}}
                    {{-- <a href="{{route('website.coming-soon')}}" class="header-widget" title="Wishlist">
                        <i class="fas fa-heart"></i>
                        <sup>0</sup>
                    </a> --}}
                    <button class="header-widget header-cart" title="Cartlist">
                        <i class="fas fa-shopping-basket"></i>
                        <sup>{{Cart::count()}}</sup>
                        <span>total harga<small>Rp.{{ number_format(Cart::subtotal()) }}</small></span>
                    </button>
                </div>
            </div>
        </div>
    </header>   
</div>
