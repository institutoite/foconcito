<?php
namespace App\Http\Controllers;
use App\Zona;
use App\Ciudad;
use App\Pais;
use App\Persona;

use Illuminate\Http\Request;
use App\Http\Requests\ZonaGuardarRequest;
use App\Http\Requests\ZonaActualizarRequest;
use Illuminate\Support\Facades\Auth;


use DB;
class ZonaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $zonas= Zona::
            join('ciudads','zonas.ciudad_id','=','ciudads.id')
            ->where('zonas.id','>',1)
            ->select('zonas.id','zonas.zona','ciudads.ciudad as ciudad');
            return datatables()->eloquent($zonas)
                ->addColumn('btn','zona.acciones')
                ->rawColumns(['btn'])
                ->toJson(); 
            
        }

        
        return view('zona.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $ciudades=Ciudad::Todos()->get();
        $paises=Pais::Todos()->get();
        return view('zona.crear')->with('ciudades',$ciudades)->with('paises',$paises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ZonaGuardarRequest $request)
    {
        //Zona::create($request->all());

        $Zona_nueva= new Zona;
        $Zona_nueva->ciudad_id=$request->ciudad_id;
        $Zona_nueva->zona=$request->zona;
        //$Zona_nueva->user_id=Auth::user()->id;

        $Zona_nueva->save();

        return redirect()->back()->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $zona=Zona::findOrFail($id);
        $ciudad=Ciudad::findOrFail($zona->ciudad_id)->ciudad;
        return  view('zona.mostrar',compact('zona','ciudad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $ciudades=Ciudad::Todos();
        $zona_a_editar=Zona::findOrFail($id);
        $paises=Pais::Todos()->get();

       // $ciudad=$zona_a_editar->ciudad;

        return view('zona.editar',compact('zona_a_editar','ciudades','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ZonaActualizarRequest $request,$id)
    {
        Zona::findOrFail($id)->update($request->all());
        return redirect()->route('zona_datatable')->with('mensaje','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
       Zona::findOrFail($id)->delete();
       return redirect()->route('zona_datatable')->with('mensaje','Registro eliminado satisfactoriamente');
    }

    public function zones_of_city($id){        
        return Zona::where('ciudad_id',$id)->get();
    }
    public function radicatoria_config(){
        $ciudades=Ciudad::Todos()->get();
        $paises=Pais::Todos()->get();
          $data=DB::table('zonas')
                ->where('ciudad_id','=',7)
                ->where('zona','LIKE','%v%')
                ->get();
            //dd($data);    
        
        return view('zona.radicatoria')->with('ciudades',$ciudades)->with('paises',$paises);
    } 
    function fetch_the_zones(Request $request){

        if($request->get('query')){
            $query=$request->get('query');
            $ciudad=$request->get('ciudad');
            $data=DB::table('zonas')
                ->where('ciudad_id','=',$ciudad)
                ->where('zona','LIKE','%'.$query.'%')
                ->get();
            //dd($data);    
                $output='<ul class="dropdown-menu" style="display:block; position:absolute;left:15px;padding:5px; hover:{background:red}">';
                foreach ($data as $row) {
                    $output.='<li>'.$row->zona.'</li>';

                }
                $output.='</ul>';
            echo $output;
        }
    }
    /*
        guarda una zona en caso de no existir
    */ 

     public function guardar_si_no_existe(Request $request)
    {
        
        $Zona = Zona::firstOrCreate(
            ['zona' => $request->zona,'ciudad_id'=>$request->ciudad_id],
            []
        );
        //dd($Zona);
        
        $Persona_id=Auth::user()->persona_id;
        //dd($Persona_id);
        $datosPersona=$request->all();
        $PersonaActualizar=Persona::findOrFail($Persona_id);
        $PersonaActualizar->pais_id=$datosPersona['pais_id'];;
        $PersonaActualizar->ciudad_id=$datosPersona['ciudad_id'];
        $PersonaActualizar->zona_id=$Zona->id;
        $PersonaActualizar->save();

        return redirect()->route('home');
    }

}


