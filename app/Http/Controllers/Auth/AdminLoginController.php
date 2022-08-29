<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN;

    // protected function redirectTo()
    // {
    //     if (Auth::user()->roles == 'admin') {
    //         return '/admin';
    //     }
    //     return '/home';
    // }

    public function __construct()
    {
        $this->redirectTo = route('admin.dashboard');
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        
        // $profil = ProfilTokoModels::get()->first();
        return view('admin.auth.login');
    }
}
