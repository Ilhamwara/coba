<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'paket_id',
        'amount',
        'status',
        'payment',
    ];
}
