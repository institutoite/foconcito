<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    

    public function persona()
    {
        return $this->hasOne(Persona::class);
    }
    public function potencialidades()
    {
        return $this->belongsToMany(Pontecialidad::class)->withTimestamps();
    }
    
    public function mensajes()
    {
        return $this->belongsToMany(Mensaje::class);
    }
    
    
}
