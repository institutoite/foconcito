@extends('layout')

@section('titulo')
  Acceso no autorizado
@endsection

@section('contenido')
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="text-gray"> No autorizada </h1>
            <P class="text-gray text-center"><i class="fas fa-user-lock fa-9x"></i> </P>
        <a class="btn btn-success" href="{{route('home')}}">Ir a inicio</a>
        </div>
          
            
            {{--<img src="{{asset('imagenes/noautorizado.jpg')}}" alt="">--}}
    </div>
    <div class="row">
        <div class="text-center">
            
        </div>  
    </div>
@endsection