@extends('layout')

@section('titulo')
  Editar Ciudad
@endsection

@section('contenido')     
    @can('ciudad_actualizar')
        <div class="row">
            <div class="col-12">
                @include('includes.form-error')
                @include('includes.mensaje')     
                    <div class="card-header bg-cyan mb-3 mt-3">
                        <h3 class="card-title">FORMULARIO EDITAR CIUDAD</h3>
                    </div>
                        <form action="{{ route('ciudad_actualizar',['id'=>$ciudad_a_editar->id]) }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                            @csrf
                                @include('ciudad.form')
                                @include('includes.boton_actualizar')
                        </form>
            </div>    
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

    