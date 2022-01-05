<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialServices;

class SocialController extends Controller
{
    public function index()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('vkontakte')->user();
        $objSocial = new SocialServices();

        if ($us = $objSocial->saveSocialData($user)) {
            \Auth::login($us);
            return redirect('/');
        }
//        return back(400);
        return redirect('/login');
    }
}
