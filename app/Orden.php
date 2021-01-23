<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    
    protected $fillable=[
        'empresario_id',
        'estado'
    ];

    public function meotopago(){
        return $this->hasOne(Metodopago::class);
    }

    public function empresario(){
        return $this->belongsTo(Empresario::class);

    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class)->withPivot('empresa_id')->withTimestamps();
    }

    public function empresas() {
        return $this->belongsToMany(Empresa::class);
    }
}
