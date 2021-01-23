<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable=[
        'nombre',
        'mensaje',
        'mensajemostrable',
        'empresario_id'
    ];

    
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withPivot('telefono_id')->withTimestamps();
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }

    public function empresario()
    {
        return $this->belongsTo(Empresario::class);
    }
    
}
