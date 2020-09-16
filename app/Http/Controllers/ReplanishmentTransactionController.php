<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Transaction\ReplanishmentTransaction\ReplanishmentTransactionRepositoryInterface as Rep;

class ReplanishmentTransactionController extends Controller
{
    protected $repRepo;

    public function __construct(Rep $rep)
    {
        $this->repRepo = $rep;
    }

    public function create()
    {
        return view('transaction.replanishment.create');
    }

    public function store(Request $request, $id)
    {

        $enter = $this->repRepo->replanishment($request, $id);

    }
}
