<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table='pais';
    protected $fillable=[
            'pais',
            'prefijo'
    ];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }


    public function scopeTodos($query){
        return $query->where('id','>',1);
    }
}
