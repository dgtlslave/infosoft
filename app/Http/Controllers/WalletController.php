<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Repositories\Wallet\WalletRepositoryInterface as WalletRepositoryInterface;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    protected $walletRepo;

    public function __construct(WalletRepositoryInterface $wallet)
    {
        $this->walletRepo = $wallet;
    }

    public function index()
    {

        $wallet = $this->walletRepo->allWallet();
        // $wallet = new WalletResource($wallet);
        return view('wallet.index', ['data' => $wallet]);

    }
}
