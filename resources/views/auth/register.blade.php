@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-cyan mb-3">
                <div class="card-header bg-cyan text-white text-center">
                    {{ __('REGISTRARSE') }}</div>
                <div class="card-body text-info">
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FORMULARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Introduzca su Nombre" autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-8">
                                <input id="apellido" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" placeholder="Favor introduzca sus apellidos" autocomplete="apellidos" value="{{ old('apellidos') }}" >
                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Nacimiento') }}</label>

                            <div class="col-md-8">
                                <input id="fechanacimiento" type="date" class="form-control @error('fechanacimiento') is-invalid @enderror" value="{{ old('fechanacimiento') }}" name="fechanacimiento" >
                                @if ($errors->has('fechanacimiento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fechanacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                            <div class="col-md-8">
                                <select class="form-control @error('genero') is-invalid @enderror" name="genero" id="genero">
                                    <option value="">Selecciona </option>
                                    <option value="MUJER" {{ old('genero')=="MUJER" ? 'selected':''}}>MUJER</option>
                                    <option value="HOMBRE" {{ old('genero')=="HOMBRE" ? 'selected':''}}>HOMBRE</option>
                                </select>
                                @if ($errors->has('genero'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('genero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
                            <div class="col-md-8">
                                <div class="row">
                                    <select class="form-control col-md-4" name="prefijo" id="">
                                            <option value="591" selected>591(Bolivia)</option>
                                            <option value='1907'>1907(Alaska)</option>
                                            <option value='355'>355(Albania)</option>
                                            <option value='49'>49(Alemania)</option>
                                            <option value='376'>376(Andorra)</option>
                                            <option value='244'>244(Angola)</option>
                                            <option value='966'>966(Arabia Saudí)</option>
                                            <option value='213'>213(Argelia)</option>
                                            <option value='54'>54(Argentina)</option>
                                            <option value='374'>374(Armenia)</option>
                                            <option value='61'>61(Australia)</option>
                                            <option value='43'>43(Austria)</option>
                                            <option value='973'>973(Bahreim)</option>
                                            <option value='880'>880(Bangladesh)</option>
                                            <option value='32'>32(Bélgica)</option>
                                            <option value='387'>387(Bosnia)</option>
                                            <option value='55'>55(Brasil)</option>
                                            <option value="591">591(Bolivia)</option>
                                            <option value='359'>359(Bulgaria)</option>
                                            <option value='238'>238(Cabo Verde)</option>
                                            <option value='855'>855(Camboya)</option>
                                            <option value='237'>237(Camerún)</option>
                                            <option value='1'>1(Canadá)</option>
                                            <option value='236'>236(Centroafricana, Rep.)</option>
                                            <option value='420'>420(Checa, Rep.)</option>
                                            <option value='56'>56(Chile)</option>
                                            <option value='86'>86(China)</option>
                                            <option value='357'>357(Chipre)</option>
                                            <option value='57'>57(Colombia)</option>
                                            <option value='242'>242(Congo, Rep. del)</option>
                                            <option value='243'>243(Congo, Rep. Democ.)</option>
                                            <option value='82'>82(Corea, Rep.)</option>
                                            <option value='850'>850(Corea, Rep. Democ.)</option>
                                            <option value='225'>225(Costa de Marfil)</option>
                                            <option value='506'>506(Costa Rica)</option>
                                            <option value='385'>385(Croacia)</option>
                                            <option value='53'>53(Cuba)</option>
                                            <option value='45'>45(Dinamarca)</option>
                                            <option value='1809'>1809(Dominicana, Rep.)</option>
                                            <option value='593'>593(Ecuador)</option>
                                            <option value='20'>20(Egipto)</option>
                                            <option value='503'>503(El Salvador)</option>
                                            <option value='971'>971(Emiratos Árabes Unidos)</option>
                                            <option value='421'>421(Eslovaca, Rep.)</option>
                                            <option value='386'>386(Eslovenia)</option>
                                            <option value='34'>34(España)</option>
                                            <option value='1'>1(Estados Unidos)</option>
                                            <option value='372'>372(Estonia)</option>
                                            <option value='251'>251(Etiopía)</option>
                                            <option value='63'>63(Filipinas)</option>
                                            <option value='358'>358(Finlandia)</option>
                                            <option value='33'>33(Francia)</option>
                                            <option value='9567'>9567(Gibraltar)</option>
                                            <option value='30'>30(Grecia)</option>
                                            <option value='299'>299(Groenlandia)</option>
                                            <option value='502'>502(Guatemala)</option>
                                            <option value='240'>240(Guinea Ecuatorial)</option>
                                            <option value='509'>509(Haití)</option>
                                            <option value='1808'>1808(Hawai)</option>
                                            <option value='504'>504(Honduras)</option>
                                            <option value='852'>852(Hong Kong)</option>
                                            <option value='36'>36(Hungría)</option>
                                            <option value='91'>91(India)</option>
                                            <option value='62'>62(Indonesia)</option>
                                            <option value='964'>964(Irak)</option>
                                            <option value='98'>98(Irán)</option>
                                            <option value='353'>353(Irlanda)</option>
                                            <option value='354'>354(Islandia)</option>
                                            <option value='972'>972(Israel)</option>
                                            <option value='39'>39(Italia)</option>
                                            <option value='1876'>1876(Jamaica)</option>
                                            <option value='81'>81(Japón)</option>
                                            <option value='962'>962(Jordania)</option>
                                            <option value='254'>254(Kenia)</option>
                                            <option value='965'>965(Kuwait)</option>
                                            <option value='856'>856(Laos)</option>
                                            <option value='371'>371(Letonia)</option>
                                            <option value='961'>961(Líbano)</option>
                                            <option value='231'>231(Liberia)</option>
                                            <option value='218'>218(Libia)</option>
                                            <option value='41'>41(Liechtenstein)</option>
                                            <option value='370'>370(Lituania)</option>
                                            <option value='352'>352(Luxemburgo)</option>


                                    </select>
                                    <input id="telefono" type="number"  value="{{ old('telefono') }}" class="col-md-8 form-control @error('telefono') is-invalid @enderror" name="telefono"  placeholder="Favor intruduzca su número telefónico">
                                        @if ($errors->has('telefono'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="input-group mb-3 col-12" >
                                <input hidden  type="text" value="empresario" name="tipo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Introduzca su contraseña"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Introduzca nuevamente su contraseña" autocomplete="new-password">
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN FORMULARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
