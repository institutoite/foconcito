<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable=[
        'prefijo',
        'numero',
        'detalle',
        'whatsapp',
        'persona_id'
    ];  

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
