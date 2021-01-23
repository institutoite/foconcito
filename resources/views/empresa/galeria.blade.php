@extends('layout')

@section('titulo')
  Galería
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('lbgalery/css/gallery.css')}}">
    <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" href="{{asset("zoomify/zoomify.css")}}">
@endsection

@section('contenido')   

    @can('empresa_galeria')
        @include('includes.form-error')
        @include('includes.mensaje')    
       
        @if (count($imagenes)==0)
            <div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
                <div class="alert alert-success">
                    <ul>
                            <li>{{ "Ud. aun no tiene productos registradas en Foconcito" }}</li>
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
                                        @include('empresa.accionesgaleria') 
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
        <div class="row">
            <div class="card">
                <a href="{{route('imagen_crear',15)}}" class="btn btn-success"><i class="fas fa-plus-square"></i> Agregar Productos</a>
            </div>
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan
@endsection

@section('codigojs')
<script src="{{asset('lbgalery/js/gallery.js')}}"></script>
<script src="{{asset('bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap-fileinput/themes/fas/theme.min.js')}}" type="text/javascript"></script>
<script src="{{asset('zoomify/zoomify.js')}}" type="text/javascript"></script>
    

<script>
    $('.zoomify').zoomify();
    $('#imagenes').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png'],
        showUpload:false,
        maxFileSize: 25000,
        maxFileCount: 10,
        showClose:false,
        uploadUrl: "/site/test-upload",
        enableResumableUpload: true,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        showRemove: true,
        deleteUrl: '/site/file-delete',
    
        theme:"fas",
    });
   
    
</script>    
@endsection