<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('vkontakte')->user();
        $objSocial = new SocialService();

        if($notEmptyUser = $objSocial->saveSocialData($user)) {
            \Auth::login($notEmptyUser);
            return redirect('/');
        }
        return redirect('/login');
    }
}
