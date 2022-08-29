<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="navbar-content">
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a class="navbar-link" href="{{route('website.home')}}">beranda</a>
                    </li>
                    <li class="navbar-item">
                        <a class="navbar-link" href="{{route('website.produk')}}">produk</a>
                    </li>
                    <li class="navbar-item">
                        <a class="navbar-link" href="{{route('website.tentang')}}">tentang kami</a>
                    </li>

                    @if(Route::has('login'))

                    @auth

                        @if(Auth::user()->roles == 'admin')

                        <li class="navbar-item">
                            <a class="navbar-link" href="{{route('admin.dashboard')}}">halaman dasbor</a>
                        </li>

                        <li class="navbar-item">
                            <a class="navbar-link" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </li>
                        @endif

                        @if(Auth::user()->roles == 'pelanggan')

                        {{-- <li class="navbar-item">
                            <a class="navbar-link" href="{{route('admin.dashboard')}}">halaman dasbor</a>
                        </li> --}}

                        <li class="navbar-item">
                            <a class="navbar-link" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </li>
                        @endif

                        @if(Auth::user()->roles == 'owner')

                        <li class="navbar-item">
                            <a class="navbar-link" href="#">halaman dasbor</a>
                        </li>

                        <li class="navbar-item">
                            <a class="navbar-link" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </li>
                        @endif

                    @endauth
                    
                    @endif

                    {{-- <li class="navbar-item dropdown">
                        <a class="navbar-link dropdown-arrow" href="#">authentic</a>
                        <ul class="dropdown-position-list">
                            <li><a href="login.html">login</a></li>
                            <li><a href="register.html">register</a></li>
                            <li><a href="reset-password.html">reset password</a></li>
                            <li><a href="change-password.html">change password</a></li>
                        </ul>
                    </li>  --}}

                     {{-- <li class="navbar-item dropdown">
                        <a class="navbar-link dropdown-arrow" href="#">blogs</a>
                        <ul class="dropdown-position-list">
                            <li><a href="blog-grid.html">blog grid</a></li>
                            <li><a href="blog-standard.html">blog standard</a></li>
                            <li><a href="blog-details.html">blog details</a></li>
                            <li><a href="blog-author.html">blog author</a></li>
                        </ul>
                    </li> --}}
                </ul>
                <div class="navbar-info-group">
                    <div class="navbar-info">
                        <i class="icofont-ui-touch-phone"></i>
                        <p>
                            <small>hubungi kami</small>
                            <span>{{$profil->nomor_hp ?? 'Nomor hp kosong'}}</span>
                        </p>
                    </div>
                    <div class="navbar-info">
                        <i class="icofont-ui-email"></i>
                        <p>
                            <small>email kami</small>
                            <span>{{$profil->email ?? 'Email kosong'}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>