<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface {

    public function register($data) {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($user) {
            $wallet = Wallet::create([
                'user_id' => $user->id
            ]);

            if($wallet) {
                return $user;
            }
        }
    }

}
