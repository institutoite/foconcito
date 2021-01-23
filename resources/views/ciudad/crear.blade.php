@extends('layout')

@section('titulo')
  Crear Ciudad
@endsection

@section('contenido')  
   @can('ciudad_crear')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                    
                        <div class="card-header bg-cyan mt-3 d-flex">
                            <h3 class="card-title">FORMULARIO CIUDAD </h3> <a class="btn btn-danger ml-auto" href="{{route('empresa_crear')}}">Crear Empresa</a>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('ciudad_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    @include('ciudad.form')
                                    @include('includes.boton_crear')
                            </form>
                        </div> 
                    
                </div>    
            </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
    
@endsection

