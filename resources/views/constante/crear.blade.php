@extends('layout')

@section('titulo')
  Crear Constante
@endsection

@section('contenido')  
    @can('constante_crear')
        <div class="row">
            <div class="col-12">
                @include('includes.form-error')
                @include('includes.mensaje')     
                <div class="card-header bg-cyan mt-3">
                    <h3 class="card-title">FORMULARIO CONSTANTE</h3>
                </div>
                <div class="card-body"> 
                    <form action="{{ route('constante_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                        @csrf
                            @include('constante.form')
                            @include('includes.boton_crear')
                    </form>
                </div> 
            
            </div>    
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

