<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ciudad;

class Zona extends Model
{
    protected $fillable=[
        'zona', 
        'ciudad_id'
      
    ];
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function scopeTodos($query){
        return $query->where('id','>',1);
    }
}
