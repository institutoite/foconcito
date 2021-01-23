<?php

namespace App\Http\Controllers;

use App\constante;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests\ConstanteGuardarRequest;
use App\Http\Requests\ConstanteActualizarRequest;

class ConstanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if(request()->ajax()){
            $constantes= DB::table('constantes')
            ->select('id','constante','valor')
            ->get();
            
              $datos= datatables()->of($constantes)
                ->addColumn('btn','constante.acciones')
                ->rawColumns(['btn'])
                ->toJson();
                return $datos;   
        }

        return view('constante.index');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("constante.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConstanteGuardarRequest $request)
    {
        Constante::create($request->all());
        return redirect('/constantes')->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\constante  $constante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $constante=Constante::findOrFail($id);
        return view('constante.mostrar',compact('constante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\constante  $constante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $constante_a_editar=Constante::findOrFail($id);
        return view('constante.editar',compact('constante_a_editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\constante  $constante
     * @return \Illuminate\Http\Response
     */
    public function update(ConstanteActualizarRequest $request,  $id)
    {
        Constante::findOrFail($id)->update($request->all());
        return redirect('constantes')->with('mensaje','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\constante  $constante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Constante::findOrFail($id)->delete();
        return redirect()->route('constante_listar')->with('mensaje','Registro eliminado satisfactoriamente');
    }
}
