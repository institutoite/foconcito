<?php

namespace App\Http\Controllers;

use App\Image;
use App\Empresa;
use App\Imagen;
use App\Telofempresa;



use Illuminate\Http\Request;
use App\Http\Requests\ImageActualizarRequest;
use App\Http\Requests\ImageGuardarRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         return view("producto.crear",compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageGuardarRequest $request)
    {
        
        

        $ProductoNuevo=new Image;
        $datosProducto=request()->except('_token','imagen');
        
        
        //dd($datosProducto);
        
        $ProductoNuevo->titulo=$datosProducto['titulo'];
        $ProductoNuevo->descripcion=$datosProducto['descripcion'];
        $ProductoNuevo->costo=$datosProducto['costo'];
        $ProductoNuevo->empresa_id=$datosProducto['empresa_id'];
        $imagenes= $request->imagen; // Extrae todas las imagenes que llegan 
        $ProductoNuevo->foto=$imagenes[0]->store('galerias','public');;
        $ProductoNuevo->save();

        //dd($ProductoNuevo);

        //$imagenes= $request->imagen;
        $cantidadImagenes= count($imagenes);

        for ($i=0; $i < $cantidadImagenes ; $i++) { 
            /** esta linea  */
            $datosImagen['imagen']=$imagenes[$i]->store('galerias','public');
            //** estas lineas guardan en la base de datos  */
            $ImagenNueva=new Imagen;
            $ImagenNueva->foto= $datosImagen['imagen'];
            $ImagenNueva->image_id=$ProductoNuevo->id; 
            $ImagenNueva->save();
        }



        $id=$datosProducto['empresa_id'];
        return redirect()->route('empresa_galeria',$id)->with('mensaje','La imagen ha sido guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Image::findOrFail($id);
        $imagenes=Imagen::where('image_id','=',$id)->get();
        return view('producto.mostrar',compact('producto','imagenes'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $imagen_a_editar=Image::findOrFail($id);
        
        $empresa_id=$imagen_a_editar->empresa_id;
        
        $imagenes=Imagen::where("image_id",'=',$imagen_a_editar->id)->get();
        
        return view('galeria.editar',compact('imagenes','id','imagen_a_editar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageActualizarRequest $request, $id)
    {
        $DatosImagen=request()->except(['_token']);
        $ImagenActualizar=Image::findOrFail($id); 
        /*if($request->hasFile('imagen')){
            Storage::delete('public/'.$ImagenActualizar->foto);
            $DatosImagen['imagen']=$request->file('imagen')->store('galerias','public');
            $ImagenActualizar->foto=$DatosImagen['imagen'];
        }*/

        $ImagenActualizar->titulo = $DatosImagen['titulo'];
        $ImagenActualizar->descripcion =$DatosImagen['descripcion'];
        $ImagenActualizar->costo = $DatosImagen['costo'];
        $imagenes= $request->imagen;
        //dd($);
        //$ImagenActualizar->foto=$imagenes[0]->store('galerias','public');       
        $ImagenActualizar->save();
         if ($imagenes){
            $cantidadImagenes= count($imagenes);
               for ($i=0; $i < $cantidadImagenes ; $i++) { 
                    /** esta linea  */
                    $datosImagen['imagen']=$imagenes[$i]->store('galerias','public');
                    //** estas lineas guardan en la base de datos  */
                    $ImagenNueva=new Imagen;
                    $ImagenNueva->foto= $datosImagen['imagen'];
                    $ImagenNueva->image_id=$ImagenActualizar->id; 
                    $ImagenNueva->save();
                }
            //dd($imagenes);
        }  
        return redirect()->route('empresa_galeria',$ImagenActualizar->empresa_id)->with('mensaje','La imagen ha sido Actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img=Image::findOrFail($id);
        $img->delete();
        return redirect()->route('empresa_galeria',$img->empresa_id)->with('mensaje','La imagen ha sido eliminada correctamente');
    }

    public function imagenes($id){
        if(request()->ajax()){
        $imagenes=Empresa::findOrFail($id)->imagenes(); 
            $datos= datatables()->of($empresas)
            ->addColumn('btn','empresa.acciones')
            ->rawColumns(['btn','detalle'])
            ->toJson();  
            return $datos;   
        
        }
    }

    public function votar($id){
        
        $producto=Image::findOrFail($id);
        $producto->voto=$producto->voto+1;
        $producto->save();
        $imagenes=Imagen::where('image_id','=',$id)->get();
        return redirect()->route('imagen_mostrar',$id)->with('imagenes',$imagenes)->with('producto',$producto);
        //return view('producto.mostrar',compact('producto','imagenes'));
    }

    public function contactar($id){
        
        $producto = Image::findOrFail($id);
        //dd($producto);
        $producto->contactado =$producto->contactado+1;
        $producto->save(); 
      
        $empresa = Empresa::findOrFail($producto->empresa_id);
        //dd($empresa);
        $telefono = Telofempresa::where('empresa_id','=',$empresa->id)->get()->first();
        //dd($telefono);
        $empresario=Empresa::join('empresarios','empresarios.id','=','empresas.empresario_id')
                    ->join('personas','personas.id','=','empresarios.persona_id')
                    ->where('empresarios.id','=',$empresa->empresario_id)
                    ->select('personas.id','personas.nombre','personas.apellidos')
                    ->get()->first();

        //dd($empresario);            
        $mensaje="Hola *".$empresario->nombre."*"." he visto esto en *Foconcito* ".$producto->titulo." ".$producto->descripcion;
        $mensaje = $mensaje." Quiero mas información por favor";

        return redirect('https://api.whatsapp.com/send?phone='.$telefono->prefijo.$telefono->numero."&text=". str_replace(" ","%20",$mensaje)); 
    } 

    
}
