

@extends('layout')

@section('titulo')
  Listar Pagos
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">                          
@endsection

@section('contenido')


 
    <div class="row">
        <div class="col-lg-12">  
            <div class="card-header border-success d-flex mt-3">
                <h3 class="card-title">TOTAL PAGOS: <strong>Bs.  {{ $plata ?? '0' }}</strong> </h3>
                
            </div>
            <div class="card-body"> 
                <table id="pagos" class="table table-sm display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fechahora</th>
                            <th>Comprobante</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- FIN ROW -->
@endsection



@section('codigojs')
<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">


$(document).ready(function() {
    
    $('#pagos').DataTable({ 
        "createdRow": function( row, data, dataIndex){
            if( data['monto'] > 0){
                $(row).addClass('bg-cyan');
            }
            
        },
       "serverSide":true,
        "processing":true,
        "ajax":{
            url:"{{ route('pago_listar') }}",
           
            error : function(xhr, status) {
                alert('Disculpe, existió un problema'.status);
            },
        },
        "order": [[ 4, "asc" ]],
        "columns":[
          
             {data:'id'},
            {data:'nombre'},
            {data:'created_at'},
           // {data:'metodo',
            //},
            {
                data:'metodo',
                name:'metodo',
                render:function(data){
                    if (data=='tigomoney')
                    var x="<img class='img-thumbnail' src='{{asset('imagenes/tigo.png')}}' alt='{{"+data+"}}' width='70'/>";

                    if (data=='transferenciabnbdavid')
                    var x="<img class='img-thumbnail' src='{{asset('imagenes/davidbnb.jpg')}}' alt='{{"+data+"}}' width='70'/>";
                    
                    if (data=='transferenciabnblilita')
                    var x="<img class='img-thumbnail' src='{{asset('imagenes/lidiabnb.jpg')}}' alt='{{"+data+"}}' width='70'/>";
                    return  x;
                },
            },
            {data:'monto',
            },
            {data:'btn',orderable:false, searchable:false},
            ],

            columnDefs: [
                        { responsivePriority: 1, targets: 1 },
                        { responsivePriority: 2, targets: 3 }
            ],
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


