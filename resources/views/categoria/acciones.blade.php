
<a href="{{route('categoria_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta categoria">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>    

<a href="{{route('categoria_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver esta categoria">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>    

@can('categoria_eliminar', Categiria::class)
    <form action="{{route('categoria_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar esta categoria">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form> 
@endcan