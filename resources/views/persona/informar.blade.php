@extends('layout')

@section('titulo')
  Informar habilitación
@endsection


@section('css')
                              
@endsection
@section("contenido")
    @can('telefonos_persona')
        <div class="row">
            <div class="col-lg-12">    
                @include('includes.form-error')
                @include('includes.mensaje')            
                <table id="personas" class="table table-sm display responsive nowrap" cellspacing="0"  width="100%">
                    <thead class="bg-cyan">
                       
                        <th>#</th>
                        <th >DETALLE</th>
                        <th >TELEFONO</th>
                        <th >CREADO</th>
                        <th >ACTUALIZADO</th>
                        <th >Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($phones as $phone)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$phone->detalle}}</td>
                                <td>{{$phone->numero}}</td>
                                <td>{{$phone->created_at}}</td>
                                <td>{{$phone->updated_at}}</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone=591{{$phone->numero.'&text='.str_replace(" ","%20",'Hola '.$persona->nombre.' te  escribimos de *Foconcito* para informarte que ha sido activada una Orden para anunciar tu empresa')}}" target="_blanck" class="btn btn-success"> Informar </a>
                                             
                                </td>
                            </tr>
                        @endforeach   
                    </tbody>
                </table>   
            </div>
        </div> <!-- FIN ROW -->
    @else 
        @include('includes.sinpermiso')
    @endcan 
@endsection