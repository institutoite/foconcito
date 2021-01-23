
<a href="{{route('mensaje_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta Mensaje">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('mensaje_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta Mensaje">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<a href="{{route('bombardear',$id)}}" class="btn-accion-tabla tooltipsC" title="Compartir tu empresa con este cliente">
    <i class="fas fa-share-alt-square text-success"></i>
</a> 


@can('mensaje_eliminar')
    <form action="{{route('mensaje_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta Mensaje">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form> 
@endcan
    