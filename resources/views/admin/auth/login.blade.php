@extends('layout.auth_back_layout')



@section('content')

<div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card radius-15">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5">
                                <div class="text-center">
                                    <img src="{{asset('backend/assets/images/logo-icon.png')}}" width="80" alt="">
                                    <h3 class="mt-4 font-weight-bold">Selamat Datang Kembali</h3>
                                </div>
                                
                                {{-- <div class="input-group shadow-sm rounded mt-5">
                                    <div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="{{asset('backend/assets/images/icons/search.svg')}}" alt="" width="16"></span>
                                    </div>
                                    <input type="button" class="form-control  border-0" value="Log in dengan google">
                                </div>
                                <div class="login-separater text-center"> <span>ATAU LOGIN DENGAN EMAIL</span>
                                    <hr/>
                                </div> --}}

                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group mt-4">
                                    <label>Email Address</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email Anda" value="{{old('email')}}" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password Anda" value="{{old('password')}}" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="check">Ingat Saya</label>
                                        </div>
                                    </div>
                                    <div class="form-group col text-right"> <a href="{{route('password.request')}}"><i class='bx bxs-key mr-2'></i>Lupa Password?</a>
                                    </div>
                                </div>
                                <div class="btn-group mt-3 w-100">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                    <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                                <hr>
                                {{-- <div class="text-center">
                                    <p class="mb-0">Don't have an account? <a href="authentication-register.html">Sign up</a>
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{asset('backend/assets/images/login-images/login-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection