@extends('layout')

@section('titulo')
  Mostrar Click
@endsection

@section('contenido')     
    @can('click_mostrar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <!-- Horizontal Form -->
                    @include('includes.form-error')
                    @include('includes.mensaje')             
                    {{-- dd($manera) --}}
                    <div class="card bg-transparent mb-3" style="max-width: 100%;">
                        <div class="card-header text-center"> DETALLE CCONSTANTE</div>
                            @foreach ($clicks as $item)
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="bg-cyan">
                                        <tr>
                                            <th>ATRIBUTO</th>
                                            <th>VALOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PERSONA</td>
                                            <td>{{ $item->nombre}} <a class="btn btn-success" href="{{route('persona_mostrar',$item->persona_id)}}"><i class="fas fa-mobile-alt fa-2x"></i> Conctactar</a> </td>   
                                        </tr>
                                        @php
                                            $Nacimiento= Carbon\Carbon::create($item->fechacimiento);
                                            $anios = Carbon\Carbon::parse($item->created_at)->diffForHumans(Carbon\Carbon::now());
                                        @endphp
                                        <tr>
                                            <td>CUANDO</td>
                                            <td>{{ $item->created_at.' Hace:'. $anios}}</td>   
                                        </tr>
                                            <tr>
                                            <td>EDAD</td>
                                            <td>{{Carbon\Carbon::parse($item->fechanacimiento)->age}} Años</td>   
                                        </tr>

                                        <tr>
                                            <td>FECHA NACIMIENTO</td>
                                            <td>{{$item->fechanacimiento}}</td>   
                                        </tr>

                                            <tr>
                                            <td>GENERO</td>
                                            <td>{{ $item->genero}}</td>   
                                        </tr>
                                            <tr>
                                            <td>PAIS</td>
                                            <td>{{ $item->pais}}</td>   
                                        </tr>
                                            <tr>
                                            <td>CIUDAD</td>
                                            <td>{{ $item->ciudad}}</td>   
                                        </tr>
                                            <tr>
                                            <td>ZONA</td>
                                            <td>{{ $item->zona}}</td>   
                                        </tr>
                                            <tr>
                                            <td>EMPRESA CLICADA</td>
                                            <td>{{ $item->empresa}}</td>   
                                        </tr>
                                            <tr>
                                            <td>CLICKS</td>
                                            <td>{{ $item->votos}}</td>   
                                        </tr>
                                    </tbody>
                                </table>
                            
                            @endforeach
                    </div>
                </div>
            </div> <!-- FIN ROW -->
        </div>  
    @else 
        @include('includes.sinpermiso')
    @endcan     
@endsection

      
