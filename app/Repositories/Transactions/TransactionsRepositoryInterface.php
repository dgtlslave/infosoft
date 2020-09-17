<?php

namespace App\Repositories\Transactions;

interface TransactionsRepositoryInterface
{
    public function getTransactionsByDepositId($d);
}
