<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2" >
        <input  type="text" name="nombre" class="form-control" value="{{old('nombre',$mensaje_a_editar->nombre ?? '')}}" placeholder="ingrese un  nombre de mensaje a">
    </div>
</div>

<textarea class="emojionearea mb-3 mensaje" name="mensaje" id="mensaje" cols="80">
    {{ old('mensaje',$mensaje_a_editar->mensaje ?? '')}}
</textarea>




