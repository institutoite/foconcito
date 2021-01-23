<a href="{{route('usuario_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este usuario">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('usuario_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver este usuario">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action="{{route('usuario_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este usuario">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 