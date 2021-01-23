@extends('layout')

@section('titulo')
  Buscar empresas
@endsection


@section('css')
  <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">  
@endsection



@section('contenido')

<div class="row">
    <div class="col">
        <p class="text-muted">  {{$mensaje ?? 'Que estas buscando?'}} <a class="float-right text-primary" href="{{route('busqueda_avanzada')}}">Búsqueda por zona </a></p>  
    </div>
</div> 

<div class="row">
    <img src="" alt="">
</div>

<img src="{{asset("imagenes/buscador.png")}}" width="300" alt="">
    <!--h1 class="display-6 text-center text-gray col-sm">Lo que buscas está a un Click</h1-->
    <div class="row">
        <form class="form-horizontal col-12" method="get" action="{{route('empresa_buscar')}}">
             
             
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2 p-2">
                    
                    <input class="form-control" type="text" required value="{{ old('criterio',$criterio ?? '')}}" name="criterio" id="criterio" placeholder="Escribe aquí que Busca Ej. Celulares, Ropa, Casa etc"
                    aria-label="Search">
                    <button type="submit" class="btn btn-success btn-sm" id="submit">Buscar <i class="fas fa-search text-white-50" aria-hidden="true"></i> </button>
                </div>
        </form>
    </div>

    @if(session('mensaje'))
    <div class="alert bg-success alert-dismissible" id="alert" data-auto-dismiss="1500">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
            <div class="alert alert-success">
                <ul>
                        <li>{{ session('mensaje') }}</li>
                </ul>
            </div>
    </div>
@endif

    @isset ($empresas)

   
        @php
            $i=1;
        @endphp   

        <div class="container">
                    @foreach ($empresas as $empresa)
                        @if ((($i-1) % 4==0)||($i==1))
                            <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                                        <div class="card text-white mb-3 borde-cyan" style="max-width: 36rem;">
                                            <div class="card-header bg-cyan text-center">{{$empresa->empresa}}</div>
                                                <div class="card-body">
                                                    <a href="{{route('empresa_votar',$empresa->id)}}" target="_blank" class="titulo">
                                                        <img class="img-thumbnail zoomify" src="{{ isset($empresa->logo) ? Storage::url($empresa->logo) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                                    </a>    
                                                </div>
                                                <div class="text-center botonaccion">
                                                    <p class="text-gray cuerpo"> {{$empresa->detalle}}</p>
                                                </div>
                                               <div class="row">
                                                    <div class="col-3">
                                                    </div>
                                                    <a href="{{route('empresa_votar',$empresa->id)}}" class="btn btn-sm col-2"><i class="far fa-eye fa-2x text-info"></i></i></a>
                                                    <div class="col-2"></div>
                                                    <a  href="{{route('empresa_votar',$empresa->id)}}" target="_blank" class="btn btn-sm col-2"><i class="fab fa-whatsapp text-success fa-2x"></i></i></a>
                                                    <div class="col-3">
                                                    </div>
                                                </div>

                                                <small id="nombreHelp" class="form-text text-muted">{{$empresa->ciudad."|".$empresa->zona."|".$empresa->direccion}}</small>
                                        </div>
                                    </div>
                                
                    @else    
                            
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                                    <div class="card text-white mb-3" style="max-width: 36rem;">
                                        <div class="card-header bg-cyan borde-cyan text-center">{{$empresa->empresa}}</div>
                                            <div class="card-body">
                                                    <a href="{{route('empresa_votar',$empresa->id)}}" target="_blank" class="titulo">
                                                    <img class="img-thumbnail zoomify" src="{{ isset($empresa->logo) ? Storage::url($empresa->logo) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                                    </a>
                                            </div>
                                            <div class="text-center botonaccion">
                                                <p class="text-gray cuerpo"> {{$empresa->detalle}}</p>
                                            </div>
                                            <div class="row">
                                                    <div class="col-3">
                                                    </div>
                                                    <a href="{{route('empresa_votar',$empresa->id)}}" class="btn btn-sm col-2"><i class="far fa-eye fa-2x text-info"></i></i></a>
                                                    <div class="col-2"></div>
                                                    <a  href="{{route('empresa_votar',$empresa->id)}}" target="_blank" class="btn btn-sm col-2"><i class="fab fa-whatsapp text-success fa-2x"></i></i></a>
                                                    <div class="col-3">
                                                    </div>
                                                </div>
                                            <small id="nombreHelp" class="form-text text-muted">{{$empresa->ciudad."|".$empresa->zona."|".$empresa->direccion}}</small>  
                                    </div>
                                </div> 
                        @if (($i) % 4 == 0)
                            </div>
                        @endif
                    @endif
                    @php
                        $i=$i+1;    
                    @endphp                  
                    @endforeach 
          
        </div> 
        {{ $empresas->render()}}
    @endisset
    

    @isset ($productos)
    
        @php
            $i=1;
        @endphp
      
         <div class="container">
           
                    @foreach ($productos as $producto)
                        @if ((($i-1) % 4==0)||($i==1))
                            <div class="row">
                                
                                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                                        <div class="card text-white mb-3 borde-oscuro" style="max-width: 36rem;">
                                            <div class="card-header fondo text-center">{{$producto->titulo}}</div>
                                                <div class="card-body producto">
                                                    <div class="precio text-center text-white">
                                                            <div class="textoprecio"> Bs. {{$producto->costo }} </div> 
                                                    </div>
                                                    
                                                    <img class="img-thumbnail zoomify" src="{{ isset($producto->foto) ? Storage::url($producto->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="{{$producto->titulo}}">
                                                     
                                                </div>
                                                <div class="text-center botonaccion">
                                                    <p class="text-gray cuerpo"> {{$producto->descripcion}}</p>
                                                </div>


                                    
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row justify-content-center align-content-center">
                                                        <a href="{{route('imagen_votar',$producto->id)}}" class="btn bg-info btn-sm text-white"><i class="far fa-eye text-white"> Ver </i></a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row justify-content-center align-content-center">
                                                        <a  href="{{route('imagen_contactar',$producto->id)}}" target="_blank" class="btn bg-success text-white btn-sm"><i class="fab fa-whatsapp text-white"> Contactar</i></a>
                                                    </div>
                                                </div>
                                            </div>


                                                <small id="nombreHelp" class="form-text text-muted">{{$producto->created_at->diffForHumans().' en '.$producto->ciudad."|".$producto->zona."|".$producto->direccion}}</small>
                                        </div>
                                    </div>
                                
                    @else    
                            
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                                    <div class="card text-white mb-3 borde-oscuro" style="max-width: 36rem;">
                                        <div class="card-header fondo borde-cyan text-center">{{$producto->titulo}}</div>
                                            <div class="card-body producto">
                                                    <div class="precio text-center text-white">
                                                            <div class="textoprecio"> Bs. {{$producto->costo }} </div> 
                                                    </div>
                                                    
                                                    <img class="img-thumbnail zoomify" src="{{ isset($producto->foto) ? Storage::url($producto->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                                    </a>
                                            </div>
                                            <div class="text-center botonaccion">
                                                <p class="text-gray cuerpo"> {{$producto->descripcion}}</p>
                                            </div>
                                            
                                                <div class="row">
                                                <div class="col-6">
                                                    <div class="row justify-content-center align-content-center">
                                                        <a href="{{route('imagen_votar',$producto->id)}}" class="btn bg-info btn-sm text-white"><i class="far fa-eye text-white"> Ver </i></a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row justify-content-center align-content-center">
                                                        <a  href="{{route('imagen_contactar',$producto->id)}}" target="_blank" class="btn bg-success text-white btn-sm"><i class="fab fa-whatsapp text-white"> Contactar</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                              

                                            <small id="nombreHelp" class="form-text text-muted">{{ $producto->created_at->diffForHumans().' en '.$producto->ciudad."|".$producto->zona."|".$producto->direccion }}</small>
                                            
                                    </div>
                                </div> 
                                
                        @if (($i) % 4 == 0)
                            </div>
                        @endif
                    @endif
                    @php
                        $i=$i+1;    
                    @endphp                  
                    @endforeach 
           
        </div> 
        {{ $productos->appends(['criterio' => $criterio])->links()}} 
    @endisset
    
   
     
@endsection

@section('codigojs')
    <script type="text/javascript">
        $(document).ready(function(){
                $(".cuerpo").each(function(){
                    $(this).html($(this).text().substring(0,50)+"...");
                });
        });    
    </script>
@endsection



