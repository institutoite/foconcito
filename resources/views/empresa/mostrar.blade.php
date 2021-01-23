@extends('layout')

@section('titulo')
  Mostrar Empresa
@endsection

@section('contenido')     
    
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
                                        <td>
                                            <a href="{{route('persona_mostrar', $empresita[0]->persona_id)}}">{{ $empresita[0]->empresario}}</a> 
                                            <a href="{{route('persona_mostrar', $empresita[0]->persona_id)}}" class="btn btn-success">Contactar</a>
                                        </td>
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
                                        @if ($empresita[0]->destacado) 
                                            <tr class="bg-success">
                                                <td>DESTACADO</td>
                                                    <td>
                                                        OK
                                                    </dt>
                                            </tr>        
                                        @else
                                            <tr class="bg-danger">
                                                <td>DESTACADO</td>
                                                    <td>
                                                        NO
                                                    </dt>
                                            </tr>    
                                        @endif
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

                                @isset($ordenes)
                                
                                    <tr class="bg-cyan">
                                        <td>FECHA INICIO VERSION PRO</td>
                                        <td>
                                            {{ $ordenes->created_at}}
                                        </td>
                                    </tr>

                                    <tr class="bg-cyan">
                                        <td>FECHA FIN VERSION PRO</td>
                                        <td>
                                            {{ $ordenes->ffin}}
                                        </td>
                                    </tr>
                                @else
                                    <tr class="bg-warning">
                                        <td>FECHA INICIO VERSION PRO</td>
                                        <td>
                                            No tiene orden activa
                                        </td>
                                    </tr>
                                @endisset    
                                    
                                </tbody>      

                            </table>
                            

                                @php
                                    $i=1; // variable para crear un nuevo row o añadir a contunuacion de 4 en 4
                                @endphp

                            <div class="row mb-3">

                            </div>
                <div class="text-center">
                    
                    <div class="card-header bg-cyan text-center mb-2">PRODUCTOS O SERVICIOS: {{$empresita[0]->empresa}}</div>
                </div>                            
                            <div id="gallery">
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


        <div class="row">
            <div class="col-lg-12">  
                <div class="card-header border-success d-flex mt-3">
                    <h3 class="card-title">NUMEROS TELEFONICOS: <strong> {{ $empresita[0]->empresa }} </strong> </h3>
                    
                </div>
                <div class="card-body"> 
                    <table id="telofempresas" class="table table-hover table-bordered table-striped">
                        <thead class="bg-cyan">
                        
                            <th>#</th>
                            <th>Numero</th>
                            <th>Detalle</th>
                         
                            <th>Contactar</th>
                        </thead>
                        <tbody>
                            @foreach ($telefonos as $telefono)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$telefono->prefijo.$telefono->numero}}</td>
                                    <td>{{$telefono->updated_at}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" target="_blank" href="https://api.whatsapp.com/send?phone={{$telefono->prefijo.$telefono->numero}}"><i class="fab fa-whatsapp"></i></a>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $telefonos->render() }}
            </div>
        </div> <!-- FIN ROW -->
 
@endsection


@section('codigojs')
<script src=""></script>
<script src="{{asset("dist/js/alertas.js")}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">


$(document).ready(function() {

    $('#telofempresas').DataTable({ 
     
       
        
        "language":{
            "search":"Buscar",
            "paginate":{
                "next":"Siguiente",
                "previous":"Anterior",
            },
            "lengthMenu": 'Mostrar <select>' +
                                    '<option value="5">5</option>'+
                                    '<option value="10">10</option>'+
                                    '<option value="20">20</option>'+
                                    '<option value="50">50</option>'+
                                    '<option value="-1">Todos</option>'+
                                    '</select> Registros',
            "loadingsRecords":"Cargando....",
            "processing":"Procesando...",
            "emptyTable":"No encontre números telefónicos",
            "infoEmpty":"",
            "infoFiltered":"",
            "zeroRecords":"No hay datos",  
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        },
        "responsive": true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 }
        ],

    })

    $('table').on('click','.eliminar',function (e) {
        
        e.preventDefault();   
        Swal.fire({
            title: 'Estas seguro(a) de eliminar este registro?',
            text: "Si eliminas el registro no lo podras recuperar jamás!",
            icon: 'question',
            showCancelButton: true,
            showConfirmButton:true,
            confirmButtonColor: '#25ff80',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar..!',
            position:'center',        
        }).then((result) => {
            if (result.value) {
                var $form=$(this).parent();
                $form.append('<input name="_token" type="hidden" value="' + $('meta[name="csrf-token"]').attr('content') + '">');
                console.log('_token');
                $(this).parent().submit();
                Swal.fire(
                'Borrado Correctamente!',
                'El registro fue eliminado definitivamente.',
                'success')
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'No se eliminó el registro'
                })
            }
        })
});


} );
</script>
@endsection