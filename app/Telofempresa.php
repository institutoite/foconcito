<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telofempresa extends Model
{
   protected $fillable=[
        'prefijo',
        'numero',
        'detalle',
        'empresa_id',
    ];
    
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
