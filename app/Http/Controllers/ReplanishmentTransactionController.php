<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Deposit\DepositRepositoryInterface as Deposit;
use App\Repositories\Transaction\ReplanishmentTransaction\ReplanishmentTransactionRepositoryInterface as Rep;

class ReplanishmentTransactionController extends Controller
{
    protected $repRepo;
    protected $depoRepo;

    public function __construct(Rep $rep, Deposit $deposit)
    {
        $this->repRepo = $rep;
        $this->depoRepo = $deposit;
    }

    public function create()
    {
        return view('transaction.replanishment.create', ['data' => $this->depoRepo->depositsByid(request()->route('deposit'))]);
    }

    public function store(Request $request, $id)
    {
        $enter = $this->repRepo->replanishment($request->get('replenish_amount'), request()->route('deposit'));

        return redirect()->to('deposits/' . $enter);
    }
}
