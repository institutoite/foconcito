@extends('layout')
@section('titulo')
  Crear Categoría
@endsection

@section('contenido')  
   @can('categoria_crear')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                    
                        <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">FORMULARIO CIUDAD</h3>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('categoria_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    @include('categoria.form')
                                    @include('includes.boton_crear')
                            </form>
                        </div> 
                    
                </div>    
            </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
    
@endsection

