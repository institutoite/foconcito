<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.app')


@section('content') 
    <div class="container">
           
            <div class="row">
                <div class="col-lg-12">
                    
                        @include('includes.form-error')
                        @include('includes.mensaje')             
                        
                                <div class="card-header bg-cyan mt-3">
                                <h3 class="card-title">Favor indique su radicatoria </h3> 
                                </div>
                                    <form action="{{ route('zona_config') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                        @csrf
                                        <div class="card-body"> 
                                            @include('zona.form')
                                        </div>    
                                        <div class="card-footer">   
                                           
                                            <div class="row">

                                                <div class="col-5" >
                                                </div>
                                                <div class="centrado col-2" >
                                                <button type="submit" id="guardar" class="btn btn-success btn-xs centrado">Finalizar</button>        
                                                </div>
                                                <div class="col-5">
                                                </div>

                                            </div>


                                        </div>
                                    </form>  
                </div>
            </div>
          
    </div>
@endsection



<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}" ></script>
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
        $('#zona').keyup(function() {
           var query=$(this).val();
           var ciudad=$('#city').val();
           console.log(query+"query");
           if(query!=''){
               $.ajax({
                   url:"{{route('autocompletar_zonas')}}",
                    method:"POST",
                    data:{query:query,ciudad:ciudad,_token: $("meta[name='csrf-token']").attr("content")},
                    success:function(data){
                        $('#listazonas').fadeIn();
                        $('#listazonas').html(data);
                         //alert('todo salio bien'+data);
                         //alert(data);
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema'+status);
                    },


               })
           } 
        });
        $(document).on('click','li',function(){
            $('#zona').val($(this).text());
            $('#listazonas').fadeOut();
        })

    }
</script>
    
