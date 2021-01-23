<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use \Carbon\Carbon;

class Persona extends Model
{
    protected $fillable=[
            'nombre',
            'apellidop',
            'apellidom',
            'fechanacimiento',
            'tipo',
            'pais_id',
            'ciudad_id',
            'zona_id',
            'genero',
    ];

    protected $dates=['fechanacimiento'];

    public function pais(){ 
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
    
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

    public function empresario()
    {
        return $this->hasOne(Empresario::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function mensajes()
    {
        return $this->belongsToMany(Mensaje::class)->withPivot('telefono_id')->withTimestamps();;
    }

    public function parent(){
        return $this->belongsTo(Persona::class);
    }

    public function personas(){
       return $this->hasMany(Persona::class);
    }

   
    
    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SCOPES POR REGION %%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
    public function scopePaisito($query, $pais){
        if($pais==0){
            return $query->where('pais_id','>',0);
        }else{
            return $query->where('pais_id','=',$pais);
        }
    }
    public function scopeCiudadcito($query, $ciudad){
        if($ciudad==0){
            return $query->where('ciudad_id','>',0);
        }else{
            return $query->where('ciudad_id','=',$ciudad);
        }
    }
    public function scopeZonita($query, $zona){
        if($zona==0){
            return $query->where('zona_id','>',0);
        }else{
            return $query->where('zona_id','=',$zona);
        }
    }
    public function scopeClientito($query){
        return $query->where('tipo','=','cliente');
    }
    public function scopeEmpresario($query){
        return $query->where('tipo','=','empresario');
    }

    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN DE SCOPES POR REGION  */

    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SCOPES POR Fecha %%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

    public function scopeEdad($query,$edad){
        
        if($edad==0){
           return $query->where('fechanacimiento', '>', 0);
        }else{
            
            if($edad)
            {
                switch ($edad) {
                    case 1:
                        $EdadIni=0;
                        $EdadFin=10;
                        break;
                    case 2:
                        $EdadIni=11;
                        $EdadFin=20;
                        break;
                    case 3:
                        $EdadIni=21;
                        $EdadFin=30;
                        break;
                    case 4:
                        $EdadIni=31;
                        $EdadFin=50;
                        break;
                    case 5:
                        $EdadIni=41;
                        $EdadFin=50;    
                    break;
                    case 6:
                        $EdadIni=51;
                        $EdadFin=60;    
                    break;
                    case 7:
                        $EdadIni=61;
                        $EdadFin=70;    
                    break;
                    case 8:
                        $EdadIni=71;
                        $EdadFin=120;    
                    break;
                    default:
                        $EdadIni=0;
                        $EdadFin=120;    
                    break;
                        break;
                } 
                
                return $query->where((DB::raw('year(DATE(fechanacimiento))')),'>=',\Carbon\Carbon::now()->year-$EdadFin)
                             ->where((DB::raw('year(DATE(fechanacimiento))')),'<=',\Carbon\Carbon::now()->year-$EdadIni) ;   
            }    
        }
    }

    public function scopeEdades($query, $EdadIni,$EdadFin)
    {
        if($EdadFin){
            dd("Entre al fin");
            if($EdadIni){
               return $query->where((DB::raw('year(DATE(fechanacimiento))')),'>=',\Carbon\Carbon::now()->year-$EdadFin)
                        ->where((DB::raw('year(DATE(fechanacimiento))')),'<=',\Carbon\Carbon::now()->year-$EdadIni) ;     
            }
        }
        
        
    }

    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SCOPES POR EDAD %%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SCOPES POR FECHA DE REGISTRO %%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

    public function scopeRegistro($query,$registro){

       // dd($registro);

         if($registro==0){
          $c=$query->where('personas.created_at','>','2000-01-01');
          return $c;
        }else{
            if($registro)
            {
                
                switch ($registro) {
                    case 1:
                        $FechaIni=Carbon::today()->format('Y-m-d');
                        $FechaFin=Carbon::today()->format('Y-m-d');
                        break;
                    case 2:
                        $FechaIni=Carbon::yesterday()->format('Y-m-d');
                        $FechaFin=Carbon::yesterday()->format('Y-m-d');
                        break;
                    case 3:
                        $FechaIni=Carbon::now()->previousWeekendDay()->format('Y-m-d');
                        $FechaFin=Carbon::now()->nextWeekendDay()->format('Y-m-d');
                        break;
                    case 4:
                        $FechaIni=Carbon::now()->firstOfMonth()->format('Y-m-d');
                        $FechaFin=Carbon::now()->nextWeekendDay()->format('Y-m-d');
                        break;
                    case 5:
                        $FechaIni=Carbon::now()->firstOfYear()->format('Y-m-d');
                        $FechaFin=Carbon::now()->lastOfYear()->format('Y-m-d') ;    
                    break;
                } 
                return $query->whereDate('personas.created_at','<=',$FechaFin)
                             ->whereDate('personas.created_at','>=',$FechaIni);   
            }    
        }
    }

    public function scopeRegistros($query, $FechaIni,$FechaFin){
        if($FechaIni){
            if($FechaIni){
                return $query->whereDate('personas.created_at','<=',$FechaFin)
                     ->whereDate('personas.created_at','>=',$FechaIni);
            }
        }
        
    }

    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SCOPES POR FECHA DE REGISTRO %%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
}
