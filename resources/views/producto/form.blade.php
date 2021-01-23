
    <div class="mb-3 input-group">
        <input type="file" multiple accept=".png, .jpg, .jpeg, .gif" name="imagen[]" id="imagenes" data-initial-preview="{{ isset($imagen_a_editar->foto) ? Storage::url($imagen_a_editar->foto) : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Agregar+Imagen"}}" accept="image/*"   data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
    </div>
    
    <div class="form-group">
        <input  type="text" name="titulo" class="form-control" value="{{old('titulo',$imagen_a_editar->titulo ?? '')}}" placeholder="Ingrese un titulo o nombre del producto o servicio">
        <small id="nombreHelp" class="form-text text-muted">Favor introduzca un títutlo del producto o servicio</small>    
    </div>

    <div class="form-group">
        <textarea  name="descripcion" class="form-control" placeholder="Ingrese una descripcion del producto o servicio" rows="3">{{old('descripcion',$imagen_a_editar->descripcion ?? '')}}</textarea>
        <small id="nombreHelp" class="form-text text-muted">Favor introduzca una descripcion del producto o servicio</small>    
    </div>

    <div class="form-group">
        <input  type="number" name="costo" class="form-control" value="{{old('costo',$imagen_a_editar->costo ?? '')}}" placeholder="Ingrese un costo del producto o servicio">
        <small id="nombreHelp" class="form-text text-muted">Favor introduzca el costo en Bs. del producto o servicio</small>    
    </div>



    <input type="text" hidden name="empresa_id" id="idempresa" value="{{$id}}">

    <div c                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          lass="text-center mb-2 mt-2">
        <input type="submit" class="btn btn-outline-info" value="Agregar Producto o servicio">
    </div>
