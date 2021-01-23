@extends('layout')

@section('titulo')
  Listar Personas
@endsection


@section('css')
    <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">                          
@endsection
@section("contenido")
    @can('persona_listar')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive">  
                        @include('includes.form-error')
                        @include('includes.mensaje')            

                        <div class="card-header bg-transparent d-flex">
                            <h3 class="card-title">MIS CONTACTOS</h3>
                            <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('persona_crear')}}"><i class="fas fa-plus-circle"></i>Nuevo</a></h3>
                        </div>
                        <div class="card-body"> 
                            <table id="personas" class="table table-sm display responsive nowrap" width="100%" cellspacing="0">
                                <thead class="bg-cyan">
                                
                                    <th>#</th>
                                    <th >Nombre</th>
                                    <th >Apellidos</th>
                                    <th >Nacimiento</th>
                                    <th >Genero</th>
                                    <th >Opciones</th>
                                </thead>
                            </table>   
                        </div>
                    </div>
                </div> <!-- FIN ROW -->
            </div>
        </div>    
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section("codigojs")
 <script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
                 
<script type="text/javascript">
$(document).ready(function(){
    
    var table=$("#personas").DataTable({ 
         "createdRow": function( row, data, dataIndex){
            
            var Fecha=(data['fechanacimiento'].toString().substr(0,10));
            //console.log(Fecha);
            var dia=Fecha.substr(8,2) 
            var mes=Fecha.substr(5,2);
            var anio=Fecha.substr(0,4);
            
            $(row).find('td').eq(3).text(dia+'-'+mes+'-'+anio);
            
        },
       "serverSide":true,
        "processing":true,
        
        "ajax":{
            url:"{{ route('persona_listar') }}",
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
        },
        //"order": [[ 0, "desc" ]],
        "columns":[
            /*{
                "className":'details-control',
                "orderable":false,
                "data":null,
                "defaultContent": ''
            },*/
            {data:'id'},
            {data:'nombre'},
            {data:'apellidos'},

            {data: 'fechanacimiento'},
            {data: 'genero'},
            {data:'btn',orderable:false, searchable:false},
            ],
            columnDefs: [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 2, targets: -1 }
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
        },
        
        
        
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


