@extends('layout')

@section('titulo')
  Busqueda avanzada
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">  
@endsection


@section('contenido')
    
    <p class="text-muted">  {{$mensaje ?? 'Que estas buscando?'}} <a class="float-right text-primary" href="{{route('home')}}">Búsqueda normal </a></p>  

    {{--dd($pais_id)--}}


    <img src="{{asset("imagenes/buscador.png")}}" width="300" alt="">
    <div class="row">
        <form class="form-horizontal col-12" method="GET" action="{{route('empresa_buscar_avanzado')}}">
          
            <div class="row"> 
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
                    <select class="form-control" name="pais_id" id="country" required>
                            <option value="0" @isset($pais_id) {{$pais_id == 0 ? 'selected':''}} @endisset  > Todos</option>
                                
                                @foreach ($paises as $pais)
                                    @isset($radicatoria)
                                        @if($radicatoria[0]->id==$pais->id)     
                                            <option value="{{ $radicatoria[0]->id }}" {{'selected'}} >{{ $pais->pais }}</option>
                                        @else
                                            <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->pais }}</option>
                                        @endif  
                                    @else
                                        @if($pais_id==$pais->id)     
                                            <option value="{{ $pais_id }}" {{'selected'}} >{{ $pais->pais }}</option>
                                        @else
                                            <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->pais }}</option>
                                        @endif
                                    @endisset
                                @endforeach
                    </select>
                </div>
                {{-- $Ciudades_de_pais_radicado --}}
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
                    <select class="form-control" name="ciudad_id" id="city" required>
                        <option value="0" selected> Todos</option>
                        @isset($ciudad_id)
                            @foreach ($ciudades as $citys)
                                <option value="{{ $citys->id }}" {{ $citys->id==$ciudad_id ? 'selected':''}} >{{ $citys->ciudad }}</option>
                            @endforeach
                        @else 
                            @foreach ($Ciudades_de_pais_radicado as $ciudad)
                                <option value="{{ $ciudad->id }}" {{ old('ciudad_id') == $ciudad->id ? 'selected':'' }} >{{ $ciudad->ciudad }}</option>
                            @endforeach
                        @endisset
                    </select>
                   
                </div>        
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
                    <select class="form-control" name="zona_id" id="zone" required>
                        <option value="0" selected> Todos</option>
                        @isset($zona_id)
                            @foreach ($zonas as $zones)
                                <option value="{{ $zones->id }}" {{ $zones->id==$zona_id ? 'selected':''}} >{{ $zones->zona }}</option>
                            @endforeach
                        @else 
                            <option value="0"> Elija una Zona</option>
                        @endisset
                    </select>
                   
                </div>
            </div>    


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2 p-2">
                    <input class="form-control" type="text" required  value="{{ old('criterio',$criterio ?? '')}}" name="criterio" id="criterio" placeholder="Escribe aquí que Busca Ej. Celulares, Ropa, Casa etc"
                    aria-label="Search">
                    <button type="submit" class="btn btn-success btn-sm" id="submit">Buscar <i class="fas fa-search text-white-50" aria-hidden="true"></i> </button>
                </div>
        </form>
    </div>


    {{-- muestra los productos --}}
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
                                                            <a href="{{route('imagen_votar',$producto->id)}}" class="btn bg-info btn-sm text-white"><i class="far fa-eye text-white"> Detalle </i></a>
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

                                            <small id="nombreHelp" class="form-text text-muted">{{ $producto->created_at->diffForHumans().' en x '.$producto->ciudad."|".$producto->zona."|".$producto->direccion }}</small>
                                            
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
        {{ $productos->appends(['criterio' => $criterio,'pais_id'=>$pais_id,'ciudad_id'=>$ciudad_id,'zona_id'=>$zona_id])->links()}} 
    @endisset
    
@endsection

@section('codigojs')
     <script>
     
    $(document).ready(function(){
        $('#country').on('change', Load_country);
        $('#city').on('change', Load_city);

        $(".cuerpo").each(function(){
            $(this).html($(this).text().substring(0,250)+"...");
        });
    });	
    function Load_country(){
        var country_id = $(this).val();
        console.log(country_id);
        if(!country_id){
            $('#city').html('<option value="">Seleccione una Ciudad </option>');
        return;
        }
        $.get('/api/pais/'+ country_id +'/ciudades',function (data) {
            var html_select='<option value="0">Seleccione una Ciudad </option><option value="0"> Todos</option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                //console.log(html_select);
            }
            $('#city').html(html_select);
        });
    }

    function Load_city(){
        var city_id = $(this).val();
        if(!city_id){
            $('#zone').html('<option value="">Seleccione una Zona </option>');
        return;
        }
        $.get('/api/ciudad/'+ city_id +'/zonas',function (data) {
            var html_select='<option value="0">Seleccione una Zona </option> <option value="0"> Todos</option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
                console.log(html_select);
            }
            $('#zone').html(html_select);
        });
    }
    </script>
@endsection