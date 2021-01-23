@extends('layout')

@section('contenido') 
    @can('empresa_vista_priorizar')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                        <div class="card-header bg-cyan mt-3">
                            <h3 class="card-title">PRIORIZAR EMPRESA</h3>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('empresa_guardar_prioridad') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical form-" method="POST" autocomplete="on">
                                @csrf
                                    
                                    <input type="text" hidden name="empresa_id" value="{{$id}}">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
                                        <input type="number" name="meses" class="form-control" placeholder="favor introduzca el numero de meses"> 

                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
                                        <select name="categoria_id" id="categoria" class="form-control">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group mb-3" >
                                        <select name="orden" id="prioridad" class="form-control">
                                        </select>
                                    </div>



                                  

                                    

                                    @include('includes.boton_crear')
                            </form>
                        </div> 
                    
                </div>    
            </div>
    @else 
        @include('includes.sinpermiso')
    @endcan
@endsection

@section('codigojs')
    <script>
        $(function () {
            $('#categoria').on('change', Load_prioridad);    
        });     
       
        function Load_prioridad(){
            var categoria_id = $(this).val();
            var Desocupados=[];
            if(!categoria_id){
                $('#prioridad').html('<option value="">Seleccione una Prioridad </option>');
                return;
            }
            $.get('/api/prioridades/'+ categoria_id ,function (data) {
                var html_select='<option value="">Seleccione Prioridad </option>';
                for (var i = 0; i < data.length; i++) {
                    Desocupados[i]=data[i].pivot.orden;
                }

                for (var i = 0; i < 20; i++) {
                    if (i in Desocupados){
                    }else{
                        html_select+='<option value="'+ i +'">' + i +'</option>';
                    }
                }
                $('#prioridad').html(html_select);
            });
        }
    </script>
@endsection

