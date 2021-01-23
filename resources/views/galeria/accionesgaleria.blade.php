
<div class="row mb-3 text-center">
    <div class="col-3">
    </div>

    <div class="col-3">
        <a href="{{route('imagen_editar',$ima->id)}}" class="btn mr-3" title="Editar esta imagen">
        <i class="fa fa-fw fa-edit text-primary fa-2x"></i>
    </a>
    </div>
    

    
    <div class="col-3">
    </div>

    <div class="col-3">
        <form action="{{route('imagen_eliminar', $ima->id)}}" id="form{{$id}}" class="d-inline formulario" method="POST">
        @csrf
        @method("delete")
        <button name="btn-eliminar" id="{{$ima->id}}" type="submit" class="btn" title="Eliminar esta imagen"><i class="fa fa-fw fa-trash text-danger fa-2x"></i>   
        </button>
    </form>
    </div>
     
</div>