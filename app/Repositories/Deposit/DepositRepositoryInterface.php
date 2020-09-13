<?php

namespace App\Repositories\Deposit;

interface DepositRepositoryInterface
{
    public function createDeposit($data);

    public function storeDeposit($data);
}
