<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Zona;
use App\Telefono;
use App\Ciudad;

use App\Cliente;
use App\Empresario;
use App\Pais;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PersonaGuardarRequest;
use App\Http\Requests\PersonaActualizarRequest;

use DB;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(request()->ajax()){
            $persona_actual=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('personas.id')
                   ->get()[0]->id;  
            $Personas= Persona::
                where('personas.persona_id','=',$persona_actual)
                ->select('personas.id','personas.nombre','personas.apellidos',DB::raw('DATE_FORMAT(fechanacimiento,"%Y-%m-%d") as fechanacimiento'),'genero');
            $personas= datatables()->eloquent($Personas)
                ->addColumn('btn','persona.acciones')
                ->rawColumns(['btn'])->toJson();
            return $personas;  
        }
        return view('persona.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::Todos()->get();
        $ciudades=Ciudad::Todos()->get();
        $zonas=Zona::Todos()->get();
        return view('persona.crear')->with('ciudades',$ciudades)->with('zonas',$zonas)->with('paises',$paises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaGuardarRequest $request)
    {
        
        //$cantidadPhone=count($request->detalle);

        $datosPersona=request()->except('_token');
        $NuevaPersona=new  Persona;

        $NuevaPersona->nombre=$datosPersona['nombre'];
        $NuevaPersona->apellidos=$datosPersona['apellidos'];
        
        $NuevaPersona->fechanacimiento=\Carbon\Carbon::parse($datosPersona['fechanacimiento'])->format('d M Y');
        $NuevaPersona->tipo=$datosPersona['tipo'];
        $NuevaPersona->genero=$datosPersona['genero'];
        $NuevaPersona->pais_id=$datosPersona['pais_id'];;
        $NuevaPersona->ciudad_id=$datosPersona['ciudad_id'];
        $NuevaPersona->zona_id=$datosPersona['zona_id'];
        
        /** Aqui verificamos que persona_id tiene el usuario actual */
          $persona_actual_usuario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('personas.id')
                   ->get()[0]->id;  
        
        $NuevaPersona->persona_id= $persona_actual_usuario;

        $NuevaPersona->save(); 
        $id_persona=$NuevaPersona->id;

       /* for ($i=0; $i < $cantidadPhone ; $i++) { 
            $phone = new Telefono;
            $phone->persona_id=$id_persona;
            $phone->detalle=$request->detalle[$i];
            $phone->numero=$request->telefono[$i];
            $phone->save();
        }*/

        if ($request->tipo=="cliente"){
            $NuevoCliente=new Cliente;
            $NuevoCliente->persona_id=$id_persona;
            $NuevoCliente->save();
        }
        if ($request->tipo=="empresario"){
            $NuevoEmpresario=new Empresario;
            $NuevoEmpresario->persona_id=$id_persona;
            $NuevoEmpresario->save();
        }

        $id=$id_persona;

       return redirect()->route('telefono_crear',$id)->with('mensaje','Los datos de persona han sido guardados correctamente'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Persona_a_mostrar=Persona::findOrFail($id);
        //$this->authorize('permitido',$Persona_a_mostrar);
        $persona=Persona::where('personas.id',$id)
                        ->join('pais','pais.id','=','personas.pais_id')
                        ->join('ciudads','ciudads.id','=','personas.ciudad_id')
                        ->join('zonas','zonas.id','=','personas.zona_id')
                        ->select('personas.id','personas.nombre','personas.apellidos',
                            'personas.fechanacimiento','tipo','pais.pais','ciudads.ciudad','zonas.zona'
                            ,'personas.created_at','personas.updated_at')
                        ->get()->first();
        
        $telefonos=Persona::findOrFail($id)->telefonos()->get();
        
        

        return view('persona.mostrar', compact('persona','telefonos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $paises=Pais::Todos()->get();
         $ciudades=Ciudad::all();
         $zonas=Zona::all();
         $persona_a_editar=Persona::findOrFail($id);
         $this->authorize('permitido',$persona_a_editar);


         return view('persona.editar',compact('paises','ciudades','zonas','persona_a_editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaActualizarRequest $request,$id)
    {

       // dd($id);    
        $datosPersona=$request->except('_token','detalle','telefono');
        $PersonaActualizar=Persona::findOrFail($id);

        $PersonaActualizar->nombre=$datosPersona['nombre'];
        $PersonaActualizar->apellidos=$datosPersona['apellidos'];
        
        $PersonaActualizar->fechanacimiento=\Carbon\Carbon::parse($datosPersona['fechanacimiento']);
        $PersonaActualizar->tipo=$datosPersona['tipo'];
        $PersonaActualizar->genero=$datosPersona['genero'];
        $PersonaActualizar->pais_id=$datosPersona['pais_id'];;
        $PersonaActualizar->ciudad_id=$datosPersona['ciudad_id'];
        $PersonaActualizar->zona_id=$datosPersona['zona_id'];
        $PersonaActualizar->save();

        //$IdsTelefnoAntiguos=Telefono::where('persona_id',$id)->select('id')->get()->toArray();
       
        return redirect('/personas')->with('mensaje','Los datos se actualizaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona_a_eliminar=Persona::findOrFail($id);
        $this->authorize('permitido',$persona_a_eliminar);

        DB::table('clientes')->where('persona_id','=',$id)->delete();
        DB::table('telefonos')->where('persona_id','=',$id)->delete();

        $persona_a_eliminar->delete();
        return view('persona.index');
    }

    public function telefonos(Request $request){
        if($request->ajax()){
            $phones=DB::table('telefonos')
                    ->join('personas','personas.id','=','telefonos.persona_id')
                    ->where('personas.id','=',$request->id)
                    ->select('telefonos.detalle','telefonos.numero')
                    ->get();
        return response()->json($phones, 200);
        }
    }

    public function informar($id){
        $phones=DB::table('telefonos')
                    ->join('personas','personas.id','=','telefonos.persona_id')
                    ->where('personas.id','=',$id)
                    ->select('telefonos.id','telefonos.detalle','telefonos.numero','telefonos.created_at','telefonos.updated_at')
                    ->get();  
        $persona=Persona::findOrFail($id);                    

        return view('persona.informar',compact('phones','persona'));
    }

    public function enviosms($telefono_id,$persona_id,$mensaje_id){ //$persona_id,$telefono_id,$mensaje_id

        $vector=[
            'telefono_id'=>$telefono_id,//$request->$persona_id,
            'persona_id'=>$persona_id,//$request->$persona_id,
            'mensaje_id'=>$mensaje_id//$request->$mensaje_id
        ];

        $persona_a_mensajear=Persona::find($persona_id);
        $persona_a_mensajear->mensajes()->attach($mensaje_id, ['telefono_id' => $telefono_id]);
        //dd($vector);
        //return Redirect::to('http://www.google.com');//https://api.whatsapp.com/send?phone=59171039910
        return response()->json($vector,200);
    }

    public function perfil(){
           $empresario_actual=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('personas.id')
                   ->get()[0]->id;  

            //$Persona_a_mostrar=Persona::findOrFail($empresario_actual);
        
            $persona=Persona::where('personas.id',$empresario_actual)
                        ->join('pais','pais.id','=','personas.pais_id')
                        ->join('ciudads','ciudads.id','=','personas.ciudad_id')
                        ->join('zonas','zonas.id','=','personas.zona_id')
                        ->select('personas.id','personas.nombre','personas.apellidos',
                            'personas.fechanacimiento','personas.genero','tipo','pais.pais','ciudads.ciudad','zonas.zona'
                            ,'personas.created_at','personas.updated_at')
                        ->get()->first();
            $telefonos=Persona::findOrFail($empresario_actual)->telefonos()->get();
        $paises=Pais::Todos()->get();
        $ciudades=Ciudad::Todos()->get();
        $zonas=Zona::Todos()->get();

        return view('persona.perfil', compact('persona','telefonos','paises','zonas','ciudades'));
    }

    public function GuardarResidencia(PersonaActualizarRequest $request,$id)
    {
        $datosPersona=request();
        $PersonaActualizar=Persona::findOrFail($id);

        
        $PersonaActualizar->pais_id=$datosPersona['pais_id'];;
        $PersonaActualizar->ciudad_id=$datosPersona['ciudad_id'];
        $PersonaActualizar->zona_id=$datosPersona['zona_id'];
        $PersonaActualizar->save();

        return redirect('/personas')->with('mensaje','Los datos se actualizaron correctamente');
    }
}
