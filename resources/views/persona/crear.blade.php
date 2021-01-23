@extends('layout')

@section('titulo')
  Crear Contacto
@endsection

@section('css')
     <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">
@endsection
@section('contenido')           
    @can('persona_crear')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        @include('includes.form-error')
                        @include('includes.mensaje')     
                        
                        <div class="card card col-12 border-info p-2 mt-2"> 
                            
                            <div class="card-header bg-transparent d-flex">
                                <h3 class="card-title">FORMULARIO CREAR CLIENTE</h3>
                            </div>
                            <div class="card-body"  > 
                                <form action="{{ route('persona_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                    @csrf
                                        @include('persona.form')
                                        @include('includes.boton_crear')
                                </form>
                            </div>
                        </div> 
                    </div>    
                </div>
             
            </div>
        </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section('codigojs')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        $(function () {
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
        });

        function addRow() {
            $('tbody').find('tr').last().remove();
            var tr= '<tr>'+
                  '<td><input required type="text" name="detalle[]" class="form-control" value="" placeholder="Detalle Ejemplo:Personal, Oficina, Casa..."></td>'+
                  '<td><input required type="number" name="telefono[]" class="form-control" value="" placeholder="Número telefónico"></td>'+
                  '<td class="text-right"><h3> <i class="fas fa-times-circle text-danger remove"></i></h3></td>'+
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
                }
                $('#zone').html(html_select);
            });
            
          }

    </script>
@endsection