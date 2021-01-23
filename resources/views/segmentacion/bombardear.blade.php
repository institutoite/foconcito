@extends('layout')

@section('titulo')
  Mensajes masivos
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
@endsection

@section('contenido')           
    @can('bombardear')
            <div class="row">
                <div class="col-12">
                    @include('includes.form-error')
                    @include('includes.mensaje')     
                        <div class="card-body"> 
                        <div class="alert bg-success alert-dismissible" id="alert" data-auto-dismiss="1500">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
                                <div class="alert alert-success">
                                    <ul>
                                            <li>Total registros filtrados: {{count($personas)}}</li>
                                    </ul>
                                </div>
                        </div>

                            <table id="telefonos" class="table table-hover table-bordered table-striped table-sm">
                                    @foreach ($personas as $item)
                                        @php
                                            $telefonos = App\Http\Controllers\TelefonoController::telefonos($item->id);
                                            $Mensaje = App\Http\Controllers\MensajeController::getMensaje($mensaje_id);
                                        @endphp 
                                        @if(count($telefonos)>0)
                                        <tr class="bg-cyan">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nombre." ".$item->apellidop." ".$item->apellidom }}</td>
                                            <td>Telefono</td>
                                            <td>
                                                Opciones
                                            </td>
                                        </tr>
                                    
                                            @foreach ($telefonos as $ite)
                                                <tr>
                                                    <td>{{$ite->id}}</td>
                                                    <td class="text-right">{{$ite->detalle}}</td>
                                                    <td class="text-center">{{$ite->numero}}</td>
                                                    <td class="text-center"><a href="https://api.whatsapp.com/send?phone={{$ite->prefijo.$ite->numero.'&text='.str_replace(" ","%20",$Mensaje)."\n"}}" class="btn bomba"><i class="fas fa-share-alt-square text-success fa-2x"></i></a> 
                                                        <input type="text" class="telefono_id" hidden name="telefono_id{{$ite->id}}"value="{{$ite->id}}">
                                                        <input type="text" class="persona_id" hidden name="persona_id{{$ite->id}}"value="{{$item->id}}">
                                                        <input type="text" class="mensaje_id" hidden name="mensaje_id{{$ite->id}}"value="{{$mensaje_id}}">
                                                    </td>

                                                    
                                                </tr>
                                            @endforeach 
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                 
                </div>    
            </div>
    @else 
        @include('includes.sinpermiso')
    @endcan
@endsection

@section('codigojs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>


<script type="text/javascript">



    $(document).ready(function(){
        $('#telefonos tbody tr a').click(function(evento){
            evento.preventDefault();

            var variable=$(this);
            
            var telefono_id=$(this).siblings('.telefono_id').val();
            var persona_id=$(this).siblings('.persona_id').val();
            var mensaje_id=$(this).siblings('.mensaje_id').val();     
                        
            $.get('/enviosms/'+telefono_id+'/'+persona_id+'/'+mensaje_id, function (data) {
                console.log(data);
                
            });
            $(this).append("<b>Appended text</b>");
            //window.location.href=''; 
            window.open('https://api.whatsapp.com/send?phone=59171039910.'&text='.str_replace(" ","%20","hola como estas")."\n"}}', "_blank");
        });
       
    });	
    
        
        
        
        
        
        
        
        
        /* $.get('/api/telefono/'+ UnIdPersona,function (data) {
            
            console.log(data);
            
            var html_select;

            for (var i = 0; i < data.length; i++) {
                html_select+='<tr>'+
                '<td>'+ data[i].detalle +'</td>'+
                '<td>'+ data[i].numero +'</td>'+
                '<td><a>Enviar</a></td>'+
                '</tr>';
            }
            $('#telefonos tbody').append(html_select);
        });
    

                /*$('#telefonos tbody tr').on('change',function() {
                var id_persona=$(this).find('td').first().html();
                $.ajax({
                    url : '/api/telefono/'+id_persona,
                    data : { idpersona : + id_persona },
                    type : 'GET',
                    dataType : 'json',
                    success : function(data) {
                        var html_select="";
                        for (var i = 0; i < data.length; i++) {
                            html_select+='<tr>'+
                            '<td>'+ data[i].detalle +'</td>'+
                            '<td>'+ data[i].numero +'</td>'+
                            '<td><a>Enviar</a></td>'+
                            '</tr>';
                        }
                        $('#telefonos tbody').append(html_select);
                    },
                    error : function(xhr, status) {
                        alert('xhr:'+ xhr+"  status:"+status);
                    },
                    complete : function(xhr, status) {
                        //console.log(data);
                    }
                });
                
            });
            $('#telefonos tbody tr').trigger ("change");
            var tabla=$("#telefonos");*/       

</script>
@endsection