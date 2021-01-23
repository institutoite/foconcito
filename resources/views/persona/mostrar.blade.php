@extends('layout')

@section('titulo')
  Mostrar Persona
@endsection


@section('contenido')

   @can('empresa_listar')
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-success d-flex mt-3">
                    <h3 class="card-title">PERFIL DE: <strong> {{ $persona->nombre.' '.$persona->apellidos }} </strong> </h3>
                    
                </div>
                <div class="card-body"> 
                    <table id="telofempresas" class="table table-hover table-bordered table-striped">
                        <thead class="bg-cyan">
                        
                            <th>#</th>
                            <th>Numero</th>
                            <th>Detalle</th>
                            <th>Actualizado</th>
                            <th>Contactar</th>
                        </thead>
                        <tbody>
                            @foreach ($telefonos as $telefono)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$telefono->numero}}</td>
                                    <td>{{$telefono->detalle}}</td>
                                    <td>{{$telefono->updated_at}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="https://api.whatsapp.com/send?phone={{$telefono->prefijo.$telefono->numero}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- $telefonos->render() --}}
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan

    @can('persona_mostrar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                              <!-- Horizontal Form -->
                            @include('includes.form-error')
                            @include('includes.mensaje')             
                        
                        {{-- dd($manera) --}}
                           

                        {{--<div class="card bg-transparent mb-3" style="max-width: 100%;">--}}

                            <h3 class="card-title text-center"><strong> DATOS PERSONALES </strong> </h3>
                            <div class="card-body">
                                
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="bg-cyan">
                                        <tr>
                                            <th>ATRIBUTO</th>
                                            <th>VALOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td>NOMBRES</td>
                                            <td>{{ $persona->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <td>APELLIDOS</td>
                                            <td>{{ $persona->apellidos}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>FECHA NACIMIENTO</td>
                                            <td>{{ $persona->fechanacimiento->isoph pFormat('DD MMMM YYYY')}} <p class="text-gray">{{ $persona->fechanacimiento->diffForHumans() }} </p> </td>
                                        </tr>
                                        <tr>
                                            <td>TIPO</td>
                                            <td>{{ $persona->tipo}}</td>
                                        </tr>
                                        <tr>
                                            <td>PAIS</td>
                                            <td>{{ $persona->pais}}</td>
                                        </tr>
                                        <tr>
                                            <td>CIUDAD</td>
                                            <td>{{ $persona->ciudad}}</td>
                                        </tr>
                                        <tr>
                                            <td>ZONA</td>
                                            <td>{{ $persona->zona}}</td>
                                        </tr>
                                        <tr>
                                            <td>CREADO</td>
                                            <td>{{ $persona->created_at}}</td>

                                        </tr>
                                        <tr>
                                            <td>ACUALIZADO</td>
                                            <td>{{ $persona->updated_at}}</td>
                                        </tr>
                                    </tbody>      
                                </table>
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

<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">


$(document).ready(function() {

    $('#telofempresas').DataTable({ 
     
       
        
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
            "info": "Registro _START_ / _TOTAL_",
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
