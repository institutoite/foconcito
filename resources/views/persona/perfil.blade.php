@extends('layout')

@section('titulo')
  Mostrar Persona
@endsection


@section('contenido')

   {{--@can('empresario_perfil')--}}
        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-success d-flex mt-3">
                    <h3 class="card-title">NOMBRE: <strong> {{ $persona->nombre.' '.$persona->apellidos }} </strong> </h3>
                    
                    <h3 class="card-title ml-auto"><a class="btn bg-cyan" href="{{route('telefono_crear',$persona->id)}}"><i class="fas fa-plus-circle"></i>Agreagar mas Teléfonos</a></h3>
                
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
                                        <a class="btn btn-success btn-sm" target="_blanck" href="https://api.whatsapp.com/send?phone={{$telefono->prefijo.$telefono->numero}}"><i class="fab fa-whatsapp"></i>Probar</a>
                                          <a href="{{route('telefono_editar', $telefono->id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este número">
                                            <i class="fa fa-fw fa-edit text-primary"></i>
                                        </a>

                                    
                                            <form action="{{route('telefono_eliminar',['id' =>$telefono->id,'persona_id'=>$persona->id])}}" id="form{{$telefono->id}}" class="d-inline formulario" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button name="btn-eliminar" id="{{$telefono->id}}" type="submit" class="btn eliminar" title="Eliminar este Número">
                                                    <i class="fa fa-fw fa-trash text-danger"></i>   
                                                </button>

                                            </form> 
                                            
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- $telefonos->render() --}}
            </div>
        </div> <!-- FIN ROW -->
    {{-- @else 
        @include('includes.sinpermiso')
    @endcan
    --}}
    {{--@can('persona_mostrar')--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                              <!-- Horizontal Form -->
                            @include('includes.form-error')
                            @include('includes.mensaje')             
                                
                           {{--dd($persona)--}} 
                        <form action="{{ route('persona_actualizar',$persona->id) }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                        @csrf
                            <div class="form-group">
                                <!--label for="nombre">Nombre</label-->
                                <input type="text" name="nombre" value="{{ $persona->nombre}}" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Ingrese su Nombre">
                                <small id="nombreHelp" class="form-text text-muted">Favor introduzca su nombre.</small>
                            </div>
                              
                            <div class="form-group">
                                <!--label for="nombre">Apellidos</label-->
                                <input type="text" name="apellidos" value="{{ $persona->apellidos}}" class="form-control" id="apellidos" aria-describedby="apellidosHelp" placeholder="Ingrese sus apellidos">
                                <small id="apellidosHelp" class="form-text text-muted">Favor introduzca sus Apellidos.</small>
                            </div>
      
                            <div class="form-group">
                                <!--label for="nombre">Fecha Nacimiento</label-->
                                <input  class="form-control" type="date" name="fechanacimiento" value="{{$persona->fechanacimiento->formatLocalized('%Y-%m-%d')}}" id="">
                                <small id="nombreHelp" class="form-text text-muted">Fecha de nacimiento.</small>
                            </div>


                             <div class="form-group">
                                <!--label for="nombre">Fecha Nacimiento</label-->
                                <select class="form-control" name="genero" id="genero">
                                    <option value=""> Elija tu genero</option>
                                
                                        @isset($persona)      
                                            @if($persona->genero=="MUJER")
                                                <option value="{{ $persona->genero }}" {{ "MUJER"==$persona->genero ? 'selected':''}} >{{ $persona->genero }}</option>
                                                <option value="HOMBRE">HOMBRE</option>
                                            @else
                                                <option value="{{ $persona->genero }}" {{ "HOMBRE"==$persona->genero ? 'selected':''}} >{{ $persona->genero }}</option>
                                                <option value="MUJER" >MUJER</option>
                                            @endif
                                        @else
                                            <option value="MUJER" >MUJER</option>
                                            <option value="HOMBRE" >HOMBRE</option>
                                        @endisset    
                                </select>
                                <small id="nombreHelp" class="form-text text-muted">Elija género.</small>
                            </div>

                            <div class="form-group">
                                <!--label for="nombre">Pais</label-->
                                <select class="form-control" name="pais_id" id="country">
                                    <option value=""> Elija un pais</option>
                                        @foreach ($paises as $item)
                                            @isset($persona) 
                                                <option value="{{ $item->id }}" {{ $item->pais==$persona->pais ? 'selected':''}} >{{ $item->pais }}</option>
                                            @else
                                                <option value="{{ $item->id }}" {{ old('pais_id') == $item->id ? 'selected':'' }} >{{ $item->pais }}</option>
                                            @endisset 
                                        @endforeach
                                </select>
                                <small id="nombreHelp" class="form-text text-muted">Favor seleccione su pais.</small>
                            </div>

                             <div class="form-group">
                                <!--label for="nombre">Ciudad</label--->
                                <select class="form-control" name="ciudad_id" id="city">
                                    <option value=""> Elija un ciudad</option>
                                        @foreach ($ciudades as $item)
                                            @isset($persona) 
                                                <option value="{{ $item->id }}" {{ $item->ciudad==$persona->ciudad ? 'selected':''}} >{{ $item->ciudad }}</option>
                                            @endisset
                                        @endforeach
                                </select>
                                <small id="nombreHelp" class="form-text text-muted">Favor seleccione su ciudad actual.</small>
                            </div>

                             <div class="form-group">
                                <!--label for="nombre">Zona</label-->
                                <select class="form-control" name="zona_id" id="zone">
                                    <option value=""> Elija un zona</option>
                                        @foreach ($zonas as $item)
                                            @isset($persona) 
                                                <option value="{{ $item->id }}" {{ $item->zona==$persona->zona ? 'selected':''}} >{{ $item->zona }}</option>
                                            @endisset
                                        @endforeach
                                </select>
                                <small id="nombreHelp" class="form-text text-muted">Favor seleccione la zona actual donde vive.</small>
                            </div>
                            <div class="row"> 
                                <div class="input-group mb-3 col-12" >
                                    <input hidden  type="text" value="empresario" name="tipo" class="form-control">
                                </div>
                            </div>

                                @include('includes.boton_actualizar')

                        </form>                                               
                        </div>    
                    </div>
                </div>
            </div> <!-- FIN ROW -->
        </div>  
    {{--@else 
        @include('includes.sinpermiso')
    @endcan--}} 


    
@endsection

@section('codigojs')

<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">


$(document).ready(function() {
    $('#country').on('change', Load_country);
    $('#city').on('change', Load_city); 

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
 function Load_country(){
        var country_id = $(this).val();
        console.log(country_id);
        if(!country_id){
            $('#city').html('<option value="">Seleccione una Ciudad </option>');
        return;
        }
        $.get('/api/pais/'+ country_id +'/ciudades',function (data) {
            var html_select='<option value="">Seleccione una Ciudad </option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                //console.log(html_select);
            }
            $('#city').html(html_select);
        });
    }

    function Load_city(){
        var city_id = $(this).val();
        if(!city_id){
            $('#zone').html('<option value="">Seleccione una Zona </option>');
        return;
        }
        $.get('/api/ciudad/'+ city_id +'/zonas',function (data) {
            var html_select='<option value="">Seleccione una Zona </option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
                console.log(html_select);
            }
            $('#zone').html(html_select);
        });
    }

} ); 
</script>
@endsection
