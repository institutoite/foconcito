@extends('layout')

@section('titulo')
  Editar Metodopago
@endsection

@section('contenido')     

    @can('metodopago_actualizar')
        <div class="row">
            <div class="col-12">
                @include('includes.form-error')
                @include('includes.mensaje')     
                    <div class="card-header bg-cyan mb-3 mt-3">
                        <h3 class="card-title">FORMULARIO EDITAR CATEGORIA DE EMPRESA</h3>
                    </div>
                        <form action="{{ route('metodopago_actualizar',['id'=>$metodopago_a_editar->id]) }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                            @csrf
                                @include('metodopago.form')
                                @include('includes.boton_actualizar')
                        </form>
            </div>    
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection


    