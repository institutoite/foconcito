<?php

namespace App\Http\Controllers;


// include the PHP library (if not autoloaded)


use App\Mensaje;
use App\Empresario;
use App\Persona;
use Illuminate\Http\Request;

use App\Http\Requests\MensajeGuardarRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MensajeActualizarRequest;
use DB;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        if(request()->ajax()){
            $mensajes= Mensaje::
                join('empresarios','empresarios.id','=','mensajes.empresario_id')
                ->join('personas','personas.id','=','empresarios.persona_id')
                ->where('empresarios.persona_id','=',Auth::user()->persona_id) 
                ->select('mensajes.id','mensajes.nombre','mensaje')
                ->orderBy('mensajes.id','DESC');

            //dd(session);

            return datatables()->eloquent($mensajes)
                ->addColumn('btn','mensaje.acciones')
                ->rawColumns(['btn'])
                ->toJson(); 
        }

       

        return view('mensaje.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('mensaje.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MensajeGuardarRequest $request)
    {
        //dd($request->all());
        $UnMensajeNuevo=new Mensaje;
        $UnMensajeNuevo->nombre=$request->nombre;
        $UnMensajeNuevo->mensaje=$request->mensaje;
        $persona = Auth::user()->persona_id;
        //dd(Auth::user()->persona_id);
        $empresario_id=Empresario::where('persona_id','=',$persona)->select('id')->first()['id'];
        $UnMensajeNuevo->empresario_id=$empresario_id;   
        $UnMensajeNuevo->save();

        return redirect()->route('mensaje_listar')->with('mensaje','Se guardo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensaje=Mensaje::findOrFail($id);
        return  view('mensaje.mostrar',compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $mensaje_a_editar=Mensaje::findOrFail($id);
        return view('mensaje.editar',compact('mensaje_a_editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(MensajeActualizarRequest $request, $id)
    {
        Mensaje::findOrFail($id)->update($request->all());
        return redirect()->route('mensaje_listar')->with('mensaje','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mensaje::findOrFail($id)->delete();
       return redirect()->route('mensaje_listar')->with('mensaje','Registro eliminado satisfactoriamente');
    }
    public function segmentacion(){
        return view('segmentacion.segmentacion');
    }
    public static function getMensaje($id){
        //dd(Mensaje::findOrFail($id));
        return Mensaje::findOrFail($id)->toArray()['mensaje'];
    }

    public function enviar($id){

        $mensaje=Mensaje::findOrFail($id);
        $persona_actual=Auth::user()->persona_id;
        $telefonos= Persona::join('telefonos','telefonos.persona_id','=','personas.persona_id')
                        ->where('personas.persona_id','=',$persona_actual)
                        ->where('telefonos.persona_id','=',$persona_actual)
                        ->select('personas.nombre','personas.apellidos','telefonos.prefijo','telefonos.numero')->get();   
        return view('mensaje.enviar',compact('telefonos','mensaje'));
    }
     public function share($prefijo,$numero,$id){
        $mensaje=Mensaje::findOrFail($id);
        $link="https://api.whatsapp.com/send?phone=+".$prefijo.$numero."&text=". str_replace(" ","%20",$mensaje->mensaje);
        return redirect($link); 
    }

}
