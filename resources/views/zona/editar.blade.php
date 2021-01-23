@extends('layout')

@section('titulo')
  Editar Zona
@endsection


@section('contenido')
    @can('zona_actualizar')
        <div class="row">
            <div class="col-lg-12">
                @include('includes.form-error')
                @include('includes.mensaje')             
                <div class="card-header bg-cyan mt-3">
                    <h3 class="card-title">FORMULARIO EDIAR ZONA</h3>
                </div>
                <form action="{{ route('zona_actualizar',['id'=>$zona_a_editar->id]) }}"  id="form-general" class="form-vertical form-" method="post" autocomplete="on">
                    @csrf
                    <div class="card-body"> 
                        @include('zona.form')
                    </div>

                    <div class="card-footer">   
                        @include('includes.boton_actualizar')
                    </div>
                </form>    
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan
@endsection


@section('codigojs')


<script>
    $(document).ready(function(){
        $('#country').on('change', cargarciudades);  
    });	
       function cargarciudades(){
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
</script>
    
@endsection

