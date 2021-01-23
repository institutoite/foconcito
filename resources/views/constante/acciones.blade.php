<a href="{{route('constante_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta constante">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('constante_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta constante">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>
@can('constante_eliminar')
    <form action="{{route('constante_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta constante">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form> 
@endcan