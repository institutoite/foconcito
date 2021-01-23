@extends('layout')

@section('contenido')   
@can('zona_guardar')  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive no-padding">
                              <!-- Horizontal Form -->
                        @include('includes.form-error')
                        @include('includes.mensaje')             
                       
                        
                             <div class="card card-info border-info">
                                <div class="card-header">
                                    <h3 class="card-title">FORMULARIO ZONA</h3>
                                </div>
                                    <form action="{{ route('zona_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                        @csrf
                                        <div class="card-body"> 
                                            @include('zona.form')
                                        </div>    
                                        <div class="card-footer">   
                                            @include('includes.boton_crear')
                                        </div>
                                    </form>
                                </div>
                    </div>    
                </div>
            </div>
        </div> <!-- FIN ROW -->
    </div>  
@else 
    @include('includes.sinpermiso')
@endcan
@endsection