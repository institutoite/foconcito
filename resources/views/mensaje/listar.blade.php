

@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojione@4.0.0/extras/css/emojione.min.css"/>
@endsection

@section("contenido")
    @can('mensaje_listar')
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
                                <h3 class="card-title ml-auto"><a class="btn btn-info" href="{{route('mensaje_crear')}}"> + Nuevo</a></h3>
                            </div>
                            <div class="card-body"> 
                                <table id="mensajes" class="table emojionearea">
                                    <thead class="bg-info">
                                        <th width="10px" >#</th>
                                        <th>Nombre</th>
                                        <th>Mensaje</th>
                                        <th width="120px">Opciones</th>
                                    </thead>
                                    <tbody>

                                        {{--dd($mensajes)--}}
                                        @foreach ($mensajes as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{$item->nombre}}</td>
                                                <td>{{$item->mensaje}}</td>
                                                <td>
                                                    <a href="{{route('mensaje_editar', $item->id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta Mensaje">
                                                    <i class="fa fa-fw fa-edit text-primary"></i>
                                                    </a>

                                                    <a href="{{route('mensaje_mostrar', $item->id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta Mensaje">
                                                        <i class="fa fa-fw fa-eye text-primary"></i>
                                                    </a>
                                                    
                                                    <form action="{{route('mensaje_eliminar', $item->id)}}" id="form{{$item->id}}" class="d-inline formulario" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button name="btn-eliminar" id="{{$item->id}}" type="submit" class="btn eliminar" title="Eliminar esta Mensaje">
                                                            <i class="fa fa-fw fa-trash text-danger"></i>   
                                                        </button>
                                                    </form> 
                                                </td>  
                                            </tr>
                                        @endforeach

                                    </tbody>
                    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/emojione@4.0.0/lib/js/emojione.min.js"></script>
<script type="text/javascript">



  

$(document).ready(function(){




  $("#mensajes").on('load',function(){
    $('#mensajes tr').each(function () {
        var ObjetoTD = $(this).find("td").eq(2);
        ObjetoTD.html(emojione.shortnameToImage(ObjetoTD.text()));
    });    
  });

  $('#mensajes').on('load', function() {   
  });
  $('#mensajes').trigger('load')
  $('#mensajes').change();
    
    
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


