<?php

namespace App\Repositories\Transactions;

use App\Models\Transaction;

class TransactionsRepository implements TransactionsRepositoryInterface {

    public function getTransactionsByDepositId($id)
    {
        return Transaction::where(['deposit_id' => $id])->get();
    }

}




