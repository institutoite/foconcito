
<div class="row">
    <div class="col-12 input-group mb-2" >
        <select class="form-control" name="pais_id" id="country">
            <option value=""> Elija una país</option>
            @foreach ($paises as $pais)
                @isset($ciudad_a_editar)     
                    <option  value="{{$pais->id}}" {{$pais->id==$ciudad_a_editar->pais_id ? 'selected':''}}>{{$pais->pais}}</option>     
                @else
                    <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->pais }}</option>
                @endisset 
            @endforeach
        </select>
    </div>
</div>
 
<div class="row"> 
    <div class="input-group mb-3 col-12" >
        <input  type="text" name="ciudad" class="form-control" value="{{old('ciudad',$ciudad_a_editar->ciudad ?? '')}}" placeholder="ingrese una ciudad">
    </div>
</div>

