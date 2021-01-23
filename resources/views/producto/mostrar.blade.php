@extends('layout')

@section('titulo')
  Mostrar producto
@endsection

@section('css')
   
@endsection

@section('contenido') 
   

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @foreach ($imagenes as $ima)
            @if ($loop->iteration==1)
                <div class="carousel-item active">
            @else
                <div class="carousel-item">
            @endif
                <img class="rounded img-responsive center-block"  src="{{ isset($ima->foto) ? Storage::url($ima->foto) : Storage::url('galerias/sinimagenes.jpg')}}" alt="{{$producto->titulo}}" width="90%" height="450px">    
            </div>
        @endforeach
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>
</div>
        <div class="container-fluid">
          

            <!-- DATOS DE PRODCUTO -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                                <!-- Horizontal Form -->
                            @include('includes.form-error')
                            @include('includes.mensaje')             
                            
                            {{-- dd($manera) --}}
                            <div class="card-header text-center"> 
                                <a  href="{{route('imagen_contactar',$producto->id)}}" target="_blank" class="btn bg-success text-white col-4"><i class="fab fa-whatsapp text-white"> Contactar</i></a></td>
                            </div>        

                            <div class="card bg-transparent mb-3" style="max-width: 100%;">
                                <div class="card-header text-center"> DETALLE PRODUCTO</div>
                                <div class="card-body">
                                    
                                    <table class="table table-bordered table-hover table-striped" id="mensaje">
                                        <thead class="bg-cyan">
                                            <tr>
                                                <th>ATRIBUTO</th>
                                                <th>VALOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ID</td>
                                                <td>{{ $producto->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Título</td>
                                                <td>{{ $producto->titulo}}</td>
                                            </tr>
                                            <tr>
                                                <td>Descripción</td>
                                                <td> 
                                                    {{$producto->descripcion}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Costo</td>
                                                <td> 
                                                    {{$producto->costo}} Bs.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CREADO</td>
                                                <td>{{ $producto->created_at}}</td>
                                            </tr>
                                            
                                        </tbody>      
                                    </table>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div> <!-- FIN ROW -->
        </div>  
       
@endsection

@section('codigojs')
    
    <script src="{{asset("dist/js/alertas.js")}}"></script>

    <script type="text/javascript">
    $(document).ready(function(){
          
    });
    </script>
@endsection
