<?php

namespace App\Repositories\Deposit;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Deposit;

class DepositRepository implements DepositRepositoryInterface {

    public function createDeposit($data)
    {
        return User::find($data)->with('wallets')->first();
    }

    public function storeDeposit($data)
    {
        $deposit = Deposit::create([
            'user_id' => $data->user_id,
            'wallet_id' => $data->wallet_id,
            'invested' => $data->amount,
            'percent' => 20.00,
            'active' => 1,
            'duration' => 10,
            'accrue_times' => 1,
        ]);

        return $deposit;
    }

}
