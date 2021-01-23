@extends('layout')

@section('titulo')
  Orden Listar
@endsection

@section('css')
     <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">
                                 
@endsection
@section("contenido")
    @can('orden_listar')
        <div class="row">
            <div class="col-lg-12">    
            @include('includes.form-error')
            @include('includes.mensaje')            
            
                <table id="ordenes" class="table table-sm display responsive nowrap" cellspacing="0"  width="100%">
                    <thead class="bg-cyan">
                       
                        <th>#</th>
                        <th >PERSONA</th>
                        <th >EMPRESA</th>
                        <th >FECHAINICIO</th>
                        <th >FECHAFIN</th>
                        <th >Acciones</th>
                    </thead>
                </table>   
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section("codigojs")
 <script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
                 
<script type="text/javascript">
$(document).ready(function(){
    
    var table=$("#ordenes").DataTable({ 
       "serverSide":true,
        "processing":true,
        "ajax":{
            url:"{{ route('orden_listar') }}",
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
        },
        "order": [[ 0, "desc" ]],
        "columns":[
            /*{
                "className":'details-control',
                "orderable":false,
                "data":null,
                "defaultContent": ''
            },*/
            {data:'id'},
            {data:'nombre'},
            {data: 'empresa'},
            {data: 'inicio'},
            {data: 'fin'},
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
        },
        "responsive":true,
        
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
      var htmldetalle='';
      $('#personas tbody').on('click','td.details-control', function(){
        //console.log($(this));
        var tr = $(this).closest('tr');
        //console.log(tr);
        var row = table.row( tr );
        
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            console.log("abre");
            format(row.data(),function(htmlLocal) {
                if (htmlLocal.length==82){
                    row.child('<tr><td>No hay detalles</td></tr>').show();
                }else{
                   row.child(htmlLocal).show();     
                }
            });
            tr.addClass('shown');
        }
    } );


    function format(d,callback) {
    // `d` is the original data object for the row
        var htmlLocal="";
        console.log(d.id);
        $.ajax({
	        url:"{{ route('telefonos_persona')}}",
            data : { id : d.id },
	        success: function(respuesta) {
                 htmlLocal='<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                for(let i = 0; i < respuesta.length; i++) {
                    //console.log(respuesta[i].detalle);  
                    htmlLocal+='<tr>'+
                                  '<td>'+respuesta[i].detalle+'</td>'+
                                  '<td>'+respuesta[i].numero+'</td>'+
                                  '</tr>';

                }

                    htmlLocal+='</tr>';
                    callback(htmlLocal);
                    
                      
	        },
	        error: function() {
            console.log("No se ha podido obtener la información");
            }
        });
        
    return htmldetalle;
}

} );
</script>
@endsection


