<div class="row"> 
    <div class="input-group mb-3 col-12" >
        <input  type="text" name="constante" class="form-control" value="{{old('constante',$constante_a_editar->constante ?? '')}}" placeholder="Ingrese una nombre de la  constante nueva">
    </div>
</div>

<div class="row"> 
    <div class="input-group mb-3 col-12" >
        <input  type="text" name="valor" class="form-control" value="{{old('valor',$constante_a_editar->valor ?? '')}}" placeholder="Ingrese valor constante">
    </div>
</div>
