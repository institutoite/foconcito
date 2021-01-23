@extends('layout')

@section('titulo')
  Mostrar Metodopago
@endsection

@section('contenido')     
    @can('metodopago_mostrar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                    
                                <!-- Horizontal Form -->
                    @include('includes.form-error')
                    @include('includes.mensaje')             
                    
                            {{-- dd($manera) --}}
                    <div class="card bg-transparent mb-3" style="max-width: 100%;">
                        <div class="card-header text-center">METODO PAGO</div>
                                
                                    
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="bg-cyan">
                                    <tr>
                                        <th>ATRIBUTO</th>
                                        <th>VALOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $metodopago->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>METODO</td>
                                        <td>{{ $metodopago->metodo}}</td>
                                    </tr>
                                    <tr>
                                        <td>CREADO</td>
                                        <td>{{ $metodopago->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>ACUALIZADO</td>
                                        <td>{{ $metodopago->updated_at}}</td>
                                    </tr>
                                </tbody>      
                            </table>
                        </div>
                </div>
            </div> <!-- FIN ROW -->
        </div>  
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

