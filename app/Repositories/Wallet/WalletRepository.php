<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet;

class WalletRepository implements WalletRepositoryInterface {

    public function allWallet() {

        return Wallet::all();

    }

}
