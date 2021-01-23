@extends('layout')
@section('titulo')
  Crear Contacto
@endsection

@section('css')
     <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endsection
@section('contenido')           
    @can('persona_crear')
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-success d-flex mt-3">
                    <h3 class="card-title"><strong>Enviar Mensaje:</strong>  {{ $mensaje->mensaje }} </h3>
                </div>
                
                <div class="card-body"> 
                    <table id="clientes" class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>apellidos</th>
                                <th>Número</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($telefonos as $telefono)
                                    <tr>
                                        <td>{{$telefono->nombre}} </td>
                                        <td>{{$telefono->apellidos }} </td>
                                        <td>{{$telefono->numero }} </td>
                                        <td>
                                            @php
                                                $link="https://api.whatsapp.com/send?phone=+".$telefono->prefijo.$telefono->numero."&text=". str_replace(" ","%20",$mensaje->mensaje);    
                                            @endphp
                                            
                                            
                                            <a href="{{ $link }}" target="_blank" class="btn-accion-tabla tooltipsC" title="Compartir tu empresa con este cliente">
                                                <i class="fas fa-share-alt-square text-success fa-2x"></i>
                                            </a>
                                             
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section('codigojs')
<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('#clientes').DataTable({ 
        
       
            "responsive":true,
            "language":{
            "search":"Buscar",
            "paginate":{
                "next":"Siguiente",
                "previous":"Anterior",
            },
            "lengthMenu": 'Mostrar <select>' +
                                    '<option value="5">5</option>'+
                                    '<option value="10">10</option>'+
                                    '<option value="20">20</option>'+
                                    '<option value="50">50</option>'+
                                    '<option value="-1">Todos</option>'+
                                    '</select> Registros',
            "loadingsRecords":"Cargando....",
            "processing":"Procesando...",
            "emptyTable":"Sin elementos",
            "infoEmpty":"",
            "infoFiltered":"",
            "zeroRecords":"No hay datos",  
            "info": "Registros del _START_ al _END_ de _TOTAL_ registros",
        }
    })
    } );
    </script>
@endsection