<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialServices
{
    public function saveSocialData($user)
    {
        if ($user->getEmail() !== null and $user->getEmail() !== 0) {
            $email = $user->getEmail();
        } else {
            $email = null;
        }

        $name = $user->getName();
        $avatar = $user->getAvatar();

        $password = Hash::make('12345678');

        $u = User::where('name', $name)->first();

        if ($u) {
            return $u->fill(['name' => $name, 'avatar' => $avatar]);
        }

        return User::firstOrCreate([
            'name' => $name,
            'email' => $email,
            'avatar' => $avatar,
            'password' => $password
        ]);
    }
}
