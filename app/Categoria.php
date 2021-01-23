<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=[
       'categoria',
    ];

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class)->withPivot('ffin', 'orden')->withTimestamps();
    }

}
