<?php

namespace App\Http\Controllers;

use App\Click;
use Illuminate\Http\Request;
use Carbon\Carbon;

use DB;

class ClickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
        $clicadas=DB::table('empresas')
                    ->join('clicks','clicks.empresa_id','=','empresas.id')
                    ->join('personas','personas.id','clicks.persona_id')
                    ->groupBy('clicks.id')
                    ->select('empresas.id','empresas.empresa','personas.nombre',DB::raw('count(*) as clicks'))
                   ->get();
                   
        //dd($clicadas);
            $datos= datatables()->of($clicadas)
            ->addColumn('btn','click.acciones')
            ->rawColumns(['btn'])
            ->toJson();
       // dd($datos);    
            return $datos;   
        }
        return view('click.index');  
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Click  $click
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
       $clicks=Click::join('personas','personas.id','=','clicks.persona_id')
                    ->join('empresas','empresas.id','=','clicks.empresa_id')
                    ->join('pais','pais.id','=','personas.pais_id')
                    ->join('ciudads','ciudads.id','=','personas.ciudad_id')
                    ->join('zonas','zonas.id','=','personas.zona_id')
                    ->where('empresa_id','=',$id)
                    ->select('empresa_id','persona_id',DB::raw('CONCAT_WS(" ",personas.nombre,personas.apellidop) as nombre'),'clicks.created_at',
                            'personas.fechanacimiento','genero','pais','ciudad','zona','empresa','votos')
                    ->get();
        //dd($clicks);
       return view('click.mostrar',compact('clicks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Click  $click
     * @return \Illuminate\Http\Response
     */
    public function edit(Click $click)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Click  $click
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Click $click)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Click  $click
     * @return \Illuminate\Http\Response
     */
    public function destroy(Click $click)
    {
        //
    }
}
