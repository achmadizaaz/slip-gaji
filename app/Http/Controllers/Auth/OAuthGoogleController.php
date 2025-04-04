<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class OAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
           // Google user object
            $OAuth = Socialite::driver('google')->stateless()->user();
            // Cari user di database berdasarkan email google
            $user = User::where('email', $OAuth->getEmail())->first();
            // Jika ada user, lakukan generate login
            Auth::login($user);
            session()->regenerate();
        } catch (\Exception $e) {
            Log::error('Login OAuth Google: '.$e->getMessage());
            return to_route('login')->with('failed', 'Try after some time, ');
        }

        return to_route('dashboard');
    }

}
