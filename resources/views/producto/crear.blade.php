@extends('layout')
@section('css')
  
    <link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
                        
@endsection
@section("contenido")
    <div class="row mt-3 p-3 justify-content-center align-content-center"> 
        <div class="col-11 mb-3 fondo-azul" >
            <div class="row">
                <div class="col-12  text-center text-gray">
                    <strong> Agregar más productos o servicios </strong>   
                </div>
                </div>
            
                    <form action="{{ route('imagen_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                        @csrf
                        @include('producto.form')

                    </form>
            </div>            
        </div>
@endsection

@section('codigojs')
    <script src="{{asset('lbgalery/js/gallery.js')}}"></script>
    
    <script src="{{asset('bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/themes/fas/theme.min.js')}}" type="text/javascript"></script>
  
    <script>
        $('#imagenes').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize:2000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });
    </script>
@endsection