@extends('layout.auth_front_layout')

@section('title','Login')

@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
            <div class="user-form-logo">
                <a href="{{route('website.home')}}">
                    @if($profil)
                    <img src="{{ Storage::url($profil->logo)}}" alt="logo">
                    @else
                    <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
                    @endif
                </a>
            </div>
            <div class="user-form-card">
                <div class="user-form-title">
                    <h2>Selamat Datang!</h2>
                    <p>Silahkan login</p>
                </div>
                <div class="user-form-group">
                    <ul class="user-form-social">
                        <li><a href="/auth/facebook" class="facebook"><i class="fab fa-facebook-f"></i>login dengan facebook</a></li>
                        <li><a href="{{route('auth.google')}}" class="google"><i class="fab fa-google"></i>login dengan google</a></li>
                    </ul>
                    <div class="user-form-divider">
                        <p>or</p>
                    </div>
                    <form class="user-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email Anda" value="{{old('email')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password Anda" value="{{old('password')}}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="check">Remember Me</label>
                        </div>
                        <div class="form-button">
                            <button type="submit">login</button>
                            <p>Lupa password?<a href="{{route('password.request')}}">Silahkan reset</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="user-form-remind">
                <p>Belum punya akun?<a href="{{route('register')}}">Daftar disini</a></p>
            </div>
            <div class="user-form-footer">
                <p>Manisan Putra Deli | &COPY; Copyright <a href="#">2022</a></p>
            </div>
        </div>
    </div>
</div>
@endsection