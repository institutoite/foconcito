<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Categoria;
use App\Pais;
use App\Ciudad;
use App\Zona;
use App\Image;
use App\Empresario;
use App\Orden;
use App\Pago;
use App\Constante;
use App\Click;
use App\Busqueda;
use App\Telofempresa;
use App\Persona;
use App\Telefono;


use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\EmpresaGuardarRequest;
use App\Http\Requests\EmpresaActualizarRequest;
use App\Http\Requests\BusquedaAvanzadaRequest;
use App\Http\Requests\BusquedaRequest;
use Illuminate\Http\Request;
use DB;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(request()->ajax()){
        $empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('empresarios.id')
                   ->get()[0]->id;  

        $empresas= Empresa::
                where('empresas.empresario_id','=',$empresario)
                ->where('empresas.visible','=',true)
        ->select('id','empresa','publico','destacado','detalle');
        
        $datos= datatables()->eloquent($empresas)
        ->addColumn('btn','empresa.acciones')
        ->rawColumns(['btn','detalle'])
        ->toJson();
 
            return $datos;   
        
        }
        return view('empresa.index');   
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= Categoria::all();
        $paises=Pais::Todos()->get();
        // empresario actual   
         $empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('empresarios.id')
                   ->get()[0]->id;  

         //dd($empresario);

        $ordenes=Orden::where('empresario_id','=', $empresario)
                      ->where('estado','=','VERIFICADO')->get();
       // dd($ordenes);
        return view("empresa.crear",compact('categorias','paises','ordenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaGuardarRequest $request)
    {

        //dd($request->get('ciudad_id'));

        $EmpresaNueva=new Empresa;
        $datosEmpresa=request()->except('_token');
        $idorden= Orden::findOrFail($datosEmpresa['orden_id'])->id;
        if($request->hasFile('logo')){
            $datosEmpresa['logo']=$request->file('logo')->store('logos','public');
             $EmpresaNueva->logo=$datosEmpresa['logo'];
        }
        $EmpresaNueva->empresa = $request->empresa;
        $EmpresaNueva->votos = '1';
        $empresario_id=Empresario::where('persona_id','=',Auth::user()->persona_id)->select('id')->first()['id'];
        $EmpresaNueva->empresario_id=$empresario_id;
        $EmpresaNueva->publico=true;
        $EmpresaNueva->pais_id=$datosEmpresa['pais_id'];
        $EmpresaNueva->ciudad_id=$datosEmpresa['ciudad_id'];
        $EmpresaNueva->zona_id=$datosEmpresa['zona_id'];
        $EmpresaNueva->direccion=$datosEmpresa['direccion'];
        $EmpresaNueva->detalle =$datosEmpresa['detalle'];
        $EmpresaNueva->categoria_id =$datosEmpresa['categoria_id'];
        $EmpresaNueva->save();
        $idorden= Orden::findOrFail($datosEmpresa['orden_id'])->id;
        $cuantoPago=Pago::where('orden_id','=',$idorden)->get()->first()->monto;
        $CostoMensual=Constante::where('constante','=','costomensual')->get()->first()->valor;
        $Meses=$cuantoPago/$CostoMensual;
        $Ahora = Carbon::now();
        $FechaFin=$Ahora->addMonth(12);

        /**
         * desactiva el orden ya que lo esta usando
         */
        $Orden=Orden::findOrFail($idorden);
        $Orden->estado="VIGENTE";
        $Orden->save();

       // dd($Orden);

        $EmpresaNueva->ordenes()->attach($datosEmpresa['orden_id'], ['ffin' => $FechaFin]);

        return redirect()->route('telofempresa_crear',$EmpresaNueva->id)->with('mensaje','Registro creado satisfactoriamente')
                                    ->with('empresa',$EmpresaNueva);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagenes=Empresa::findOrFail($id);
         $imagenes= $imagenes->images()->orderBy('id','desc')->get();
        $idempresa=$id;

        $empresaMostrar=Empresa::findOrFail($id);
        $empresita=DB::table('empresas')
                    ->join('pais','pais.id','=','empresas.pais_id')
                    ->join('ciudads','ciudads.id','=','empresas.ciudad_id')
                    ->join('zonas','zonas.id','=','empresas.zona_id')
                    ->join('empresarios','empresarios.id','=','empresas.empresario_id')
                    ->join('categorias','categorias.id','=','empresas.categoria_id')
                    ->join('personas','personas.id','=','empresarios.persona_id')
                    ->where('empresas.id','=',$id)
                    ->select('empresas.id','empresarios.persona_id','empresas.destacado', 'empresas.empresa','empresas.detalle','empresas.direccion','pais.pais','ciudads.ciudad','zonas.zona',
                     'categorias.categoria','empresas.created_at','empresas.updated_at','empresas.logo',DB::raw('CONCAT_WS(" ",personas.nombre,personas.apellidos) as empresario'))->get();          
                    $telefonos= Telofempresa::where('empresa_id','=',$id)
                        ->select('id','prefijo','numero','detalle','created_at','updated_at')
                        ->orderBy('numero','desc')->paginate(10);  
        
        if(count($empresaMostrar->ordenes)>0){
            $ordenes=$empresaMostrar->ordenes()->where('empresa_orden.empresa_id','=',$id)->get()->first()->pivot;
            return  view('empresa.mostrar',compact('empresita','imagenes','idempresa','telefonos','ordenes'));
        }else{
            return  view('empresa.mostrar',compact('empresita','imagenes','idempresa','telefonos'));
        }    
        
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa=Empresa::findOrFail($id);
        $this->authorize('pass',$empresa);

        $empresa_a_editar=Empresa::findOrFail($id);
       // dd($empresa_a_editar);
         $categorias= Categoria::all();
        $paises=Pais::Todos()->get();

        $ciudades=Ciudad::Todos()->get();
        $zonas=Zona::Todos()->get();
        return view('empresa.editar',compact('empresa_a_editar','paises','ciudades','zonas','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaActualizarRequest $request, $id)
    {
       
        //dd($request->all());
        $DatosEmpresa=request()->except(['_token']);
        $EmpresaActualizar=Empresa::findOrFail($id); 
        if($request->hasFile('logo')){
            Storage::delete('public/'.$EmpresaActualizar->foto);
            $DatosEmpresa['logo']=$request->file('logo')->store('logos','public');
             $EmpresaActualizar->logo=$DatosEmpresa['logo'];
        }

        $EmpresaActualizar->empresa = $DatosEmpresa['empresa'];
        //$EmpresaActualizar->votos = '1';
        $empresario_id=Empresario::where('persona_id','=',session('persona_id'))->select('id')->first()['id'];
        $EmpresaActualizar->empresario_id=$empresario_id ;
        $EmpresaActualizar->pais_id=$DatosEmpresa['pais_id'];
        $EmpresaActualizar->ciudad_id=$DatosEmpresa['ciudad_id'];
        $EmpresaActualizar->zona_id=$DatosEmpresa['zona_id'];
        $EmpresaActualizar->direccion=$DatosEmpresa['direccion'];
        $EmpresaActualizar->detalle =$DatosEmpresa['detalle'];
        $EmpresaActualizar->categoria_id =$DatosEmpresa['categoria_id'];
       
        $EmpresaActualizar->save();

        return redirect()->route('empresa_mostrar',$id)->with('mensaje','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa=Empresa::findOrFail($id);
        $empresa->visible=false;
        $empresa->save();
        return redirect()->route('empresa_listar')->with('mensaje','Registro eliminado satisfactoriamente');
        
    }

    /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% BUSQUEDA NORMAL INICIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
     
    public function buscar(BusquedaRequest $request){
        $cadena=$request->get('criterio');
        $cadena = $request->criterio;
        $arraycriterio =preg_split('/\s+/', $cadena, -1, PREG_SPLIT_NO_EMPTY);//explode(" ", $cadena);
        $query = trim($request->criterio);

        $criterio=$cadena;  
        $busqueda=new Busqueda;
        $busqueda->criterio=$cadena;
        $busqueda->persona_id=Auth::user()->persona_id;
        $busqueda->save();
        $Usuario=Persona::findOrFail(Auth::user()->persona_id);
        //dd($Usuario->ciudad_id);
    /*
            join('empresas','empresas.id','=','images.empresa_id')
            ->join('empresarios','empresarios.id','=','empresas.empresario_id')
            ->join('personas','personas.id','=','empresarios.persona_id')
            ->join('users','users.persona_id','=','personas.id')
            ->join('ciudads','ciudads.id','=','personas.ciudad_id')
    */
        $productos=Image::join('empresas','empresas.id','=','images.empresa_id')
                        ->join('pais','pais.id','=','empresas.pais_id')
                        ->join('ciudads','ciudads.id','=','empresas.ciudad_id')
                        ->join('zonas','zonas.id','=','empresas.zona_id') 
                        ->join('empresarios','empresarios.id','=','empresas.empresario_id')
                        ->join('personas','personas.id','=','empresarios.persona_id')
                        ->where('personas.ciudad_id','=',$Usuario->ciudad_id)
                        ->where('empresas.publico','=',true)
                        ->where(function ($q) use ($arraycriterio) {
                            foreach ($arraycriterio as $value) {
                            $q->orWhere('images.titulo', 'like', "%{$value}%");
                            $q->orWhere('empresas.detalle', 'like', "%{$value}%");
                            $q->orWhere('images.descripcion', 'like', "%{$value}%");
                            $q->orWhere('empresas.empresa', 'like', "%{$value}%");
                            }
                        })
                        ->select('images.id','empresas.empresa','empresas.direccion','empresas.detalle','empresas.votos','ciudads.ciudad','images.titulo','images.descripcion','images.costo','images.foto','images.created_at')
                                 
                        ->orderBy('votos','desc')->paginate(10);//->getQuery()->toSql();
               
                       // dd($productos);
        return view('home',compact('productos','criterio'));

    }

    /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% BUSQUEDA NORMAL FIN %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    
    /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% BUSQUEDA AVANZADA INICIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

    public function buscar_avanzado(busquedaAvanzadaRequest $request){
        $cadena = $request->criterio;
        $arraycriterio = preg_split('/\s+/', $cadena, -1, PREG_SPLIT_NO_EMPTY);
        //dd($arraycriterio);
        $criterio=$cadena;
          $productos = Image::join('empresas','empresas.id','=','images.empresa_id')
                           ->join('pais','pais.id','=','empresas.pais_id')
                           ->join('ciudads','ciudads.id','=','empresas.ciudad_id')
                           ->join('zonas','zonas.id','=','empresas.zona_id')    
                    ->paisito($request->pais_id)
                    ->ciudadcito($request->pais_id,$request->ciudad_id)
                    ->zonita($request->pais_id,$request->ciudad_id,$request->zona_id)
                    ->where('empresas.publico','=',1)
                    ->where(function ($q) use ($arraycriterio) {
                        foreach ($arraycriterio as $value) {
                        $q->orWhere('images.titulo', 'like', "%{$value}%");
                        $q->orWhere('empresas.detalle', 'like', "%{$value}%");
                        $q->orWhere('images.descripcion', 'like', "%{$value}%");
                        $q->orWhere('empresas.empresa', 'like', "%{$value}%");
                        }
                    })
                    ->select('images.id','empresas.empresa','empresas.direccion','empresas.detalle','pais.pais','ciudads.ciudad','zonas.zona','empresas.votos','images.titulo','images.descripcion','images.costo','images.foto','images.created_at')            
                    ->orderBy('votos','desc')->paginate(10);

        $paises=Pais::Todos()->get();

        $pais_id=$request->pais_id;
        $ciudad_id=$request->ciudad_id;
        $zona_id=$request->zona_id;

        $ciudades=Ciudad::Todos()->get();
        $zonas=Zona::Todos()->get();
        return view('empresa.busquedaavanzada', compact('productos','criterio','paises','pais_id','ciudad_id','zona_id','ciudades','zonas')); 
    }


  /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% BUSQUEDA AVANZADA FIN %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

    public function priorizar(Request $request){
 
        $cadena = $request->criterio;
        $arraycriterio = explode(" ", $cadena);

        $empresas = Empresa::
                      join('pais','empresas.pais_id','=','pais.id')
                    ->join('ciudads','empresas.ciudad_id','=','ciudads.id')
                    ->join('zonas','empresas.zona_id','=','zonas.id')
                    ->join('empresarios','empresarios.id','=','empresas.empresario_id')
                    ->join('personas','personas.id','=','empresarios.persona_id')
                    ->Buscar($arraycriterio)
                    ->select('empresas.id','empresas.empresa','empresas.direccion','personas.nombre','personas.apellidos','empresas.detalle','pais.pais','ciudads.ciudad','zonas.zona')
                    ->orderBy('votos','desc')->paginate(10);
        $criterio=$request->criterio; 
      
        //dd($categorias);
        return view('empresa.busqueda', compact('empresas','criterio'));
    }

    public function vistapriorizar($id)
    {
        $categorias= Categoria::all();
        return view('empresa.formpriorizar',compact('id','categorias'));
    }

    public function getprioridades($id){
        
        return Categoria::findOrFail($id)->empresas()->get();//->last()->pivot->ffin;
        
    }
    public function empresas(){

        $empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('empresarios.id')
                   ->get()[0]->id;  

         $empresas= DB::table('empresas')
            ->where('empresario_id','=',$empresario)
            ->where('empresas.visible','=',true)
            ->select('id','empresa','logo')
            ->get();

        return view('empresa.empresas',compact('empresas'));
    }

    public function galeria($id){
        $imagenes=Empresa::findOrFail($id)->images()->orderBy('id','desc')->get();
        return view('empresa.galeria',compact('imagenes','id'));

    }
    public function votar($id){
        $clicks=new Click;
        $clicks->empresa_id=$id;

         $persona_id=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',Auth::user()->id)
                    ->select('personas.id')
                   ->get()[0]->id;  

        $clicks->persona_id=$persona_id;
        $clicks->save();

        $EmpresaClicada=Empresa::findOrFail($id);
        $EmpresaClicada->votos=$EmpresaClicada->votos+1;
        $EmpresaClicada->save();

        return redirect()->route('empresa_mostrar',$id); 
    }

    public function guardar_prioridad(Request $request){
        $Empresa=Empresa::findOrFail($request->empresa_id);
        $Ahora = Carbon::now();
        $FechaFin=$Ahora->addMonth($request->meses);
        $Empresa->categorias()->attach($request->categoria_id, ['orden' => $request->orden,'ffin'=>$FechaFin,'created_at'=>$Ahora,'updated_at'=>$Ahora]);
        return redirect()->route('categoria_prioridad',$request->categoria_id);
    }

    public function busquedaavanzada(){
        $paises=Pais::get();
         
        $radicatoria=Pais::join('personas','personas.pais_id','=','pais.id')
                    ->join('users','users.persona_id','=','personas.id')
                    ->where('users.persona_id','=',Auth::user()->persona_id)
                    ->select('pais.id','pais.pais','personas.ciudad_id')
                    ->get();

        //dd($radicatoria);                              
        $Ciudades_de_pais_radicado=Ciudad::join('pais','ciudads.pais_id','=','pais.id')
                        ->where('pais.id','=',$radicatoria[0]->id)
                        ->select('ciudads.id','ciudads.ciudad')
                        ->get();
        //dd($Ciudades_de_pais_radicado);                       
        return view('empresa.busquedaavanzada',compact('paises','radicatoria','Ciudades_de_pais_radicado'));
    }
   

    public function publicar(Request $request){
        $empresa_id=$request->empresa_id;

        $empresa_a_publicar= Empresa::findOrFail($empresa_id);
        $empresa_a_publicar->publico=true;
        $empresa_a_publicar->save();

        $Orden=Orden::where('estado','=','VERIFICADO')
                    ->where('empresario_id','=',$empresa_a_publicar->empresario_id)
                    ->get()->first();
        $Orden->estado="VIGENTE";
        $Orden->save();

        $Ahora = Carbon::now();
        $FechaFin=$Ahora->addMonth(1);
        $empresa_a_publicar->ordenes()->attach($Orden->id, ['ffin' => $FechaFin]);

        return redirect()->route('ordenes_empresario_listar')->with('mensaje','Su empresa ha sigo publicada correctamente');
    }

    public function morephone_or_product($id){
        $id_empresa=$id;
        return view('empresa.numero_producto',compact('id_empresa'));  // idempresa
    }

    public function compartir($id){
    
            $empresa=Empresa::findOrFail($id);
            $persona_actual=Auth::user()->persona_id;
                     
            $telefonos= Persona::join('telefonos','telefonos.persona_id','=','personas.persona_id')
                         ->where('personas.persona_id','=',$persona_actual)
                        ->where('telefonos.persona_id','=',$persona_actual)
                        ->select('personas.nombre','personas.apellidos','telefonos.prefijo','telefonos.numero')->get();
           
        return view('empresa.compartir',compact('telefonos','empresa'));
    }
    public function share($prefijo,$numero,$id){
        $empresa=Empresa::findOrFail($id);
        $link="https://api.whatsapp.com/send?phone=+".$prefijo.$numero."&text=". str_replace(" ","%20",route('empresa_mostrar', ['id' => $id]));
        return redirect($link); 
    }
}

