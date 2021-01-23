
@extends('layout')


@section('titulo')
  Publicar mis empresas
@endsection

@section('contenido')


 
    <div class="row">
        <div class="col-lg-12">  
            <div class="card-header border-success d-flex mt-3">
            <h3 class="card-title">Total ordenes <strong> {{count($ordenes_verificadas)}}</strong> </h3>
                
            </div>
            <div class="card-body"> 
                <table id="pagos" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="bg-cyan">
                            <th>#</th>
                            <th>EMPRESA</th>
                            <th>CLICKS</th>
                            <th>ESTADO</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas_no_published as $empresa)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$empresa->empresa}}</td>
                                <td>{{$empresa->votos}}</td>
                                <td>
                                    @if ($empresa->publico)
                                        Publicado
                                    @else
                                        No visible
                                    @endif

                                </td>
                                <td>
                                    @if(count($ordenes_verificadas)>0)
                                        @if (!$empresa->publico)
                                            <form action="{{route('empresa_publicar')}}" class="d-inline formulario" method="POST">
                                                @csrf
                                                <input type="text" name="empresa_id" hidden value="{{$empresa->id}}">
                                                <button type="submit" class="btn btn-success" title="Publicar">
                                                    <i class="fa fa-fw fa-share text-white"></i> Publicar   
                                                </button>
                                            </form>  
                                        @else
                                            <a href="{{route('empresa_mostrar', $empresa->id)}}" class="btn-accion-tabla tooltipsC" title="Ver esta empresa">
                                                <i class="fa fa-fw fa-eye text-primary"></i> Ver Empresa
                                            </a>

                                        @endif
                                    @else
                                        @if ($empresa->publico)
                                            <a href="{{route('empresa_mostrar', $empresa->id)}}" class="btn-accion-tabla tooltipsC" title="Ver esta empresa">
                                                <i class="fa fa-fw fa-eye text-primary"></i> Ver Empresa
                                            </a>
                                        @else
                                            <a href="{{route('pago_formas')}}" class="btn btn-danger"> Obtener Orden </a>
                                        @endif    
                                        
                                    @endif    
                                </td>
                            </tr>        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- FIN ROW -->
@endsection

