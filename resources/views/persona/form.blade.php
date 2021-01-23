
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
        <input  type="text" name="nombre" class="form-control" value="{{old('nombre',$persona_a_editar->nombre ?? '')}}" placeholder="Ingrese un  nombre">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 input-group mb-2" >
        <input  type="text" name="apellidos" class="form-control" value="{{old('apellidos',$persona_a_editar->apellidos ?? '')}}" placeholder="Ingrese sus apellidos">
    </div>
    
</div>

<div class="row"> 
    
    @isset($persona_a_editar)
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group mb-2" >
            <label for="">Fecha Nacimiento</label> 
            <input  type="date" name="fechanacimiento" min="1900-01-01" class="form-control" value="{{old('fechanacimiento',$persona_a_editar->fechanacimiento->format('Y-m-d') ?? '')}}">
        </div>
    @else
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group mb-2" >
            <label for="">Fecha Nacimiento</label> 
            <input  type="date" name="fechanacimiento" min="1900-01-01" class="form-control" value="{{old('fechanacimiento' ?? '')}}">
        </div>
    @endisset
    
     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group mb-2" >
        <select class="form-control" name="genero" id="genero">
            <option value=""> Elija tu género</option>
            
                @isset($persona_a_editar)      
                    @if($persona_a_editar->genero=="MUJER")
                        <option value="{{ $persona_a_editar->genero }}" {{ "MUJER"==$persona_a_editar->genero ? 'selected':''}} >{{ $persona_a_editar->genero }}</option>
                        <option value="HOMBRE">HOMBRE</option>
                    @else
                        <option value="{{ $persona_a_editar->genero }}" {{ "HOMBRE"==$persona_a_editar->genero ? 'selected':''}} >{{ $persona_a_editar->genero }}</option>
                        <option value="MUJER" >MUJER</option>
                    @endif
                    
                @else
                    <option value="MUJER" >MUJER</option>
                    <option value="HOMBRE" >HOMBRE</option>
                @endisset    
        </select>
     
    </div>


</div>

 <div class="form-group">
    <!--label for="detalle">Pais</label-->
    <select class="form-control" name="pais_id" id="country">
                    <option value=""> Elija un pais</option>
                    @foreach ($paises as $item)
                        @isset($persona_a_editar) 
                            <option value="{{ $item->id }}" {{ $item->id==$persona_a_editar->pais_id ? 'selected':''}} >{{ $item->pais }}</option>
                        @else
                            <option value="{{ $item->id }}" {{ old('pais_id') == $item->id ? 'selected':'' }} >{{ $item->pais }}</option>
                        @endisset 
                    @endforeach
                </select>
        </select>
    <small id="nombreHelp" class="form-text text-muted">Seleccione pais de Origen del cliente</small>
</div>

 <div class="form-group">
    <!--label for="detalle">Ciudad</label-->
     <select class="form-control" name="ciudad_id" id="city">
                <option value=""> Elija una ciudad</option>
                    @foreach ($ciudades as $item)
                        @isset($persona_a_editar) 
                            <option value="{{ $item->id }}" {{ $item->id==$persona_a_editar->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                        @endisset 
                    @endforeach
            </select>
    <small id="nombreHelp" class="form-text text-muted">Seleccione ciudad de Origen del cliente</small>
</div>

<div class="form-group">
    <!--label for="detalle">Zona</label-->
      <select class="form-control" name="zona_id" id="zone">
                <option value="">Seleccione una Zona</option> 
                @foreach ($zonas as $item)
                        @isset($persona_a_editar) 
                            <option value="{{ $item->id }}" {{ $item->id==$persona_a_editar->zona_id ? 'selected':''}} >{{ $item->zona }}</option>
                        @endisset 
                    @endforeach
            </select>
    <small id="nombreHelp" class="form-text text-muted">Seleccione zona de Origen del cliente</small>
</div>




{{--<div class="row"> 
        
    
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
        
        <select class="form-control" name="pais_id" id="country">
                    <option value=""> Elija un pais</option>
                    @foreach ($paises as $item)
                        @isset($persona_a_editar) 
                            <option value="{{ $item->id }}" {{ $item->id==$persona_a_editar->pais_id ? 'selected':''}} >{{ $item->pais }}</option>
                        @else
                            <option value="{{ $item->id }}" {{ old('pais_id') == $item->id ? 'selected':'' }} >{{ $item->pais }}</option>
                        @endisset 
                    @endforeach
                </select>
        </select>
    </div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
            <select class="form-control" name="ciudad_id" id="city">
                <option value=""> Elija una ciudad</option>
                    @foreach ($ciudades as $item)
                        @isset($persona_a_editar) 
                            <option value="{{ $item->id }}" {{ $item->id==$persona_a_editar->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                        @endisset 
                    @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
            <select class="form-control" name="zona_id" id="zone">
                <option value="">Seleccione una Zona</option> 
                @foreach ($zonas as $item)
                        @isset($persona_a_editar) 
                            <option value="{{ $item->id }}" {{ $item->id==$persona_a_editar->zona_id ? 'selected':''}} >{{ $item->zona }}</option>
                        @endisset 
                    @endforeach
            </select>
            <small id="nombreHelp" class="form-text text-muted">Favor introduzca su numero telefonico.</small>
        </div>
</div>
--}}

<div class="row"> 
    <div class="input-group mb-3 col-12" >
        <input hidden  type="text" value="cliente" name="tipo" class="form-control">
        
    </div>
</div>
