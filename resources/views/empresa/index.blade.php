

@extends('layout')

@section('titulo')
  Listar Empresas
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">                     
@endsection

@section('contenido')
    @can('empresa_listar')
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-dark d-flex mt-3">
                    <h3 class="card-title">MIS EMPRESAS</h3>
                    <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('empresa_crear')}}"><i class="fas fa-plus-circle"></i>Crear Empresa</a></h3>
                    <h3 class="card-title ml-auto"><a href="{{ route('ordenes_empresario_listar')}}" class="btn btn-success"><i class="fas fa-eye text-white" title="Empresa publicada OK"></i>Publicar Empresa</a></h3>
                </div>

                <div class="card-body"> 
                    <table id="empresas" class="table table-hover table-bordered table-striped display responsive nowrap" style="width:100%">
                        <thead class="fondo">
                            
                            <th width="15px">id</th>
                            <th >Empresa</th>
                            <th>Estado</th>
                             <th>Estado</th>
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
<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">


$(document).ready(function() {
    var idEmpresa;
    $('#empresas').DataTable({ 
        "createdRow": function( row, data, dataIndex){
            if( data['publico'] == true){
                idEmpresa=data['id'];
                console.log(idEmpresa);
                $(row).children().eq(2).html('<i class="fas fa-check-circle text-success" title="Empresa publicada OK">Público</i>');
                url='<a href="{{route("empresa_galeria",["id" => "temp"])}}" class="btn btn-success">Gestionar</a>';
                url = url.replace('temp', idEmpresa);
                $(row).children().eq(3).html(url);
                
            }else
            {
                $(row).children().first().next().append('<a href="{{ route('ordenes_empresario_listar')}}" class="btn btn-warning float-right"><i class="fas fa-eye text-white" title="Empresa publicada OK"></i>Publicar</a>');
                $(row).find('td').last().append('<a href="{{ route('pago_formas')}}" class=""><i class="fas fa-exclamation-triangle text-warning" title="No esta visible para el público"></i></a>');
                $(row).children().eq(2).html('<i class="fas fa-times-circle text-warning" title="Empresa publicada OK">No Visible</i>');
            }
            //$(row).find('td').last().html();

        },
        "responsive": true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 }
        ],
      
        "processing":true,
   
        "ajax":{
            url:"{{ route('empresa_listar') }}",
           
            error : function(xhr, status) {
                alert('Disculpe, existió un problema'.status);
            },
        },
        "order": [[ 0, "desc" ]],
        "columns":[
          
             {data:'id'},
            {data:'empresa'},
            {data:'publico'},
            {data:'destacado'},
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


