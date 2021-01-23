@extends('layout')

@section('titulo')
  Editar Teléfono
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
@endsection

@section('contenido')     
    @can('empresa_actualizar')
        <div class="row">
            <div class="col-12">
                @include('includes.form-error')
                @include('includes.mensaje')     
                    <div class="card-header bg-cyan mb-3 mt-3">
                        <h3 class="card-title">EDITAR TELEFONO DE : <strong> {{$empresa->empresa}} </strong></h3>
                    </div>
                        <form action="{{ route('telofempresa_actualizar',['id'=>$tel_a_editar->id]) }}"  id="form-general" class="form-vertical" enctype="multipart/form-data" method="POST" autocomplete="on">
                            @csrf
                                @include('telofempresa.form')
                                @include('includes.boton_actualizar')
                        </form>
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

    