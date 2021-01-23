<?php

namespace App\Http\Controllers;

use App\Telefono;
use App\Persona;
use Illuminate\Http\Request;
use App\Pais;

use DB;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\TelefonoGuardarRequest;
use App\Http\Requests\TelefonoActualizarRequest;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $telefonos= Telefono::where('persona_id','=',$id)
                        ->select('id','prefijo','numero','detalle','created_at','updated_at')
                        ->orderBy('created_at','desc')->paginate(10);  
        $persona=Persona::findOrFail($id);
        return view('telefono.index',compact('telefonos','persona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        $prefijos=Pais::Todos()
                    ->select('id','prefijo','pais')
                    ->get();

        $pais_de_empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('personas.pais_id')
                   ->get()[0]->pais_id;  
        $persona=Persona::findOrFail($id);

        return view('telefono.crear',compact('id','persona','prefijos','pais_de_empresario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelefonoGuardarRequest $request)
    {

        $NuevoTelefono = new Telefono;
        $NuevoTelefono->prefijo=$request->prefijo;
        $NuevoTelefono->numero=$request->numero;
        $NuevoTelefono->detalle=$request->detalle;
        $NuevoTelefono->persona_id=$request->persona_id;
        $NuevoTelefono->save();

        return redirect()->route('telefono_listar',$request->persona_id)->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function show(Telefono $telefono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tel_a_editar=Telefono::findOrFail($id);

        $prefijos=Pais::Todos()
                    ->select('id','prefijo','pais')
                    ->get();  
        $persona_id=Telefono::where('id','=',$id)
                        ->select('persona_id')
                        ->get()[0]->persona_id;
        $persona=Persona::findOrFail($persona_id);

        return view('telefono.editar',compact('id','persona','tel_a_editar','prefijos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(TelefonoActualizarRequest $request, $id)
    {
            $Telefono=Telefono::findOrFail($id);
            $Telefono->prefijo=$request->prefijo;
            $Telefono->numero=$request->numero;
            $Telefono->detalle=$request->detalle;
            //dd($Telefono);            
            $Telefono->save();

            $telefonos= Telefono::where('persona_id','=',$Telefono->persona_id)
                        ->select('id','prefijo','numero','detalle','created_at','updated_at')
                        ->orderBy('created_at','desc')->paginate(10); 
                
            $persona=Persona::findOrFail($Telefono->persona_id);
        return view('telefono.index',compact('telefonos','persona'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$persona_id)
    {
        $Telefono=Telefono::findOrFail($id);
        $Telefono->delete();
        return redirect()->route('telefono_listar',$persona_id)->with('mensaje','El numero telefonico ha sido guardado correctarmente');
    }
    public static function telefonos($idpersona){

       // dd($idpersona);
       if(Request()->ajax()){
         $data=Telefono::where('persona_id',$idpersona)->get();
         return response()->json($data, 200);   
        } 
        $data=Telefono::where('persona_id',$idpersona)->get();
        return  $data;
        
    }
}

