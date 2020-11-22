<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Hash;
use App\Models\User;

class SocialiteLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        
        $user = User::firstOrNew([
            'email'=>$user->email
        ],[
            'name'=>$user->name,
            'password'=>Hash::make("password")
        ]);
        $user->save();

        Auth::login($user);
        return redirect()->back();
    }
}
