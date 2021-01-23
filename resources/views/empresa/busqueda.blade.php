@extends('layout')

@section('titulo')
  Buscar empresas
@endsection



@section('css')
  <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">  
@endsection

@section('contenido')

    {{$mensaje ?? 'Que estas buscando?'}}
    

    <h1 class="display-6 text-center text-gray mt-5 col-sm">Lo que buscas está a un Click</h1>
    <div class="row">
        <form class="form-horizontal col-12" method="post" action="{{route('empresa_priorizar')}}">
             @csrf
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-2 p-2">
                    
                    <input class="form-control" type="text" value="{{ old('criterio',$criterio ?? '')}}" name="criterio" id="criterio" placeholder="Escribe aquí que Busca Ej. Celulares, Ropa, Casa etc"
                    aria-label="Search">
                    <button type="submit" class="btn btn-success btn-sm" id="submit">Buscar <i class="fas fa-search text-white-50" aria-hidden="true"></i> </button>
                </div>
        </form>
    </div>

    
@can('empresa_vista_priorizar')        
    @isset ($empresas)
        
            <div class="container">
                <table class="table table-hover table-striped">
                    <thead class="bg-cyan">
                        <tr>
                            <th>EMPRESA</th>
                            <th>EMPRESARIO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr style="height:12px mt-5">
                                <td>
                                        <a href="{{route('empresa_votar',$empresa->id)}}" class="titulo">{{$empresa->empresa}} <a>  
                                </td>

                                <td>
                                    {{$empresa->nombre.' '.$empresa->apellidos}}
                                </td>

                            
                                <td>
                                    <a href="{{route('empresa_vista_priorizar',$empresa->id)}}" class="btn btn-success">Priorizar</a>
                                </td>
                                  
                        </tr>
                    @endforeach 
                </tbody>
                
            </table>
        </div> 
        {{ $empresas->render() }}
    @endisset
@else 
    @include('includes.sinpermiso')
@endcan     
     
@endsection

@section('codigojs')
    <script type="text/javascript">
        $(document).ready(function(){
                $(".cuerpo").each(function(){
                    $(this).html($(this).text().substring(0,250)+"...");
                });
        });    
    </script>
@endsection