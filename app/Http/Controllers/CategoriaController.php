<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaGuardarRequest;
use App\Http\Requests\CategoriaActualizarRequest;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $categorias= Categoria::
                select('id','categoria');
            
              $datos= datatables()->eloquent($categorias)
                ->addColumn('btn','categoria.acciones')
                ->rawColumns(['btn'])
                ->toJson();
                return $datos;   
        }

        return view('categoria.index');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categoria.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaGuardarRequest $request)
    {
        Categoria::create($request->all());
        return redirect('/categorias')->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('categoria.mostrar',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $categoria_a_editar=Categoria::findOrFail($id);
        return view('categoria.editar',compact('categoria_a_editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaActualizarRequest $request, $id)
    {
        Categoria::findOrFail($id)->update($request->all());
        return redirect('categorias')->with('mensaje','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
       return redirect()->route('categoria_listar')->with('mensaje','Registro eliminado satisfactoriamente');
    }

    public function prioridad($id){
        $categoria=Categoria::findOrFail($id);
        $prioridades=$categoria->empresas()->get();
        return view('categoria.prioridades',compact('prioridades','categoria'));
    }

    public function reset($idcategoria,$idempresa){
        $Categoria=Categoria::findOrFail($id);
      
        $Categoria->empresas()->updateExistingPivot($idempresa, array('orden' => 0));
        $categoria=Categoria::findOrFail($id);
        $prioridades=$categoria->empresas()->get();
        return view('categoria.prioridades',compact('prioridades','categoria'));
    }
}
