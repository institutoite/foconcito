@extends('layout')
@section('titulo')
  Orden Mostrar
@endsection
@section('contenido')  
    @can('orden_mostrar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                                <!-- Horizontal Form -->
                            @include('includes.form-error')
                            @include('includes.mensaje')             
                            
                            {{-- dd($manera) --}}
                            <div class="card bg-transparent mb-3" style="max-width: 100%;">
                                <div class="card-header text-center"><h1 class="display-4"> Clicks en tu empresa</h1> </div>
                                    <div class="card-body">
                                        
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
                                                    <td>{{ $persona['0']->id}}</td>
                                                </tr>
                                                <tr>
                                                    <td>NOMBRES</td>
                                                    <td>{{ $persona['0']->nombre}}</td>
                                                </tr>
                                                <tr>
                                                    <td>APELLIDO PATERNO</td>
                                                    <td>{{ $persona['0']->apellidop}}</td>
                                                </tr>
                                                <tr>
                                                    <td>APELLIDO MATERNO</td>
                                                    <td>{{ $persona['0']->apellidom}}</td>
                                                </tr>
                                                <tr>
                                                    <td>FECHA NACIMIENTO</td>
                                                    <td>{{ $persona['0']->fechanacimiento}}</td>
                                                </tr>
                                                <tr>
                                                    <td>TIPO</td>
                                                    <td>{{ $persona['0']->tipo}}</td>
                                                </tr>
                                                <tr>
                                                    <td>PAIS</td>
                                                    <td>{{ $persona['0']->pais}}</td>
                                                </tr>
                                                <tr>
                                                    <td>CIUDAD</td>
                                                    <td>{{ $persona['0']->ciudad}}</td>
                                                </tr>
                                                <tr>
                                                    <td>ZONA</td>
                                                    <td>{{ $persona['0']->zona}}</td>
                                                </tr>
                                                <tr>
                                                    <td>CREADO</td>
                                                    <td>{{ $persona['0']->created_at}}</td>

                                                </tr>
                                                <tr>
                                                    <td>ACUALIZADO</td>
                                                    <td>{{ $persona['0']->updated_at}}</td>
                                                </tr>

                                            </tbody>      

                                        </table>
                                    
                                        <h2 class="display-4 text-center"> Números Telefónicos</h2>

                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <th>#</th>
                                                <th>Detalle</th>
                                                <th>Numero</th>
                                                <th>Creado</th>
                                                <th>Actualizado</th>
                                            </thead>
                                            @foreach ($telefonos as $telefono)
                                                <tr>
                                                    <td>{{"#"}}</td>
                                                    <td>{{$telefono->detalle}}</td>
                                                    <td>{{$telefono->numero}}</td>
                                                    <td>{{$telefono->created_at}}</td>
                                                    <td>{{$telefono->updated_at}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                </div>
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