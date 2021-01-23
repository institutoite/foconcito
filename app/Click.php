<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    //
    protected $fillable=[
        'empresa_id',
        'persona_id',
    ];
}
