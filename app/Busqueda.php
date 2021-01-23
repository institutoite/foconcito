<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model
{
    //
    protected $fillable=[
            'criterio',
            'persona_id',
    ];
}
