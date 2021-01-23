@extends('layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
@endsection

@section('contenido')           
    @can('persona_guardar')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title">FORMULARIO MENSAJE</h3>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('mensaje_guardar') }}"  id="form-general" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                 
                                    @include('mensaje.form')
                                    @include('includes.boton_crear')
                            </form>
                        </div> 
                    </div>
                </div>    
            </div>
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection

@section('codigojs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>


<script type="text/javascript">
 
    $(document).ready(function(){
        $(".emojionearea").emojioneArea({
            shortname:true,
            placeholder: "Escriba aquí el mensaje",
            search: false,
            pickerPosition: "bottom"
            //standalone: true, lo muestra a parte
           // saveEmojisAs: "shortname"
        });
        
      
    
    });



</script>
@endsection