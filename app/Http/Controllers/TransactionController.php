<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Transactions\TransactionsRepositoryInterface as Transactions;

class TransactionController extends Controller
{

    protected $transRepo;

    public function __construct(Transactions $transactions)
    {
        $this->transRepo = $transactions;
    }

    public function index()
    {
        return view('transactions.index', ['data' => $this->transRepo->getTransactionsByDepositId(request()->route('deposit'))]);
    }
}
