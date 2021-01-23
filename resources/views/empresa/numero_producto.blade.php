@extends('layout')

@section('titulo')
  Config
@endsection

@section('contenido')     
    
    
        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 input-group mb-2" >
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 input-group mb-2" >
                <div class="card">
                  
                    <div class="card-body">
                        <h4 class="card-title text-center">Agregar mas números telefónicos</h4>
                            <a href="{{route('telofempresa_crear',$id_empresa)}}">        
                                <img class="img-thumbnail" src="/imagenes/mastelefonos.png" alt="">
                                <div class="text-center">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 input-group mb-2" >
            </div>   
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 input-group mb-2" >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Agregar mas productos o servicios</h4>
                            <a href="{{ route('empresa_galeria', $id_empresa)}}">        
                                <img class="img-thumbnail" src="/imagenes/masproductos.png" alt="">
                                <div class="text-center">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 input-group mb-2" >
            </div>   
        </div>   
@endsection
