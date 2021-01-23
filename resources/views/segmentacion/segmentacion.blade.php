@extends('layout')

@section('titulo')
  segmentación
@endsection


@section('contenido')           
    @can('segmentar')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                    
                        <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title"> <strong>SEGMENTASION:</strong> Elije <strong>Una o Más</strong> opciones de segmentación </h3>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('segmentar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    @include('segmentacion.form')
                                    @include('includes.boton_crear')
                            </form>
                        </div> 
                    
                </div>    
            </div>
    @else 
        @include('includes.sinpermiso')
    @endcan
@endsection

@section('codigojs')

<script type="text/javascript">
    $(document).ready(function(){

            $('#country').on('change', Load_country);
            $('#city').on('change', Load_city);
        
            
    });	
    function Load_country(){
        var country_id = $(this).val();
        console.log(country_id);
        if(!country_id){
            $('#city').html('<option value="">Seleccione una Ciudad </option>');
        return;
        }
        $.get('/api/pais/'+ country_id +'/ciudades',function (data) {
            var html_select='<option value="">Seleccione una Ciudad </option>'+
                             '<option value="0">Todos</option>';
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
            var html_select='<option value="">Seleccione una Zona </option>'+
                            '<option value="0">Todos </option>' ;
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
                console.log(html_select);
            }
            $('#zone').html(html_select);
        });
    }

$('#edad_facil').on('click',segmentar_edad_facil);
$('#edad_custom').on('click',segmentar_edad_custom);

$('#registro_facil').on('click',segmentar_registro_facil);
$('#registro_custom').on('click',segmentar_registro_custom);
 

 
function segmentar_edad_facil(){
    $('#edad_customd .form-control').prop('disabled',true);
    $('#edad_facild .form-control').prop('disabled',false);
}
function segmentar_edad_custom(){
    $('#edad_customd .form-control').prop('disabled',false);
    $('#edad_facild .form-control').prop('disabled',true);
}


function segmentar_edad_facil(){
    $('#registro_customd .form-control').prop('disabled',true);
    $('#registro_facild .form-control').prop('disabled',false);
}
function segmentar_edad_custom(){
    $('#registro_customd .form-control').prop('disabled',false);
    $('#registro_facild .form-control').prop('disabled',true);
}
</script>
@endsection