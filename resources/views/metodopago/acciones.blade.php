<a href="{{route('metodopago_editar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar esta categoria">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{route('metodopago_mostrar', $id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Ver este Medoto de Pago">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>
@can('metodopago_eliminar')
    <form action="{{route('metodopago_eliminar', $id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este Meotodo de Pago">
            <i class="fa fa-fw fa-trash text-danger"></i>   
        </button>
    </form> 

@endcan