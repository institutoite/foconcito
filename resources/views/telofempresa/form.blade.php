{{--dd($empresa_a_editar)--}}
<div class="form-group">
    <label for="nombre">Prefijo</label>
    <select name="prefijo" id="" class="form-control"  aria-describedby="nombreHelp">
        @foreach ($prefijos as $prefijo) 
            @isset($tel_a_editar)
                @if ($prefijo->prefijo==$tel_a_editar)
                    <option value="{{$prefijo->prefijo}}" selected>{{ $prefijo->prefijo.'('.$prefijo->pais.')' }} </option>    
                @else
                    <option value="{{$prefijo->prefijo}}">{{ $prefijo->prefijo.'('.$prefijo->pais.')' }} </option>    
                @endif
            @else    
                <option value="{{$prefijo->prefijo}}">{{ $prefijo->prefijo.'('.$prefijo->pais.')' }} </option>    
            @endisset 
        @endforeach                    					
    </select>
    <small id="nombreHelp" class="form-text text-muted">Favor seleccione prefijo de su pais.</small>
</div>

 <div class="form-group">
    <label for="nombre">Número telefónico</label>
    <input  type="number" name="numero" class="form-control" value="{{old('numero',$tel_a_editar->numero ?? '')}}" placeholder="Número de teléfono">
    <small id="nombreHelp" class="form-text text-muted">Favor introduzca su numero telefónico.</small>
</div>

 <div class="form-group">
    <label for="nombre">Detalle</label>
    <input  type="text" name="detalle" class="form-control" value="{{old('detalle',$tel_a_editar->detalle ?? '')}}" placeholder="Detalle de telefono"> 
    <small id="nombreHelp" class="form-text text-muted">Favor introduzca un detalle</small>
</div>


<input type="text" name="empresa_id" hidden value="{{$id}}">



