<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class SocialiteController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        
        try{
            $sociaLiteUser = Socialite::driver($provider)->user();

            // dd($sociaLiteUser);

        
        } catch (\Exception $e){
            return redirect()->route('login');   
        }

        $user = User::where([
            'provider' => $provider,
            'provider_id' => $sociaLiteUser->id
        ])->first();

        if(!$user) {
            $validator = Validator::make(
                ['email' => $sociaLiteUser->getEmail()],
                ['email' => ['unique:users,email']],
                ['email.unique' => 'Tidak bisa login. Mungkin kamu sudah daftar dengan metode lain'],
            );

            if($validator->fails()) {
                return redirect()->route('login')->withErrors($validator);
            }

            $user = User::create([
                'nama' => $sociaLiteUser->name,
                'email' => $sociaLiteUser->email,
                'provider' => $provider,
                'provider_id' => $sociaLiteUser->id,
                'roles' => 'pelanggan',
                'email_verified_at' => now(),
            ]);

        }

        Auth::login($user);

        return redirect()->route('website.home');
    }
}
