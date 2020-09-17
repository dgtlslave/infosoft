<?php

namespace App\Console\Commands;

use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Accrue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:accrue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Accrues interest on a deposit once a minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deposits = Deposit::where(['active' => 1])->get();

        foreach ($deposits as $deposit) {

            $percent = ($deposit['invested'] * $deposit['percent']) / 100;
            $total = $deposit['invested'] + $percent;
            $accrueTimes = $deposit['accrue_times'];
            $accrueTimes++;
            $transaction = new Transaction;

            if($deposit['accrue_times'] + 1 < $deposit['duration']) {

                DB::transaction(function () use ($percent, $accrueTimes, $deposit, $total, $transaction) {

                    try {
                        $deposit->update([
                            'invested' => $total,
                            'accrue_times' => $accrueTimes
                        ]);

                        $transaction::create([
                            'user_id' => $deposit['user_id'],
                            'wallet_id' => $deposit['wallet_id'],
                            'deposit_id' => $deposit['id'],
                            'type' => 'accrue',
                            'amount' => $percent,
                        ]);

                        $this->info('Successfully accrued interest on the deposit id: ' . $deposit['id']);

                    } catch (\Exception $e) {
                        return $e;
                    }

                });

            } else {

                DB::transaction(function () use ($percent, $accrueTimes, $deposit, $total, $transaction) {

                    try {
                        $deposit->update([
                            'invested' => $total,
                            'accrue_times' => $accrueTimes,
                            'active' => 0
                            ]);

                        $transaction::create([
                            'user_id' => $deposit['user_id'],
                            'wallet_id' => $deposit['wallet_id'],
                            'deposit_id' => $deposit['id'],
                            'type' => 'accrue',
                            'amount' => $percent,
                        ]);

                        $transaction::create([
                            'user_id' => $deposit['user_id'],
                            'wallet_id' => $deposit['wallet_id'],
                            'deposit_id' => $deposit['id'],
                            'type' => 'close_deposit',
                            'amount' => $total,
                        ]);

                        $this->info('Successfully accrued interest on the deposit id: ' . $deposit['id'] . ' Deposit close.');

                    } catch (\Exception $e) {
                        return $e;
                    }

                });
            }
        }
        $this->info('Cron ended a job.');
    }
}
