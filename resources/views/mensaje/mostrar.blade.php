@extends('layout')

@section('titulo')
  Mostrar Mensaje
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojione@4.0.0/extras/css/emojione.min.css"/>
@endsection

@section('contenido') 
    @can('mensaje_mostrar')
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
                                <div class="card-header text-center"> DETALLE MENSAJE</div>
                                <div class="card-body">
                                    
                                    <table class="table table-bordered table-hover table-striped" id="mensaje">
                                        <thead class="bg-cyan">
                                            <tr>
                                                <th>ATRIBUTO</th>
                                                <th>VALOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ID</td>
                                                <td>{{ $mensaje->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>NOMBRE</td>
                                                <td>{{ $mensaje->nombre}}</td>
                                            </tr>
                                            <tr>
                                                <td>MENSAJE</td>
                                                <td> 
                                                    {{$mensaje->mensaje}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CREADO</td>
                                                <td>{{ $mensaje->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>ACUALIZADO</td>
                                                <td>{{ $mensaje->updated_at}}</td>
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
    @else 
        @include('includes.sinpermiso')
    @endcan    
@endsection

@section('codigojs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>
    <script src="{{asset("dist/js/alertas.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/emojione@4.0.0/lib/js/emojione.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
           var Celda =$('#mensaje tbody').find('tr').first().next().next().children('td').first().next();
               Celda.html(emojione.shortnameToImage(Celda.text()));   
    });
    </script>
@endsection
