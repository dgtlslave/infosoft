<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Deposit\StoreDepositRequest;
use App\Models\Deposit;
use App\Repositories\Deposit\DepositRepositoryInterface;

class DepositController extends Controller
{

    protected $depoRepo;

    public function __construct(DepositRepositoryInterface $deposit)
    {
        $this->depoRepo = $deposit;
    }


    public function index()
    {
        return view('deposit.index');
    }

    public function create($id)
    {
        return view('deposit.create',  ['data' => $this->depoRepo->createDeposit($id)]);
    }

    public function store(StoreDepositRequest $request)
    {
        $deposit = $this->depoRepo->storeDeposit($request->validated());

        return redirect('/deposits-create' . '/' . $deposit->user_id);
    }
}
