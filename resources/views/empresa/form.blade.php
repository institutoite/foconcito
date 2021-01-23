{{--dd($empresa_a_editar)--}}
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group mb-3" >
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group mb-3" >
                <input  type="text" name="empresa" class="form-control" value="{{old('empresa',$empresa_a_editar->empresa ?? '')}}" placeholder="Ingrese el nombre de su empresa">
                 <small id="nombreHelp" class="form-text text-muted">Favor introduzca el nombre de su empresa</small>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2" >
                <select class="form-control" name="categoria_id" id="categoria">
                    <option value="">Seleccione una Categoría</option> 
                        @foreach ($categorias as $item)
                            @isset($empresa_a_editar)     
                                <option value="{{ $item->id }}" {{ $item->id==$empresa_a_editar->categoria_id ? 'selected':''}} >{{ $item->categoria }}</option>
                            @else
                                <option value="{{ $item->id }}" {{ old('categoria_id') == $item->id ? 'selected':'' }} >{{ $item->categoria }}</option>
                            @endisset 
                        @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2" >
                <select class="form-control" name="pais_id" id="country">

                        <option value="" selected> Elija una país</option>
                    @foreach ($paises as $pais)
                                @isset($empresa_a_editar)     
                                    <option value="{{ $pais->id }}" {{ $pais->id==$empresa_a_editar->pais_id ? 'selected':''}} >{{ $pais->pais }}</option>
                                @else
                                    <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->pais }}</option>
                                @endisset 
                    @endforeach
                </select>
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2" >
                <select class="form-control" name="ciudad_id" id="city">
                    @isset($empresa_a_editar)
                        @foreach ($ciudades as $citys)
                            @isset($empresa_a_editar)     
                               <option value="{{ $citys->id }}" {{ $citys->id==$empresa_a_editar->ciudad_id ? 'selected':''}} >{{ $citys->ciudad }}</option>
                            @else
                                <option value="{{ $citys->id }}" {{ old('ciudad_id') == $citys->id ? 'selected':'' }} >{{ $citys->ciudad }}</option>
                            @endisset 
                            
                        @endforeach
                    @else 
                        <option value=""> Elija una ciudad</option>
                    @endisset
                </select>
                <a href="{{route('ciudad_crear')}}"> <i class="fas fa-plus-circle fa-2x text-success"></i> </a>
            </div>        
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2" >
                <select class="form-control" name="zona_id" id="zone">
                    @isset($empresa_a_editar)
                        @foreach ($zonas as $zones)
                            <option value="{{ $zones->id }}" {{ $zones->id==$empresa_a_editar->zona_id ? 'selected':''}} >{{ $zones->zona }}</option>
                        @endforeach
                    @else 
                        <option value=""> Elija una Zona</option>
                    @endisset
                </select>
                <a href="{{route('zona_crear')}}"> <i class="fas fa-plus-circle text-success fa-2x"></i> </a>
            </div>
            @isset($empresa_a_editar)
            @else
                @if(count($ordenes)==0)
                    <div class="alert alert-danger" role="alert">
                        <strong> No existen ordenes activas </strong> <a href="{{ route('pago_formas')}}" class=""> <i class="fas fa-cart-plus"></i>Conseguir orden</a>
                    </div>
                @endif
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group mb-3">
                   
                    <select class="form-control" name="orden_id" id="orden_id">
                            <option value="" selected> Una orden de pago</option>
                        @foreach ($ordenes as $orden)
                                    @isset($empresa_a_editar)     
                                        <option value="{{ $orden->id }}" {{ $orden->id==$empresa_a_editar->orden_id ? 'selected':''}} >{{ 'ORDEN-'.$orden->created_at}}</option>
                                    @else
                                        <option value="{{ $orden->id }}" {{ old('orden_id') == $orden->id ? 'selected':'' }} >{{ 'ORDEN- '.$orden->id.$orden->created_at }}</option>
                                    @endisset 
                        @endforeach
                    </select>
                    <small id="nombreHelp" class="form-text text-muted">Favor la Dirección de su empresa</small>
                    
                </div>
                
            @endif
        </div>
    </div>   

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group mb-3" >
        <div class="row"> 
            <div class="col-12">
                <strong>Suba una imagen de perfil o logotipo(Opcional)</strong>
            </div>
        </div>
        
        <div class="row"> 
            <div class="col-12">
                <input type="file" accept=".png, .bmp, .jpg, .jpeg, .gif" name="logo" id="logo" data-initial-preview="{{ isset($empresa_a_editar->logo) ? Storage::url($empresa_a_editar->logo) : Storage::url('logos/sinlogo.png')}}"  data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus">
            </div>
        </div>
        
    </div>   

    
</div>

<div class="form-group">
   
    <input  type="text" name="direccion" class="form-control" value="{{old('direccion',$empresa_a_editar->direccion ?? '')}}" placeholder="ingrese la direccion de su empresa">    
    <small id="nombreHelp" class="form-text text-muted">Favor la Dirección de su empresa</small>
</div>


<div class="form-group">
   
    <textarea  class="form-control" name="detalle" id="detalle" cols="30" rows="10">
            {{ old('detalle', $empresa_a_editar->detalle ?? '')}}
        </textarea>
    <small id="nombreHelp" class="form-text text-muted">Favor introduzca el detalle de su producto</small>
</div>




