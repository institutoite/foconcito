@extends('layout')

@section('titulo')
  Listar Empresas
@endsection


@section('contenido')     
    @can('empresa_config')
        @php
            $i=1; // variable para crear un nuevo row o añadir a contunuacion de 4 en 4
        @endphp
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>EMPRESA</th>
                    <th> ACCIONES </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $empresa->empresa }}</td>
                    <td> <a href="{{route('telofempresa_listar',$empresa->id)}}" class="btn btn-success"> Gestionar Teléfonos </a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
        
    @else 
        @include('includes.sinpermiso')
    @endcan
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