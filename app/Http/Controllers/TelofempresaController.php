<?php

namespace App\Http\Controllers;

use App\Telofempresa;
use DB;
use App\Empresa;
use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\TelofempresaActualizarRequest;
use App\Http\Requests\TelofempresaGuardarRequest;

class TelofempresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
             $telefonos= Telofempresa::where('empresa_id','=',$id)
                        ->select('id','prefijo','numero','detalle','created_at','updated_at')
                        ->orderBy('numero','desc')->paginate(10);  
        $empresa=Empresa::findOrFail($id);
        return view('telofempresa.index',compact('telefonos','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $prefijos=Pais::Todos()
                    ->select('id','prefijo','pais')
                    ->get();

        $pais_de_empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('personas.pais_id')
                   ->get()[0]->pais_id;  
        $empresa=Empresa::findOrFail($id);           

        return view('telofempresa.crear',compact('id','empresa','prefijos','pais_de_empresario'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelofempresaGuardarRequest $request)
    {
        $NuevaTelOfEmpresa=new Telofempresa;
        $NuevaTelOfEmpresa->prefijo=$request->prefijo;
        $NuevaTelOfEmpresa->numero=$request->numero;
        $NuevaTelOfEmpresa->detalle=$request->detalle;
        $NuevaTelOfEmpresa->empresa_id=$request->empresa_id;
        
        $NuevaTelOfEmpresa->save();

        return redirect()->route('numero_producto_config',$request->empresa_id)->with('mensaje','El numero telefonico ha sido guardado correctarmente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Telofempresa  $telofempresa
     * @return \Illuminate\Http\Response
     */
    public function show(Telofempresa $telofempresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Telofempresa  $telofempresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tel_a_editar=Telofempresa::findOrFail($id);

         $prefijos=Pais::Todos()
                    ->select('id','prefijo','pais')
                    ->get(); 
        $empresa_id=Telofempresa::where('id','=',$id)
                        ->select('empresa_id')
                        ->get()[0]->empresa_id;
        $empresa=Empresa::findOrFail($empresa_id); 

        return view('telofempresa.editar',compact('id','empresa','tel_a_editar','prefijos'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telofempresa  $telofempresa
     * @return \Illuminate\Http\Response
     */
    public function update(TelofempresaActualizarRequest $request, $id)
    {
            $TelOfEmpresa=Telofempresa::findOrFail($id);
            $TelOfEmpresa->prefijo=$request->prefijo;
            $TelOfEmpresa->numero=$request->numero;
            $TelOfEmpresa->detalle=$request->detalle;
            $TelOfEmpresa->save();

            $telefonos= Telofempresa::where('empresa_id','=',$TelOfEmpresa->empresa_id)
                        ->select('id','prefijo','numero','detalle','created_at','updated_at')
                        ->orderBy('numero','desc')->paginate(10); 
                
            $empresa=Empresa::findOrFail($TelOfEmpresa->empresa_id);
        return view('telofempresa.index',compact('telefonos','empresa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telofempresa  $telofempresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$empresa_id)
    {
        $Telofempresa=Telofempresa::findOrFail($id);
        $Telofempresa->delete();
        return redirect()->route('telofempresa_listar',$empresa_id)->with('mensaje','El numero telefonico ha sido guardado correctarmente');
    }
    public function telofempresas(){
         $empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('empresarios.id')
                   ->get()[0]->id;  
        //dd($empresario);            

         $empresas= DB::table('empresas')
            ->where('empresario_id','=',$empresario)
            ->select('id','empresa','logo')
            ->get();
        //dd($empresas); 
           
        return view('telofempresa.empresas',compact('empresas'));
    }
   
}

