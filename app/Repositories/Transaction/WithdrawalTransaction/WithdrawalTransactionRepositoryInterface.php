<?php

namespace App\Repositories\Transaction\WithdrawalTransaction;

interface WithdrawalTransactionRepositoryInterface
{
    public function withdrawal($request, $id);
}
