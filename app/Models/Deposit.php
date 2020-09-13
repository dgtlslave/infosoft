<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'wallet_id', 'invested', 'percent', 'active', 'duration', 'accrue_times'];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function wallets() {
        return $this->belongsTo(Wallet::class);
    }

    public function transations() {
        return $this->hasMany(Transaction::class);
    }
}
