<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Pais;

use Illuminate\Http\Request;
use App\Http\Requests\CiudadGuardarRequest;
use App\Http\Requests\CiudadActualizarRequest;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades=Ciudad::orderBy('id','DESC')->take(10);
        return view('ciudad.index',compact('ciudades')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $paises=Pais::where('id','>',1)->get();
        return view('ciudad.crear',compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(CiudadGuardarRequest $request)
    {
        //dd($request->all());
        Ciudad::create($request->all());

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
        $ciudad=Ciudad::findOrFail($id);
        return  view('ciudad.mostrar',compact('ciudad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
       
        $ciudad_a_editar=Ciudad::findOrFail($id);
        $paises=Pais::where('id','>',1)->get();
        return view('ciudad.editar',compact('ciudad_a_editar','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function actualizar(CiudadActualizarRequest $request,$id)
    {
        Ciudad::findOrFail($id)->update($request->all());
        return redirect()->route('ciudad_datatable')->with('mensaje','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
       //dd($id);
       Ciudad::findOrFail($id)->delete();
       return redirect()->route('ciudad_datatable')->with('mensaje','Registro eliminado satisfactoriamente');
    }
    public function city_of_country($id){        
        return Ciudad::where('pais_id',$id)->get();
    } 
}


