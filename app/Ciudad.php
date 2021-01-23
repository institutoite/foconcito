<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Zona;

class Ciudad extends Model
{
    protected $fillable=[
        'ciudad',
        'pais_id'
    ];
    
    public function pais(){
        $this->belongsTo(Pais::class);
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    } 

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function scopeTodos($query){
        return $query->where('id','>','1');
    }
}
