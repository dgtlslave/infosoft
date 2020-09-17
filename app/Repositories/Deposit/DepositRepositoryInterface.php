<?php

namespace App\Repositories\Deposit;

interface DepositRepositoryInterface
{
    public function allDepositsByUser($id);

    public function depositsByid($id);

    public function createDeposit($data);

    public function storeDeposit($data);
}
