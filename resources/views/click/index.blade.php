

@extends('layout')

@section('titulo')
  Listar Clicks
@endsection


@section('contenido')
    @can('click_listar')
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-success d-flex mt-3">
                    <h3 class="card-title">CATEGORIAS DE EMPRESAS O NEGOCIOS</h3>
                    <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('constante_crear')}}"><i class="fas fa-plus-circle"></i>Nuevo</a></h3>
                </div>
                <div class="card-body"> 
                    <table id="clicks" class="table table-hover table-bordered table-striped display responsive nowrap" width="100%">
                        <thead class="bg-cyan">
                            <th width="10px" >#</th>
                            <th >EMPRESA </th>
                            <th >EMPRESARIO</th>
                            <th>click</th>
                            <th width="120px">Opciones</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section('codigojs')
<script type="text/javascript">

$(document).ready(function() {
    $('#clicks').DataTable({ 
       "serverSide":true,
        "processing":true,
        "ajax":{
            url:"{{ route('click_listar') }}",
            error : function(xhr, status) {
                alert('Disculpe, existió un problema'.status);
            },
        },
        "order": [[ 1, "asc" ]],
        "columns":[
            {data:'id'},
            {data:'empresa'},
            {data:'nombre'},
            {data:'clicks'},
            {data:'btn',orderable:false, searchable:false},
            ],
            
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ],
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


