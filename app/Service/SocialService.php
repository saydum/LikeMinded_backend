<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{
    public function saveSocialData($user)
    {
        if ($user->getEmail() !== null and $user->getEmail() !== 0) {
            $email = $user->getEmail();
        } else {
            $email = null;
        }
        $userId = $user->getId();
        $name = $user->getName();
        $avatar = $user->getAvatar();



        $password = Hash::make('12345678');

        $userModel = User::where('name', $name)->first();

        if($userModel) {
            return $userModel->fill(['name' => $name, 'avatar' => $avatar]);
        }

        return User::firstOrCreate([
            'user_id' => $userId,
            'name' => $name,
            'email' => $email,
            'avatar' => $avatar,
            'password' => $password
        ]);
    }
}
