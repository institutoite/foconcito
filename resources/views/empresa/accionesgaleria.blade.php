<div class="row mb-3 text-center">
    <div class="col-2">
    </div>

    
    <div class="col-2">
        <a href="{{route('imagen_editar', $ima->id)}}" class="btn mr-3" title="Editar este producto">
            <i class="fa fa-fw fa-edit text-primary"></i>
        </a>
    </div>
    
    <div class="col-2">

    </div>

    @can('imagen_eliminar')
        <div class="col-2">
            <form action="{{route('imagen_eliminar', $ima->id)}}" id="form{{$ima->id}}" class="d-inline formulario" method="POST">
                @csrf
                @method("delete")
                    <button name="btn-eliminar" id="{{$ima->id}}" type="submit" class="btn" title="Eliminar esta imagen"><i class="fa fa-fw fa-trash text-danger"></i>   
                    </button>
            </form>
        </div>
    @endcan
</div>