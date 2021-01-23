@extends('layout')

@section('titulo')
  Crear Teléfono
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
@endsection

@section('contenido')  
    @can('empresa_crear')
        <div class="row">
            <div class="col-12">
                @include('includes.form-error')
                @include('includes.mensaje')     
                   

                    <div class="card-header bg-cyan mt-3">
                    <h3 class="card-title">REGISTRAR TELEFONOS PARA: <strong>{{ $persona->nombre.' '.$persona->apellidos }}</strong></h3>
                    </div>
                    <div class="card-body"> 
                        <form action="{{ route('telefono_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical form-" method="POST" autocomplete="on">
                            @csrf
                                @include('telefono.form')
                                @include('includes.boton_crear')
                        </form>
                    </div> 
                
            </div>    
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
    
@endsection

@section('codigojs')
<script>
    
    $(document).ready(function(){
        
    });	
</script>
    
@endsection


