@extends('layout')


@section('contenido')     

    @if (count($empresas)==0)
        <div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
            <div class="alert alert-success">
                <ul>
                        <li>{{ "Ud. aun no tiene empresas registradas en Foconcito" }}</li>
                </ul>
            </div>
    </div>
    @endif
    
    @php
        $i=1; // variable para crear un nuevo row o añadir a contunuacion de 4 en 4
    @endphp

    <div class="row mb-3">

    </div>

    @foreach ($empresas as $empresa)
        @if ((($i-1) % 4==0)||($i==1))
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                    <div class="card text-white mb-3" style="max-width: 36rem;">
                        <div class="card-header bg-cyan text-center">{{$empresa->empresa}}</div>
                            <div class="card-body">
                                <img class="img-thumbnail" src="{{ isset($empresa->logo) ? Storage::url('/'.$empresa->logo) : Storage::url('logos/sinlogo.png')}}" alt="">
                            </div>
                            <div class="text-center botonaccion">
                                <a class="btn btn-primary mb-3" href="{{ route('empresa_galeria', $empresa->id)}}" id="empresa{{$empresa->id}}">Galería</a>
                            </div>
                    </div>
            </div>                            
        @else    
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
               <div class="card text-white mb-3" style="max-width: 36rem;">
                        <div class="card-header bg-cyan text-center">{{$empresa->empresa}}</div>
                            <div class="card-body">
                                <img class="img-thumbnail" src="{{ isset($empresa->logo) ? Storage::url('/'.$empresa->logo) : Storage::url('logos/sinlogo.png')}}" alt="">
                            </div>
                            <div class="text-center botonaccion">
                                <a class="btn btn-primary text-cyan mb-3" href="{{ route('empresa_galeria', $empresa->id)}}" id="empresa{{$empresa->id}}">Galería</a>
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
@endsection

@section('codigojs')
    <script src="{{asset("dist/js/alertas.js")}}"></script>
<script>

     $(document).ready(function() {
        /*$('.botonaccion').on('click', 'a', function(e) { 
          e.preventDefault();  
		  $(this).css('color', 'red'); 
        });*/
        
    });
    $('#tigo').fileinput({
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