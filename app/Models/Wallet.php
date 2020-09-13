<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'balance'];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function deposits() {
        return $this->hasMany(Deposit::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
