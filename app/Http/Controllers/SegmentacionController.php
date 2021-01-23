<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Persona ;
use App\Telefono ;
use App\Pais ;
use App\Zona;
use DB;

class SegmentacionController extends Controller
{
    public function segmentacion($id)
    {
        $ciudades=Ciudad::all();
        $zonas=Zona::all();
        $paises=Pais::all();
        return view('segmentacion.segmentacion',compact('ciudades','zonas','paises','id'));

    }
    public function segmentar(Request $request){
        //dd($request->all());
        $mensaje_id = $request->mensaje_id;
        //DB::enableQueryLog();

        $array_IN=DB::table('mensaje_persona')->where('mensaje_id','=',$mensaje_id)
                            ->select('telefono_id')->get();
        //dd(json_decode(json_encode($array_IN),true));


           $personas=Persona:://join('mensaje_persona','personas.id','=','mensaje_persona.persona_id')
                            //->join('telefonos','telefonos.id','=','mensaje_persona.telefono_id')
                             Paisito($request->pais_id)
                            ->Ciudadcito($request->ciudad_id)
                            ->Zonita($request->zona_id)
                            ->Edad($request->edad_id)
                            ->Edades($request->edadinicial,$request->edadfinal)
                            ->Registro($request->registro_id)
                            ->Registros($request->fechainicial,$request->fechafinal)
                            //->join('personas','personas.id','=','mensaje_persona.persona_id')
                            
                            ->whereNotIn('telefonos.id', json_decode(json_encode($array_IN),true))
                            ->get();     

        return view('segmentacion.bombardear', compact('personas','mensaje_id'));
    }

    

}
