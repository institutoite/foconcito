@extends('layout')

@section('contenido')     
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive no-padding">
                              <!-- Horizontal Form -->
                        @include('includes.form-error')
                        @include('includes.mensaje')             
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">FORMULARIO EDIAR ZONA</h3>
                            </div>
            
                            <form action="{{ route('zona_actualizar',['id'=>$zona_a_editar->id]) }}"  id="form-general" class="form-vertical form-" method="post" autocomplete="on">
                                @csrf
                                <div class="card-body"> 
                                    @include('zona.form')
                                </div>
        
                                <div class="card-footer">   
                                    @include('includes.boton_actualizar')
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div> <!-- FIN ROW -->
    </div>  
    
@endsection