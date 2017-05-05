<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{
    protected $table = 'referal';

     protected $fillable = [
        'member_id',
        'paket_id',
        'price',        
    ];
}
