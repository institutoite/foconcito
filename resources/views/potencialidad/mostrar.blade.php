@extends('layout')

@section('contenido')     
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
                            <div class="card-header text-center"> DETALLE CIUDAD</div>
                            <div class="card-body">
                                
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>ATRIBUTO</th>
                                            <th>VALOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $zona->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>DETALLE</td>
                                            <td>{{ $zona->zona}}</td>
                                        </tr>
                                        <tr>
                                            <td>DETALLE</td>
                                            <td>{{ $ciudad}}</td>
                                        </tr>
                                        <tr>
                                            <td>CREADO</td>
                                            <td>{{ $zona->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>ACUALIZADO</td>
                                            <td>{{ $zona->updated_at}}</td>
                                        </tr>
                                    </tbody>      

                                </table>
                                
                            </div>
                        </div>

                    </div>    
                </div>
            </div>
        </div> <!-- FIN ROW -->
    </div>  
    
@endsection