@extends('layout')

@section('contenido')  


            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                            <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">PRIORIDADES CATEGORIA {{ $categoria->categoria}} </h3>
                        </div>
                        <div class="card-body"> 
                         <table class="table table-brodered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>EMPRESA</th>
                                    <th>ORDEN</th>
                                    <th>INICIO</th>
                                    <th>FIN</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>

                            {{dd($)}}

                            <tbody>
                            @foreach($prioridades as $prioridad)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prioridad->empresa }}</td>
                                    <td>{{ $prioridad->pivot->orden }}</td>
                                    <td>{{ $prioridad->pivot->created_at }}</td>
                                    <td>{{ $prioridad->pivot->ffin }}</td>
                                    <td>
                                        <a href="{{route('categoria_reset',$categoria->id,$prioridad->id)}}" class="btn btn-success"> resetear </a>
                                    </td>
                               </tr>
                                
                            @endforeach
                            </tbody>
                         </table>   
                          

                        </div> 
                </div>    
            </div>
            @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

