@extends('layout')

@section('titulo')
  Editar Mensaje
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">

@endsection

@section('contenido')     
    @can('mensaje_actualizar')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                  
                        <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">FORMULARIO EDITAR MENSAJE</h3>
                        </div>
                        <div class="card-body borde-cyan"> 
                            {{-- dd($mensaje_a_editar) --}}
                            <form action="{{ route('mensaje_actualizar',['id'=>$mensaje_a_editar->id]) }}"  id="form-general form-editar" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    @include('mensaje.form')
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
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>

<script type="text/javascript">
 
    $(document).ready(function(){
        $(".emojionearea").emojioneArea({
            pickerPosition:"bottom",
            buttonTitle: "Favor click aquí para agregar emojis a tu mensaje",
        });

    });	
</script>
@endsection