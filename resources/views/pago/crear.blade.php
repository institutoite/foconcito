@extends('layout')

@section('contenido')  

@can('pago_crear')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                    
                        <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">Metodos pago</h3>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('pago_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    @include('pago.form')
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
     
    </script>
    
@endsection