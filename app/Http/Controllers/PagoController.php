<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Orden;
use App\Metodopago;
use App\Servicio;
use App\User;
use App\Constante;



use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
        
            $pagos= Pago::
             join('ordens','ordens.id','=','pagos.orden_id')
            ->join('empresarios','empresarios.id','=','ordens.empresario_id')
            ->join('personas','personas.id','=','empresarios.persona_id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('metodopagos','metodopagos.id','=','pagos.metodopago_id')
            ->select('pagos.id',DB::raw("CONCAT(personas.nombre,' ',personas.apellidos) as nombre"),
                    'pagos.created_at','metodopagos.metodo','pagos.monto');
            
        
              $datos= datatables()->eloquent($pagos)
                ->addColumn('btn','pago.acciones')
                ->rawColumns(['btn','comprobante'])
                ->toJson();
                return $datos;   
        }
        return view('pago.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $MetodoPago=Metodopago::all();
        return view("pago.crear",compact('MetodoPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $pago= DB::table('pagos')
            ->join('ordens','ordens.id','=','pagos.orden_id')
            ->join('empresarios','empresarios.id','=','ordens.empresario_id')
            ->join('personas','personas.id','=','empresarios.persona_id')
            ->join('metodopagos','metodopagos.id','=','pagos.metodopago_id')
            ->where('pagos.id','=',$id)
            ->select('pagos.id',DB::raw("CONCAT(personas.nombre,' ',personas.apellidos) as nombre"),
                    'pagos.created_at','metodopagos.metodo','pagos.comprobante','pagos.monto')
            ->get();
            $costo=Constante::where('constante','=','costomensual')->get()->first()->valor;
            $user= Auth::user();


            
        return view('pago.mostrar', compact('pago','costo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    public function verificar(Request $request)
    {
        $datos_pagos=request()->except('_token');
        $pago=Pago::findOrFail($request->id);
        $pago->update($datos_pagos);

        $orden=Orden::findOrFail($pago->orden_id);
        $orden->estado="VERIFICADO";
        $orden->save();

        $id_usuario=DB::table('pagos')
                        ->join('ordens','ordens.id','=','pagos.orden_id')
                        ->join('empresarios','empresarios.id','=','ordens.empresario_id')
                        ->join('personas','personas.id','=','empresarios.persona_id')
                        ->join('users','personas.id','=','users.persona_id')
                        ->where('pagos.id','=',$request->id)
                        ->select('users.id','personas.id as persona')
                        ->get()[0];
       // dd($id_usuario);

        $user=Auth::user()->findOrFail($id_usuario->id);
        $user->removeRole("Invitado");
        $user->assignRole('Empresario'); 
        $rol=$user->roles->implode('name','-');
        
        return redirect()->route('persona_informar',$id_usuario->persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }

    public function formas(){
        $metodos=Metodopago::all();
        return view('pago/formas',compact('metodos'));
    }
}
