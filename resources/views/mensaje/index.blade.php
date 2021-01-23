@extends('layout')

@section('titulo')
  Listar Mensajes
@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojione@4.0.0/extras/css/emojione.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">
@endsection

@section("contenido")
    @can('mensaje_crear')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive">
                                <!-- Horizontal Form -->
                        @include('includes.form-error')
                        @include('includes.mensaje')             
                        <div class="card card col-12 border-info">
                            <div class="card-header bg-transparent border-success d-flex">
                                <h3 class="card-title">MENSAJES</h3>
                                <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('mensaje_crear')}}"><i class="fas fa-plus-circle"></i>Nuevo</a></h3>
                            </div>
                            <div class="card-body"> 
                                <table id="mensajes" class="table emojionearea display responsive nowrap" style="width:100%"> 
                                    <thead class="bg-cyan">
                                        <th width="5%" >#</th>
                                        <th width="12%">Nombre</th>
                                        <th width="68%">Mensaje</th>
                                        <th width="15%">Opciones</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section("codigojs")
    <script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/emojione@4.0.0/lib/js/emojione.min.js"></script>
    
<script type="text/javascript">



$(document).ready(function(){
    
   
    var table=$("#mensajes").DataTable({ 
       "serverSide":true,
        "processing":true,
        "ajax":{
            url:"{{ route('mensaje_listar') }}",
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
        },
        "order": [[ 0, "desc" ]],
        "columns":[
            {data:'id',orderable:true},
            {data:'nombre'},
            {data: 'mensaje'},
            {data:'btn',orderable:false, searchable:false},
            ],
        "responsive": true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
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
    });

    $('#mensajes').DataTable().on("draw", function(){
        var data = table.rows( { filter : 'applied'} ).nodes(); //todas las filas filtradas 
        data.each(function (value, index) { // recorre fila por fila las filas de data anterior linea
            value.cells[2].innerHTML=emojione.shortnameToImage(value.cells[2].innerText);
        });
    });

    $('table').on('click','.eliminar',function (e) {
        e.preventDefault();   
        Swal.fire({
            title: 'Estas seguro(a) de eliminar este registro?',
            text: "Si eliminas el registro no lo podras recuperar jamás!",
            icon: 'question',
            showCancelButton: true,
            showConfirmButton:true,
            confirmButtonColor: '#25ff80',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar..!',
            position:'center',        
        }).then((result) => {
            if (result.value) {
                var $form=$(this).parent();
                $form.append('<input name="_token" type="hidden" value="' + $('meta[name="csrf-token"]').attr('content') + '">');
                console.log('_token');
                $(this).parent().submit();
                Swal.fire(
                'Borrado Correctamente!',
                'El registro fue eliminado definitivamente.',
                'success')
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'No se eliminó el registro'
                })
            }
        })
    });
} );
</script>
@endsection


