<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potencialidad extends Model
{
    
    
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }
    
}
