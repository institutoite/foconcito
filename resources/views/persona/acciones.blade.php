<a href="{{route('persona_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta Persona">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('persona_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta Persona">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<a href="{{route('telefono_listar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta Persona">
    <i class="fa fa-fw fa-phone text-primary"></i>
</a>

@can('persona_eliminar')
    <form action="{{route('persona_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta Persona">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form>     
@endcan
