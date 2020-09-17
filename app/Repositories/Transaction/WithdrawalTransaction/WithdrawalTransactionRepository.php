<?php

namespace App\Repositories\Transaction\WithdrawalTransaction;

use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class WithdrawalTransactionRepository implements WithdrawalTransactionRepositoryInterface
{
    public function replanishment($request, $id)
    {
        $withdrawal = $request;
        $deposit = Deposit::find($id);
        $transaction = new Transaction;
        $total = $deposit->invested - $withdrawal;
        if($total < 0) {
            return 'Insufficient funds';
        }

        DB::transaction(function () use ($deposit, $withdrawal, $total, $transaction) {

            try {
                $deposit->update(['invested' => $total]);
                $transaction::create([
                    'user_id' => $deposit->user_id,
                    'wallet_id' => $deposit->wallet_id,
                    'deposit_id' => $deposit->id,
                    'type' => 'withdrawal',
                    'amount' => $withdrawal,
                ]);

            } catch (\Exception $e) {
                return $e;
            }

        });

        return $deposit->user_id;
    }
}

