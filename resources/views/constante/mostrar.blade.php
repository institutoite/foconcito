@extends('layout')

@section('titulo')
  Mostrar Constante
@endsection

@section('contenido')     
    @can('constante_mostrar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                                <!-- Horizontal Form -->
                    @include('includes.form-error')
                    @include('includes.mensaje')             
                
                    {{-- dd($manera) --}}
                    <div class="card bg-transparent mb-3" style="max-width: 100%;">
                        <div class="card-header text-center"> DETALLE CCONSTANTE</div>
                        
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
                                        <td>{{ $constante->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>CONSTANTE</td>
                                        <td>{{ $constante->constante}}</td>
                                    </tr>

                                    <tr>
                                        <td>VALOR</td>
                                        <td>{{ $constante->valor}}</td>
                                    </tr>
                                    <tr>
                                        <td>CREADO</td>
                                        <td>{{ $constante->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>ACUALIZADO</td>
                                        <td>{{ $constante->updated_at}}</td>
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

