<?php

namespace App\Http\Controllers;

use DB;
use App\Metodopago;
use Illuminate\Http\Request;
use App\Http\Requests\MetodopagoGuardarRequest;
use App\Http\Requests\MetodopagoActualizarRequest;

class MetodopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(request()->ajax()){
            $metodos= MetodoPago::
             select('id','metodo');
            $datos= datatables()->eloquent($metodos)
                ->addColumn('btn','metodopago.acciones')
                ->rawColumns(['btn'])
                ->toJson();
            //dd($datos);
            return $datos;   
            
        }
        return view('metodopago.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("metodopago.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MetodopagoGuardarRequest $request)
    {
        $datos=request()->except('_token');
        $MetodoNuevo=new  Metodopago;
        $MetodoNuevo->metodo=$datos['metodo'];
        $MetodoNuevo->save(); 
        return redirect()->route('metodopago_listar')->with('mensaje','Se guardo correctamente el registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metodopago=Metodopago::findOrFail($id);
        //dd($metodopago);
        return view('metodopago.mostrar', compact('metodopago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodopago_a_editar=Metodopago::findOrFail($id);
        return view('metodopago.editar',compact('metodopago_a_editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function update(MetodopagoActualizarRequest $request, $id)
    {
        $datos=request()->except('_token');
        Metodopago::findOrFail($id)->update($datos);
        return redirect()->route('metodopago_listar')->with('mensaje','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Metodopago::findOrFail($id)->delete();
        return redirect()->route('metodopago_listar')->with('mensaje','Registro eliminado correctamente');
    }
}
