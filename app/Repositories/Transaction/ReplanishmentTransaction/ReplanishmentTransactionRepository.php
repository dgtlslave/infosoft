<?php

namespace App\Repositories\Transaction\ReplanishmentTransaction;

use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ReplanishmentTransactionRepository implements ReplanishmentTransactionRepositoryInterface
{
    public function replanishment($request, $id)
    {
        $replanishment = $request;
        $deposit = Deposit::find($id);
        $transaction = new Transaction;
        $total = $deposit->invested + $replanishment;

        DB::transaction(function () use ($deposit, $replanishment, $total, $transaction) {

            // DB::table('deposits')->update(['invested' => $total]);
            try {
                $deposit->update(['invested' => $total]);
                $transaction::create([
                    'user_id' => $deposit->user_id,
                    'wallet_id' => $deposit->wallet_id,
                    'deposit_id' => $deposit->id,
                    'type' => 'enter',
                    'amount' => $replanishment,
                ]);

            } catch (\Exception $e) {
                return $e;
            }

        });

        return $deposit->user_id;
    }
}

