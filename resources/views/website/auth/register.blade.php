@extends('layout.auth_front_layout')

@section('title','Daftar Akun')

@section('content')
<?php
use App\Models\SosmedTokoModel;
use App\Models\ProfilTokoModels;
use App\Models\Produk;

$sosmed_toko = SosmedTokoModel::get();
$profil = ProfilTokoModels::get()->first();


?>

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
                    <h2>Register!</h2>
                    <p>Daftarkan akun pribadimu dan selamat berbelanja</p>
                </div>
                <div class="user-form-group">
                    {{-- <ul class="user-form-social">
                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>login with facebook</a></li>
                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>login with twitter</a></li>
                        <li><a href="#" class="google"><i class="fab fa-google"></i>login with google</a></li>
                        <li><a href="#" class="instagram"><i class="fab fa-instagram"></i>login with instagram</a></li>
                    </ul> --}}
                    {{-- <div class="user-form-divider">
                        <p>or</p>
                    </div> --}}
                    <form class="user-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror " placeholder="Masukkan nama lengkap Anda" value="{{old('nama')}}">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
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
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi password Anda" value="{{old('password_confirmation')}}">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-button">
                            <button type="submit">Register</button>
                           
                        </div>
                    </form>
                </div>
            </div>
            <div class="user-form-remind">
                <p>Sudah punya akun?<a href="{{route('login')}}">Login disini</a></p>
            </div>
            <div class="user-form-footer">
                <p>Manisan Putra Deli | &COPY; Copyright by <a href="#">2022</a></p>
            </div>
        </div>
    </div>
</div>
@endsection