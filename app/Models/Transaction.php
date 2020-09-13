<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'user_id', 'wallet_id', 'deposit_id', 'amount'];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function wallets() {
        return $this->belongsTo(Wallet::class);
    }

    public function deposits() {
        return $this->belongsTo(Deposit::class);
    }
}
