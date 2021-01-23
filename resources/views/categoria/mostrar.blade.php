@extends('layout')

@section('titulo')
  Mostrar Categoría
@endsection

@section('contenido')    
    @can('categoria_mostrar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                            @include('includes.form-error')
                            @include('includes.mensaje')             
                            
                            {{-- dd($manera) --}}
                            <div class="card bg-transparent mb-3" style="max-width: 100%;">
                                <div class="card-header text-center"> DETALLE CIUDAD</div>
                                
                                    
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
                                                <td>{{ $categoria->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>DETALLE</td>
                                                <td>{{ $categoria->categoria}}</td>
                                            </tr>
                                            <tr>
                                                <td>CREADO</td>
                                                <td>{{ $categoria->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>ACUALIZADO</td>
                                                <td>{{ $categoria->updated_at}}</td>
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

