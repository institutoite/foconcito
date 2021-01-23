<a href="{{route('ciudad_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta ciudad">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('ciudad_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta ciudad">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

@can('ciudad_eliminar')
<form action="{{route('ciudad_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta ciudad">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form> 
@endcan