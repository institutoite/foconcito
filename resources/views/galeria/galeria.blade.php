@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{asset('lbgalery/css/gallery.css')}}">
    <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
    
    
@endsection

@section('contenido')     


    @include('includes.form-error')
    @include('includes.mensaje')    
    <div class="row mt-3 p-3"> 
        <div class="col-12 mb-3 gris" >
            <div class="row">
                <div class="col-12 text-center text-gray">
                      <strong> Agregar más imagenes </strong>   
                </div>
            </div>
            <form action="{{ route('imagen_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                @csrf
                
                <div class="mb-3 input-group">
                    <input type="file" accept=".png, .bmp, .jpg, .jpeg, .gif" name="imagen" id="imagenes"   data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
                    <input  type="text" name="titulo" class="form-control" value="{{old('titulo' ?? '')}}" placeholder="Ingrese un titulo">
                </div>    
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
                    <input  type="text" name="descripcion" class="form-control" value="{{old('descripcion' ?? '')}}" placeholder="Ingrese una descripcion para el producto o servicio">
                </div>

               
                <input type="text" hidden name="empresa_id" id="idempresa" value="{{$id}}">

                <div class="text-center mb-2 mt-2">
                    <input type="submit" class="btn btn-success" value="Agregar Imagen">
                </div>
                
            </form>
        </div>            
    </div>


    @if (count($imagenes)==0)
        <div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
            <div class="alert alert-success">
                <ul>
                        <li>{{ "Ud. aun no tiene imagenes registradas en Foconcito" }}</li>
                </ul>
            </div>
    </div>
    @endif

     @php
        $i=1; // variable para crear un nuevo row o añadir a contunuacion de 4 en 4
    @endphp

    <div class="row mb-3">

    </div>

    <div id="gallery">
            {{--dd($imagenes)--}}
            @foreach($imagenes as $ima)
                @if ((($i-1) % 4==0)||($i==1))
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                            <div class="card text-white mb-3 borde-cyan" style="max-width: 36rem;">
                                <div class="card-header bg-cyan text-center">{{$ima->titulo}}</div>
                                    <div class="card-body">
                                            <img class="img-thumbnail zoomify" src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                    </div>
                                    <div class="text-center botonaccion">
                                        <p class="text-gray"> {{$ima->descripcion}}</p>
                                    </div>
                                     @include('empresa.accionesgaleria')
                            </div>
                           
                        </div>                            
                @else    
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                            <div class="card text-white mb-3" style="max-width: 36rem;">
                                <div class="card-header bg-cyan borde-cyan text-center">{{$ima->titulo}}</div>
                                    <div class="card-body">
                                            <img class="img-thumbnail zoomify" src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                    </div>
                                    <div class="text-center botonaccion">
                                        <p class="text-gray"> {{$ima->descripcion}}</p>
                                    </div>
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
@endsection

@section('codigojs')
<script src="{{asset('lbgalery/js/gallery.js')}}"></script>
<script src="{{asset('bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap-fileinput/themes/fas/theme.min.js')}}" type="text/javascript"></script>


    

<script>


    $('#imagenes').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize:2000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });
   
    
</script>    
@endsection