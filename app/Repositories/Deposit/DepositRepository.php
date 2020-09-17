<?php

namespace App\Repositories\Deposit;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DepositRepository implements DepositRepositoryInterface {

    public function allDepositsByUser($id)
    {
        return Deposit::where(['user_id' => $id])->orderBy('created_at', 'desc')->get();
    }

    public function createDeposit($data)
    {
        return User::find($data)->with('wallets')->first();
    }

    public function storeDeposit($data)
    {
        DB::transaction(function () use ($data) {

            try {
                $deposit = Deposit::create([
                    'user_id' => $data['user_id'],
                    'wallet_id' => $data['wallet_id'],
                    'invested' => $data['amount'],
                    'percent' => 20.00,
                    'active' => 1,
                    'duration' => 10
                    ]);

                Transaction::create([
                    'user_id' => $deposit->user_id,
                    'wallet_id' => $deposit->wallet_id,
                    'deposit_id' => $deposit->id,
                    'type' => 'create_deposit',
                    'amount' => $data['amount'],
                ]);

                return $deposit;

            } catch (\Exception $e) {
                return $e;
            }
        });
    }

    public function depositsByid($id)
    {
        return Deposit::find($id)->first();
    }

}
