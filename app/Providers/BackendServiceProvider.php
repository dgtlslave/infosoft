<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Wallet\WalletRepositoryInterface',
            'App\Repositories\Wallet\WalletRepository'
        );

        $this->app->bind(
            'App\Repositories\Deposit\DepositRepositoryInterface',
            'App\Repositories\Deposit\DepositRepository'
        );

        $this->app->bind(
            'App\Repositories\Transaction\ReplanishmentTransactionRepositoryInterface',
            'App\Repositories\Transaction\ReplanishmentTransactionRepository'
        );
    }
}
