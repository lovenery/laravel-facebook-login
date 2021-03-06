<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SocialAccountService;
use Socialite;
class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        //$providerUser = \Socialite::driver('facebook')->user();
        //dd($providerUser->getEmail());
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect('/home');//)->to('/home');
    }
}
