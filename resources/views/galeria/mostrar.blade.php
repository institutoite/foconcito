@extends('layout')

@section('contenido')     
   @can('empresa_mostrar')
    <div class="container-fluid">

        <div class="row d-flex">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3 mx-auto" >
                    <div class="card text-white mb-3" style="max-width: 36rem;">
                        <div class="card-header bg-cyan text-center">EMPRESA: {{$empresita[0]->empresa}}</div>
                            <div class="card-body">
                                <img class="img-thumbnail" src="{{ isset($empresita[0]->logo) ? Storage::url('/'.$empresita[0]->logo) : Storage::url('logos/sinlogo.png')}}" alt="">
                            </div>
                            <div class="text-center text-gray">
                                <p> Logotipo </p>
                            </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                
                    @if (count($imagenes)==0)
                        <div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
                                <div class="alert alert-success">
                                <ul>
                                        <li>Aun no tienes imagenes</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                              <!-- Horizontal Form -->
                        @include('includes.form-error')
                        @include('includes.mensaje')             
                          
                        <div class="card bg-transparent mb-3" style="max-width: 100%;">           
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="bg-cyan">
                                        <tr>
                                            <th>ATRIBUTO</th>
                                            <th>VALOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $empresita[0]->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>REPRESENTANTE</td>
                                            <td><a href="{{route('persona_mostrar', $empresita[0]->persona_id)}}">{{ $empresita[0]->empresario}}</a> </td>
                                        </tr>
                                        <tr>
                                            <td>PAIS</td>
                                            <td>{{ $empresita[0]->pais}}</td>
                                        </tr>
                                        <tr>
                                            <td>CIUDAD</td>
                                            <td>{{ $empresita[0]->ciudad}}</td>
                                        </tr>
                                        <tr>
                                            <td>ZONA</td>
                                            <td>{{ $empresita[0]->zona}}</td>
                                        </tr>
                                        <tr>
                                            <td>DIRECCION</td>
                                            <td>{{ $empresita[0]->direccion}}</td>
                                        </tr>
                                        <tr>
                                            <td>DETALLE</td>
                                            <td> 
                                                @php
                                                echo $empresita[0]->detalle;    
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CATEGORIA</td>
                                            <td>{{ $empresita[0]->categoria}}</td>
                                        </tr>

                                        <tr>
                                            <td>CREADO</td>
                                            <td>{{ $empresita[0]->created_at}}</td>
                                        </tr>

                                        <tr>
                                            <td>ACUALIZADO</td>
                                            <td>{{ $empresita[0]->updated_at}}</td>
                                        </tr>
                                    </tbody>      

                                </table>

                                     @php
        $i=1; // variable para crear un nuevo row o añadir a contunuacion de 4 en 4
    @endphp

    <div class="row mb-3">

    </div>

    <div id="gallery">
            {{--dd($imagenes)--}}
            @foreach($imagenes as $ima)
                @if ((($i-1) % 4==0)||($i==1))
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                            <div class="card text-white mb-3" style="max-width: 36rem;">
                                <div class="card-header bg-cyan text-center">{{$ima->titulo}}</div>
                                    <div class="card-body">
                                            <img class="img-thumbnail" src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                    </div>
                                    <div class="text-center botonaccion">
                                        <p class="text-gray"> {{$ima->descripcion}}</p>
                                    </div>
                            </div>
                        </div>                            
                @else    
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 input-group mb-3" >
                            <div class="card text-white mb-3" style="max-width: 36rem;">
                                <div class="card-header bg-cyan text-center">{{$ima->titulo}}</div>
                                    <div class="card-body">
                                            <img class="img-thumbnail" src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="">
                                    </div>
                                    <div class="text-center botonaccion">
                                        <p class="text-gray"> {{$ima->descripcion}}</p>
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

          
    </div>
                          
                        </div>

                  
            </div>
        </div> <!-- FIN ROW -->
    </div>
    @else 
        @include('includes.sinpermiso')
    @endcan   
    
@endsection

@section('codigojs')
    <script src="{{asset("dist/js/alertas.js")}}"></script>
@endsection