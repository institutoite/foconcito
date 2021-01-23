@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
@endsection


@section('contenido')  
            <div class="row">
                <div class="col-12">
                    
                        <div class="card-header bg-cyan mt-3">
                              <h3 class="text-center">El mundo ya cambio nos queda adaptanos a él</h3>
                              <img src="/imagenes/descuentos.jpg" class="img-fluid" alt="Responsive image">
                        </div>
                </div>
            </div>
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="row mt-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3 bg-cyan text-center">
                    <div class="card text-white mb-3 mt-3 fondo-azul">
                        <div class="card-header text-cyan"><h2>TIGO MONEY</h2></div>   
                        <div class="card-body">
                            <div class="container">
                                <img src="/imagenes/tigo.png" width="100" height="100"  class="rounded mx-auto d-block" alt="">
                            </div>
                            <p class="text-primary">Transfiere: tu voluntad a la cuenta:</p>
                            <form action="{{ route('orden_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                                @csrf
                                <ul class="list-group mb-3">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><span>Transferir su volutand</span>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><span>Número:71039910</span>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><span>Número:71324941</span>
                                </ul> 
                              <input type="file" name="comprobante" accept=".png, .bmp, .jpg, .jpeg, .gif" id="tigo" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus">
                              
                              <input type="text" name="metodopago_id" hidden value="{{ $metodos[1]->id }}">
                              <input type="submit" class="btn btn-lg btn-info mt-3" value="Enviar comprobante">
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3 text-center bg-cyan">
                    <div class="card text-white mb-3 mt-3 fondo-azul">
                        <div class="card-header text-cyan"><h2>TRANSFERENCIA</h2></div>
                        <div class="card-body">
                            
                            <div class="container">
                                <img src="/imagenes/transferencia.png" width="100" height="100"  class="rounded mx-auto d-block" alt="">
                            </div>
                            <p class="text-primary">Transfiere: tu voluntad a la cuenta:</p>
                            <form action="{{ route('orden_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                                @csrf
                              
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><strong>BANCO NACIONAL DE BOLIVIA BNB: </strong>2500992223
                                    <li class="list-group-item list-group-item-action list-group-item-info"><strong>NOMBRE: </strong>DAVID EDUARDO FLORES BELTRAN
                                    <li class="list-group-item list-group-item-action list-group-item-info"><strong>CI: </strong>5613355 BN
                                    
                                </ul>
                              <input type="file" name="comprobante" accept=".png, .bmp, .jpg, .jpeg, .gif" id="bnbdavid" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus">
                              <input type="text" name="metodopago_id" hidden value="{{ $metodos[2]->id }}">
                              <input type="submit" class="btn btn-lg btn-info mt-3" value="Enviar comprobante">
                            </form>
                        </div>
                    </div>
                </div>
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3 text-center bg-cyan">
                    <div class="card text-white mb-3 mt-3 fondo-azul">
                        <div class="card-header text-cyan"><h2>TRANSFERENCIA</h2></div>
                        <div class="card-body">
                            
                            <div class="container">
                                <img src="/imagenes/transferencia.png" width="100" height="100"  class="rounded mx-auto d-block" alt="">
                            </div>
                            <form action="{{ route('orden_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                                @csrf
                              <p class="text-primary">Transfiere: tu voluntad a la cuenta:</p>
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><strong>BNB: </strong>2520107714
                                    <li class="list-group-item list-group-item-action list-group-item-info"><strong>NOMBRE: </strong>LIDIA CONTRERAS CATARI
                                    <li class="list-group-item list-group-item-action list-group-item-info"><strong>CI: </strong>5501935 PO
                                    
                                </ul>
                              <input type="file" accept=".png, .bmp, .jpg, .jpeg, .gif" name="comprobante" id="bnblidia" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus">
                              <input type="text" name="metodopago_id" hidden value="{{ $metodos[3]->id }}">
                              <input type="submit" class="btn btn-lg btn-info mt-3" value="Enviar comprobante">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3 bg-cyan text-center">
                    <div class="card text-white mb-3 mt-3 fondo-azul">
                        <div class="card-header text-cyan"><h2>EN EFECTIVO</h2></div>
                        <div class="card-body">
                            <div class="container">
                                <img src="/imagenes/efectivo.png" width="150" height="100"  class="rounded mx-auto d-block" alt="">
                            </div>

                            <form action="{{ route('orden_guardar') }}"  id="form-general" enctype="multipart/form-data" class="form-vertical mt-3" method="POST" autocomplete="on">
                                @csrf
                              <p class="text-primary">Realiza el pago en nuestras oficinas:</p>
                              <ul class="list-group">
                                <li class="list-group-item list-group-item-action list-group-item-info"><span>Puede cancelar en nuestras 2 Únicas direcciones</span>    
                                <li class="list-group-item list-group-item-action list-group-item-info"><span>Dirección1: Av. Tres pasos al frente esquina Cheguevara # 4710 </span>
                                <li class="list-group-item list-group-item-action list-group-item-info"><span>Dirección2: Villa 1 de mayo Calle 16 oeste #9</span>    
                                </ul>
                              <input type="file" accept=".png, .bmp, .jpg, .jpeg, .gif" name="comprobante" id="efectivo" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus">
                              <input type="text" name="metodopago_id" hidden value="{{ $metodos[4]->id }}">
                              <input type="submit" class="btn btn-lg btn-info mt-3" value="Enviar comprobante">
                            </form>
                             
                        </div>
                    </div>
                </div>
             
            </div>    
@endsection

@section('codigojs')
      
        <script src="{{asset('bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap-fileinput/themes/fas/theme.min.js')}}" type="text/javascript"></script>
    <script>
    $('#tigo').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png','bmp','gif'],
        maxFileSize:6000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });
    $('#bnbdavid').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png','bmp','gif'],
        maxFileSize:6000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });

    $('#bnblidia').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png','bmp','gif'],
        maxFileSize:6000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });
    $('#efectivo').fileinput({
        language:'es',
        allowedFileExtensions:['jpg','jpeg','png','bmp','gif'],
        maxFileSize:6000,
        showUpload:false,
        showClose:false,
        initialPreviewAsData:true,
        dropZoneEnabled:true,
        theme:"fas",
    });
   

    </script>
@endsection