<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodopago extends Model
{
    
    protected $fillable=[
        'metodo',
    ];

    public function orden(){
        return $this->belongsTo(Orden::class);
    } 
}
