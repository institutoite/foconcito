<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //

    
    public function ordenes()
    {
        return $this->belongsToMany(Orden::class);
    }

    public function empresarios()
    {
        return $this->belongsToMany(Empresario::class);
    }

}
