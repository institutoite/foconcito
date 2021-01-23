@extends('layout')

@section('titulo')
  Editar Producto
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
@endsection

@section('contenido')  
    @can('imagen_actualizar')
        <div class="row">
            <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                    
                    <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">EDITAR PRODUCTO O SERVICIO</h3>
                    </div>
                    <div class="card-body"> 
                            {{--dd($imagen_a_editar)--}}

                        <form action="{{ route('imagen_actualizar',$imagen_a_editar->id) }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                            @csrf
                            
                          
                              <div class="form-group">
                                <label for="detalle">Seleccione imagen del producto</label>
                                <input type="file" name="imagen[]" accept=".png, .jpg, .jpeg" id="imagenes" data-initial-preview="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Agregar+Imagenes" multiple accept="image/*">                
                                
                            </div>
                                
                            <div class="form-group">
                                
                                <input  type="text" name="titulo" class="form-control" value="{{old('titulo',$imagen_a_editar->titulo ?? '')}}" placeholder="Ingrese un título">
                                <small id="nombreHelp" class="form-text text-muted">Favor introduzca un títutlo del producto o servicio</small>    
                            </div>


                            <div class="form-group">
                                <textarea  name="descripcion" class="form-control" value="{{old('descripcion',$imagen_a_editar->descripcion ?? '')}}" placeholder="Ingrese una descripcion del producto o servicio" rows="3">{{old('descripcion',$imagen_a_editar->descripcion ?? '')}}</textarea>
                                <small id="nombreHelp" class="form-text text-muted">Favor introduzca una descripcion del producto o servicio</small>    
                            </div>

{{--
                            <div class="form-group">
                                <input  type="text" name="descripcion" class="form-control" value="{{old('descripcion',$imagen_a_editar->descripcion ?? '')}}" placeholder="Ingrese una descripcion para el producto o servicio">
                                <small id="nombreHelp" class="form-text text-muted">Favor introduzca una descripcion del producto o servicio</small>    
                            </div>
--}}                        
                            <div class="form-group">
                                <input  type="number" name="costo" class="form-control" value="{{old('costo',$imagen_a_editar->costo ?? '')}}" placeholder="Ingrese un costo del producto o servicio">
                                <small id="nombreHelp" class="form-text text-muted">Favor introduzca el costo en Bs. del producto o servicio</small>    
                            </div>


                            <input type="text" hidden name="empresa_id" id="idempresa" value="{{$id}}">

                            <div class="text-center mb-2 mt-2">
                                <input type="submit" class="btn btn-success" value="Actualizar Producto Servicio">
                            </div>
                        </form>
                    </div> 
                </div>    
            </div>
    

            @if (count($imagenes)==0)
                <div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
                <div class="alert alert-success">
                    <ul>
                            <li>{{ "Ud. aun no tiene imagenes registrados para este producto" }}</li>
                    </ul>
                </div>
                </div>
            @endif
               @php
                   $i=1;
               @endphp 

             <div id="gallery">
                {{--dd($imagenes)--}}
                @foreach($imagenes as $ima)
                    @if ((($i-1) % 4==0)||($i==1))
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                                <div class="card text-white mb-3 borde-cyan" style="max-width: 36rem;">
            
                                        <div class="card-body">
                                                <img class="img-thumbnail zoomify" src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <form action="{{route('imagen_delete', $ima->id)}}" id="form{{$ima->id}}" class="d-inline formulario" method="POST">
                                            @csrf
                                                @method("delete")
                                                <button name="btn-eliminar" id="{{$ima->id}}" type="submit" class="btn" title="Eliminar esta imagen"><i class="fa fa-fw fa-trash text-danger"></i>   
                                                </button>
                                            </form>
                                        </div>
                                </div>
                                
                            </div>                            
                    @else    
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                                <div class="card text-white mb-3" style="max-width: 36rem;">
                                
                                        <div class="card-body">
                                                <img class="img-thumbnail zoomify" src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <form action="{{route('imagen_delete', $ima->id)}}" id="form{{$ima->id}}" class="d-inline formulario" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button name="btn-eliminar" id="{{$ima->id}}" type="submit" class="btn" title="Eliminar esta imagen"><i class="fa fa-fw fa-trash text-danger"></i>   
                                            </button>
                                        </form>
                                        </div>
                                        
                                        
                                </div>
                            </div> 
                        @if (($i) % 4 == 0)
                            </div>
                        @endif
                    @endif
                    @php
                        $i=$i+1;    
                    @endphp
                @endforeach
        </div>
    
    @else 
        @include('includes.sinpermiso')
    @endcan 

    

    
@endsection

@section('codigojs')
<script src="{{asset('lbgalery/js/gallery.js')}}"></script>
<script src="{{asset('bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap-fileinput/themes/fas/theme.min.js')}}" type="text/javascript"></script>

    

<script>
  
    $('#imagenes').fileinput({
        language:'es',
        //showCaption: true,
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize:4000,
        showUpload:true,
        showClose:false,
        initialPreviewAsData:true,
        
        dropZoneEnabled:false,
        theme:"fas",
    });
   
    
</script>    
@endsection

