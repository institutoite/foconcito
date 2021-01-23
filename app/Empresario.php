<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresario extends Model
{
    
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }

    public function servicios()
    {
        return $this->hasMany(servicio::class);
    }
   
}
