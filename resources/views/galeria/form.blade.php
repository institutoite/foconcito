      
<input type="file" multiple accept=".png, .bmp, .jpg, .jpeg, .gif" name="imagen[]" id="imagen" data-initial-preview="{{isset($imagen_a_editar->foto) ? Storage::url($imagen_a_editar->foto):''}}">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
    <input  type="text" name="titulo" class="form-control" value="{{old('titulo',$imagen_a_editar->titulo ?? '')}}" placeholder="Ingrese un titulo">
</div>    
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
    <input  type="text" name="descripcion" class="form-control" value="{{old('descripcion',$imagen_a_editar->descripcion ?? '')}}" placeholder="Ingrese una descripcion para el producto o servicio">
</div>

<input type="text" hidden name="empresa_id" id="idempresa" value="{{$id}}">

<div class="text-center mb-2 mt-2">
    <input type="submit" class="btn btn-success" value="Agregar Imagen">
</div>
