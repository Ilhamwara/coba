<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = [
        'nama',
        'price',
        'daily',
        'monthly',
        'contract',
        'referal',
        'pairing',
        'max_pairing',
    ];
}
