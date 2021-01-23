@extends('layout')

@section('titulo')
  Mis empresas
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">  
@endsection

@section('contenido')     
    @can('empresa_config')
        @if (count($empresas)==0)
            <div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
                <div class="alert alert-success">
                    <ul>
                            <li>{{ "Ud. aun no tiene empresas registradas" }}</li>
                    </ul>
                </div>
        </div>
        @endif
        
        @php
            $i=1; // variable para crear un nuevo row o añadir a contunuacion de 4 en 4
        @endphp


        <div class="row mb-3">

        </div>

            <div class="card-header border-dark d-flex mt-3 mb-3">
                <h3 class="card-title">Ellija a cual de sus empresas quiere agregar productos</h3>
                <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('empresa_crear')}}"><i class="fas fa-plus-circle"></i>Crear Empresa</a></h3>
            </div>
        @foreach ($empresas as $empresa)
            @if ((($i-1) % 4==0)||($i==1))
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                        <div class="card text-white mb-3" style="min-width:25%;">
                            <div class="card-header fondo text-center">{{$empresa->empresa}}</div>
                                <div class="card-body">
                                    <img class="img-thumbnail" src="{{ isset($empresa->logo) ? Storage::url('/'.$empresa->logo) : Storage::url('logos/sinlogo.png')}}" alt="">
                                </div>
                                <div class="text-center botonaccion">
                                    <a class="btn btn-dark mb-3" href="{{ route('empresa_galeria', $empresa->id)}}" id="empresa{{$empresa->id}}">Catálogo</a>
                                </div>
                        </div>
                </div>                            
            @else    
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                <div class="card text-white mb-3">
                            <div class="card-header fondo text-center">{{$empresa->empresa}}</div>
                                <div class="card-body">
                                    <img class="img-thumbnail" src="{{ isset($empresa->logo) ? Storage::url('/'.$empresa->logo) : Storage::url('logos/sinlogo.png')}}" alt="">
                                </div>
                                <div class="text-center botonaccion">
                                    <a class="btn btn-dark text-cyan mb-3" href="{{ route('empresa_galeria', $empresa->id)}}" id="empresa{{$empresa->id}}">Catálogo</a>
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
    @else 
        @include('includes.sinpermiso')
    @endcan
@endsection

@section('codigojs')
    <script src="{{asset("dist/js/alertas.js")}}"></script>
<script>

     $(document).ready(function() {
        /*$('.botonaccion').on('click', 'a', function(e) { 
          e.preventDefault();  
		  $(this).css('color', 'red'); 
        });*/
        
    });
    $('#tigo').fileinput({
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