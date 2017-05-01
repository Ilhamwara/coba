<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinMember extends Model
{
    protected $table = 'join_member';

    protected $fillable = [
        'parent_id',
        'member_id',
        'kiri',
        'kanan',        
        'paket',        
    ];
}
