<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable=[
        'empresa',
        'direccion',
        'votes',
        'detalle',
        'destacado',
        'visible',
        'logo',
        'empresario_id',
        'categoria_id',
        'pais_id',
        'ciudad_id',
        'zona_id'
    ];
    
    public function empresario()
    {
        return $this->belongsTo(Empresario::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
     
    public function pais()
    {
        return $this->hasOne(Pais::class);
    }

    public function ciudad()
    {
        return $this->hasOne(Ciudad::class);
    }

    public function zona()
    {
        return $this->hasOne(Zona::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function ordenes() {
        return $this->belongsToMany(Orden::class)->withPivot(['ffin'])->withTimestamps();
    }
    public function telofempresas()
    {
        return $this->hasMany(Telofempresa::class);
    }

    public function scopeNombre($query,$criterio){
        if($criterio){
            return $query->orWhere('empresa','LIKE',"%$criterio%");
        }
    }
    public function scopeDetalle($query,$criterio){
        if($criterio){
            return $query->orWhere('detalle','LIKE',"%$criterio%");
        }
    }
    public function scopeDireccion($query,$criterio){
        if($criterio){
            return $query->orWhere('direccion','LIKE',"%$criterio%");
        }
    }

    public function scopeBuscar($query, $VectorCriterio){
       for ($i=0 ; $i < count($VectorCriterio)  ; $i++ ) { 
            $query->orWhere('empresas.empresa','LIKE',"'%".$VectorCriterio[$i]."%'")
                ->orWhere('empresas.detalle','LIKE',"'%".$VectorCriterio[$i]."%'");
                //->orWhere('empresas.direccion','LIKE',"'%".$VectorCriterio[$i]."%'");            
       }
       return $query;
    }

    public function scopePaisito($query,$pais_id){
        if($pais_id==0){
            return $query->where('empresas.pais_id','>',$pais_id);
        }else{
            return $query->where('empresas.pais_id','=',$pais_id);
        }
    }
    public function scopeCiudadcito($query,$pais_id,$ciudad_id){
        if($pais_id==0){
            return $query->where('empresas.pais_id','>',$pais_id)
                         ->where('empresas.ciudad_id','>',1);
        }else{
            if($ciudad_id==0){
                return $query->where('empresas.pais_id','=',$pais_id)
                         ->where('empresas.ciudad_id','>',1);   
            }else{
                return $query->where('empresas.pais_id','=',$pais_id)
                         ->where('empresas.ciudad_id','=',$ciudad_id);   
            }
        }
    }

    public function scopeZonita($query,$pais_id,$ciudad_id,$zona_id){
        if($pais_id==0){
            return $query->where('empresas.pais_id','>',$pais_id)
                         ->where('empresas.ciudad_id','>',0)
                         ->where('empresas.zona_id','>',0);
        }else{
            if($ciudad_id==0){
                return $query->where('empresas.pais_id','=',$pais_id)
                         ->where('empresas.ciudad_id','>',0)
                         ->where('ciudads.pais_id','=',$pais_id);   
            }else{
                if($zona_id==0){
                    return $query->where('empresas.pais_id','=',$pais_id)
                         ->where('empresas.ciudad_id','=',$ciudad_id)
                         ->where('zonas.ciudad_id','=',$ciudad_id);
                }else{
                    return $query->where('empresas.pais_id','=',$pais_id)
                         ->where('empresas.ciudad_id','=',$ciudad_id)
                         ->where('empresas.zona_id','=',$zona_id);
                }
                   
            }
        }
    }
}
