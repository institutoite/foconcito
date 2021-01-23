<?php

namespace App\Http\Controllers;

use App\Orden;
use App\Empresario;
use App\Pago;
use App\Metodopago;
use App\Empresa;


use DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\PagoGuardarRequest;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $ordenes= Orden::
             join('empresarios','ordens.empresario_id','=','empresarios.id')
            ->join('pagos','ordens.id','=','pagos.orden_id')
            ->join('metodopagos','pagos.metodopago_id','=','metodopagos.id')
            ->join('personas','personas.id','=','empresarios.persona_id')
            ->join('empresa_orden','ordens.id','=','empresa_orden.orden_id')
            ->join('empresas','empresas.id','=','empresa_orden.empresa_id')
            ->select('ordens.id',DB::raw("CONCAT(personas.nombre,' ',personas.apellidos) as nombre")
                    ,'empresas.empresa','ordens.created_at as inicio','empresa_orden.ffin as fin');
            return datatables()->eloquent($ordenes)
                ->addColumn('btn','orden.acciones')
                ->rawColumns(['btn'])
                ->toJson(); 
        }
        return view('orden.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagoGuardarRequest $request)
    {

        $datospago=request()->except('_token');
        if($request->hasFile('comprobante')){
            $datospago['comprobante']=$request->file('comprobante')->store('comprobantes','public');
           // dd($datospago);
        }
        $NuevoOrden=new Orden();
        
        $Empresario_id= Empresario::where('persona_id','=',Auth::user()->persona_id)->first()->id;
        $NuevoOrden->empresario_id=$Empresario_id;
        $NuevoOrden->estado='PORVERIFICAR';
        $NuevoOrden->save();
        $orden_id=$NuevoOrden->id;

        $NuevoPago=new Pago();
        $NuevoPago->orden_id=$orden_id;
        $NuevoPago->comprobante=$datospago['comprobante'];
        $NuevoPago->metodopago_id=$datospago['metodopago_id'];
        $NuevoPago->save();

        $metodos=Metodopago::all();
        
        return redirect()->route('pago_formas')->with('mensaje','Tu comprobante ha sido subido correctamente: Ahora está en REVISION')
                         ->with('metodos',$metodos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
    public function ordenes_empresario(){
        $empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('empresarios.id')
                   ->get()[0]->id;  
        //dd($empresario);

        $ordenes_verificadas=Orden::where('empresario_id','=',$empresario)
                       ->where('estado','=','VERIFICADO')
                        ->select('id','estado','created_at','updated_at')->get();
        
        $empresas_no_published=Empresa::where('empresario_id','=',$empresario)->get();

        return view('orden.asignar',compact('ordenes_verificadas','empresas_no_published'));
    }
}
