@extends('layout')

@section('titulo')
  Editar Persona
@endsection

@section('contenido')     
    @can('persona_actualizar')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                   
                        <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">FORMULARIO EDITAR PERSONA</h3>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('persona_actualizar',['id'=>$persona_a_editar->id]) }}"  id="form-general form-editar" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    @include('persona.form')
                                    @include('includes.boton_actualizar')
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
        $('#city').on('change', Load_zones);
            $('table').on('click','.addRow',addRow);  // agrega una fila
            $('table').on('click','.remove',function(){ // elimina una fila
            var cantidadFilas=$('tbody tr').length;
            console.log(cantidadFilas);
                if (cantidadFilas==2){
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                    Toast.fire({
                    icon: 'error',
                    title: 'Registra al menos un número telefónico'
                    })
                }else{
                    $(this).parent().parent().parent().remove(); 
                }
               
            });     
        var persona_editar= <?php  echo $persona_a_editar->id ?>    
        CargarTelefonos(persona_editar);

        function CargarTelefonos(id) {
            $.ajax({
	        url:"{{ route('telefonos_persona')}}",
            data : { id : id },
	        success: function(respuesta) {
                 htmlLocal='<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                for(let i = 0; i < respuesta.length; i++) {
                   var tr= '<tr>'+
                  '<td><input required type="text" name="detalle[]" class="form-control" value="'+ respuesta[i].detalle +'" placeholder="detalle del telefono"></td>'+
                  '<td><input required type="phone" name="telefono[]" class="form-control" value="'+ respuesta[i].numero +'" placeholder="numero telefonico"></td>'+
                  '<td class="text-right"><h3> <i class="fas fa-times-circle text-danger remove"></i></h3></td>'+
                  '</tr>' ;
                  $('tbody').append(tr);
                }
                 $('tbody').append('<tr>'+
                '<td colspan="3" class="text-right"> <h3 > <a href="#" class="addRow text-success">  <i class="fas fa-plus-circle"></i></a> </h3>' + '</td>'+ 
                '</tr>');
                var ultima=fila     
	        },
	        error: function() {
            console.log("No se ha podido obtener la información");
            }
        });
        }
        function addRow() {
            $('tbody').find('tr').last().remove();
            var tr= '<tr>'+
                  '<td><input required type="text" name="detalle[]" class="form-control" value="" placeholder="detalle del telefono"></td>'+
                  '<td><input required type="phone" name="telefono[]" class="form-control" value="" placeholder="numero telefonico"></td>'+
                  '<td><h3> <i class="fas fa-times-circle text-danger remove"></i></h3></td>'+
                  '</tr>' ;
                  $('tbody').append(tr);
                  $('tbody').append('<tr>'+
                '<td colspan="3" class="text-right"> <h3 > <a href="#" class="addRow text-success">  <i class="fas fa-plus-circle"></i></a> </h3>' + '</td>'+ 
                '</tr>');
        }
         function Load_country(){
            var country_id = $(this).val();
            if(!country_id){
                $('#city').html('<option value="">Seleccione una Ciudad </option>');
                return;
            }
            $.get('/api/pais/'+ country_id +'/ciudades',function (data) {
                var html_select='<option value="">Seleccione una Ciudad </option>';
                for (var i = 0; i < data.length; i++) {
                    html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                }
                $('#city').html(html_select);
            });
        }
        

         function Load_zones(){
            var city_id = $(this).val();
            if(!city_id){
                $('#zone').html('<option value="">Seleccione una zona </option>');
            return;
            }
            $.get('/api/ciudad/'+ city_id +'/zonas',function (data) {
                var html_select='<option value="">Seleccione una zona </option>' ;
                for (var i = 0; i < data.length; i++) {
                    html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
                    console.log(html_select);
                }
                $('#zone').html(html_select);
            });
          }

          

    });
</script>
@endsection