


@extends('layout')

@section('titulo')
  Listar Teléfonos
@endsection

@section('css')
     <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">
                                 
@endsection


@section('contenido')
    @can('empresa_listar')
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-success d-flex mt-3">
                    <h3 class="card-title">NUMEROS TELEFONICOS: <strong> {{ $persona->nombre.' '.$persona->apellidos }} </strong> </h3>
                    <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('telefono_crear',$persona->id)}}"><i class="fas fa-plus-circle"></i>Agreagar mas Teléfonos</a></h3>
                </div>
                <div class="card-body"> 
                    <table id="telofempresas" class="table table-hover table-bordered table-striped display responsive nowrap" width="100%">
                        <thead class="bg-cyan">
                        
                            <th>#</th>
                            <th>Número</th>
                            <th>Detalle</th>
                            <th>Creado</th>
                            <th width="120px">Opciones</th>
                        </thead>
                        <tbody>
                            @foreach ($telefonos as $telefono)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    
                                    <td>
                                    <a  href="https://api.whatsapp.com/send?phone={{$telefono->prefijo.$telefono->numero}}" target="_blank"> {{ $telefono->numero}} <i class="fab fa-whatsapp"></i>  </a>    
                                    </td>
                                    <td>
                                        {{$telefono->detalle}}
                                        
                                    </td>
                                    <td>{{$telefono->created_at}}</td>

                                    <td>
                                        <a href="{{route('telefono_editar', $telefono->id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este número">
                                            <i class="fa fa-fw fa-edit text-primary"></i>
                                        </a>
                                        {{--@can('telofemdspresa_eliminar')--}}
                                            <form action="{{route('telefono_eliminar',['id' =>$telefono->id,'persona_id'=>$persona->id])}}" id="form{{$telefono->id}}" class="d-inline formulario" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button name="btn-eliminar" id="{{$telefono->id}}" type="submit" class="btn eliminar" title="Eliminar este Número">
                                                    <i class="fa fa-fw fa-trash text-danger"></i>   
                                                </button>

                                            </form> 
                                             <a class="btn btn-success btn-sm" href="https://api.whatsapp.com/send?phone={{$telefono->prefijo.$telefono->numero}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        {{--@endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $telefonos->render() }}
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

    $('#telofempresas').DataTable({ 
       
       
        "responsive": true,
        "columnDefs": [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: -1 },
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
            "emptyTable":"No encontre números telefónicos",
            "infoEmpty":"",
            "infoFiltered":"",
            "zeroRecords":"No hay datos",  
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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


