<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $table = 'daily';

     protected $fillable = [
        'member_id',
        'paket_id',
        'price',        
    ];
}
