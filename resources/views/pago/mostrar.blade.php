@extends('layout')

@section('titulo')
  Mostrar Pago
@endsection

@section('contenido')     
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                   
                              <!-- Horizontal Form -->
                        @include('includes.form-error')
                        @include('includes.mensaje')             
                        
                      
                            @php
                                if($pago[0]->monto>0){
                                    $clase="badge-success";    
                                }else{
                                    $clase="badge-danger";   
                                }
                               
                            @endphp
                            
                            <ul class="list-group mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    CODIGOPAGO: 
                                    <span class="badge {{$clase}} badge-pill">{{ $pago[0]->id }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    EMPRESARIO: 
                                    <span class="badge {{$clase}} badge-pill">{{ $pago[0]->nombre }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    FECHAHORA:
                                    <span class="badge {{$clase}} badge-pill">{{ $pago[0]->created_at }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    METODO PAGO : {{ $pago[0]->metodo}}
                                    <span class="badge {{$clase}} badge-pill">Bs. {{ $pago[0]->monto}}</span>
                                </li>
                            </ul>

                            
                            <div class="card-body">
                                
                                <form action="{{ route('pago_verificar')}}" id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                <input type="number" name="id" value="{{$pago[0]->id}}" id="" hidden>
                                <input type="number" name="monto" class="form-control" value="{{$costo}}" placeholder="Favor introduza cuanto pago">
                                <input type="submit" class="btn btn-success" value="Validar">    
                            </form>
                            </div>    

                            

                            <div>
                                <img src="{{Storage::url($pago[0]->comprobante)}}" alt="Comprobante" width="100%">
                            </div>
                        
            </div>
        </div> <!-- FIN ROW -->
    </div>
   
    
@endsection