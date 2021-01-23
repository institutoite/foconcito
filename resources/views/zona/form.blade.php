

<div class="row">
    <div class="col-12 input-group mb-2" >
        <select class="form-control" name="pais_id" id="country">
            <option value=""> Elija una país</option>
            @foreach ($paises as $pais)
                @isset($zona_a_editar)     
                    <option  value="{{$pais->id}}" {{$pais->id==$zona_a_editar->pais_id ? 'selected':''}}>{{$pais->pais}}</option>     
                @else
                    <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->pais }}</option>
                @endisset 
            @endforeach
        </select>
    </div>
</div>
 

<div class="row"> 
    <div class="input-group mb-3 col-12" >
        {{--dd($ciudades)--}}
        <select class="form-control" name="ciudad_id" id="city">
            <option value=""> Elija una ciudad</option>
            @foreach ($ciudades as $item)
                @isset($zona_a_editar)     
                    <option value="{{ $item->id }}" {{ $item->id==$zona_a_editar->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                {{--@else
                    <option value="{{ $item->id }}" {{ old('ciudad_id') == $item->id ? 'selected':'' }} >{{ $item->ciudad }}</option>
                --}}
                @endisset 
            @endforeach
        </select>
         <a href="{{route('ciudad_crear')}}"> <i class="fas fa-plus-circle text-success fa-2x"></i> </a>
    </div>
</div>

<div class="row"> 
    <div class="input-group mb-3 col-12" >
        <input  type="text" name="zona" id="zona" class="form-control" style="position:relative" value="{{old('zona',$zona_a_editar->zona ?? '')}}" placeholder="ingrese una zona" autocomplete="off">
        <div id="listazonas"></div>
    </div>
    
</div>


