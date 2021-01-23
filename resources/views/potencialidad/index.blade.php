

@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                              <!-- Horizontal Form -->
                    @include('includes.form-error')
                    @include('includes.mensaje')             
                    <div class="card card col-12 border-info">
                        <div class="card-header bg-transparent border-success d-flex">
                            <h3 class="card-title">ZONAS</h3>
                            <h3 class="card-title ml-auto"><a class="btn btn-info" href="{{route('zona_crear')}}"><i class="fas fa-plus-circle"></i>Nuevo</a></h3>
                        </div>
                        <div class="card-body"> 
                        
                            <table id="zonas" class="table table-hover table-bordered table-striped">
                                <thead class="bg-info">
                                    <th width="10px" >#</th>
                                    <th>Zona</th>
                                    <th>Ciudad</th>
                                    <th width="120px">Opciones</th>
                                </thead>
                
                            </table>
                           
                                </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div> <!-- FIN ROW -->
@endsection

@section('codigojs')
<script type="text/javascript">

$(document).ready(function() {
    
    $('#zonas').DataTable({ 
       "serverSide":true,
        "processing":true,
        "ajax":{
            url:"{{ route('zona_listar') }}",
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
        },
        "columns":[
            {data:'id'},
            {data:'zona'},
            {data: 'ciudad'},
            {data:'btn',orderable:false, searchable:false},
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


