<div class="row"> 
    <div class="input-group mb-3 col-12" >
        <input  type="text" name="zona" class="form-control" value="{{old('zona',$zona_a_editar->zona ?? '')}}" placeholder="ingrese una zona">
    </div>
</div>

<div class="row"> 
    <div class="input-group mb-3 col-12" >
        {{--dd($ciudades)--}}
        <select class="form-control" name="ciudad_id" id="">
                    <option value=""> Elija una ciudad</option>
                    @foreach ($ciudades as $item)
                        @isset($zona_a_editar)     
                            <option value="{{ $item->id }}" {{ $item->id==$zona_a_editar->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                        @else
                            <option value="{{ $item->id }}" {{ old('ciudad_id') == $item->id ? 'selected':'' }} >{{ $item->ciudad }}</option>
                        @endisset 
                    @endforeach
                </select>
        </select>
    </div>
</div>

