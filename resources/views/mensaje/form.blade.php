
<div class="form-group">
    <label for="detalle">Nombre Mensaje</label>
    <input  type="text" name="nombre" class="form-control" value="{{old('nombre',$mensaje_a_editar->nombre ?? '')}}" placeholder="ingrese un  nombre de mensaje a">
    <small id="nombreHelp" class="form-text text-muted">Favor introduzca nombre para el mensaje</small>
</div>

<div class="form-group">
    <label for="detalle">Mensaje</label>
    <textarea class="emojionearea mb-3 mensaje" name="mensaje" id="mensaje" cols="80">
        {{ old('mensaje',$mensaje_a_editar->mensaje ?? '')}}
    </textarea>
    <small id="nombreHelp" class="form-text text-muted">Favor introduzca un mensaje</small>
</div>
