<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //


    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function scopeBuscarImages($query, $VectorCriterio){
          //dd($VectorCriterio[0]);
       for ($i=0 ; $i < count($VectorCriterio)  ; $i++ ) { 
            $query->Where('titulo','LIKE',"'%".$VectorCriterio[$i]."%'")
                ->orWhere('descripcion','LIKE',"'%".$VectorCriterio[$i]."%'");            
       }
       //dd($query->toSql());
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

