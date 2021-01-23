@extends('layout')

@section('titulo')
  Editar Empresa
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
@endsection

@section('contenido')     
    @can('empresa_actualizar')
        <div class="row">
            <div class="col-12">
                @include('includes.form-error')
                @include('includes.mensaje')     
                    <div class="card-header bg-cyan mb-3 mt-3">
                        <h3 class="card-title">EDITAR DATOS DE MI EMPRESA</h3>
                    </div>
                        <form action="{{ route('empresa_actualizar',['id'=>$empresa_a_editar->id]) }}"  id="form-general" class="form-vertical" enctype="multipart/form-data" method="POST" autocomplete="on">
                            @csrf
                                @include('empresa.form')
                                @include('includes.boton_actualizar')
                        </form>
            </div>    
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section('codigojs')
    <script src="{{asset("ckeditor/ckeditor.js")}}"></script>
     <script src="{{asset('bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/themes/fas/theme.min.js')}}" type="text/javascript"></script>

   

    <script>
        $(document).ready(function(){
        $('#country').on('change', Load_country);
        $('#city').on('change', Load_city);
        CKEDITOR.config.height=200;
        CKEDITOR.config.width='100%';
        CKEDITOR.replace('detalle');
    });

     $('#logo').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize:2000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });


    function Load_country(){
        var country_id = $(this).val();
        console.log(country_id);
        if(!country_id){
            $('#city').html('<option value="">Seleccione una Ciudad </option>');
        return;
        }
        $.get('/api/pais/'+ country_id +'/ciudades',function (data) {
            var html_select='<option value="">Seleccione una Ciudad </option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                //console.log(html_select);
            }
            $('#city').html(html_select);
        });
    }

    function Load_city(){
        var city_id = $(this).val();
        if(!city_id){
            $('#zone').html('<option value="">Seleccione una Zona </option>');
        return;
        }
        $.get('/api/ciudad/'+ city_id +'/zonas',function (data) {
            var html_select='<option value="">Seleccione una Zona </option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
                console.log(html_select);
            }
            $('#zone').html(html_select);
        });
    }
    </script>
    	
@endsection

    