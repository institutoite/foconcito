<div class="border-info">

    <div class="alert alert-success" role="alert">
        Segmetacion por región
    </div>


    <div id="region" class="row pt-2">       
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
            <select class="form-control" name="pais_id" id="country">
                <option value=""> Elija una país</option>
                <option value="0">Todos</option>
                @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->pais }}</option>
                @endforeach
            </select>
        </div>
         
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
            <select class="form-control" name="ciudad_id" id="city">
                <option value=""> Elija una ciudad</option>
               
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group mb-2" >
            <select class="form-control" name="zona_id" id="zone">
                <option value="">Seleccione una Zona</option> 
            </select>
        </div>
    </div> 

<div class="alert alert-success" role="alert">
Segmetacion por edades
</div>

    <div id="edad" class="row pt-2 border-success">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="row" id="edad_facild">
                <div class="custom-control custom-radio col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                    <input type="radio" class="custom-control-input" id="edad_facil" name="radios" checked>
                    <label class="custom-control-label" for="edad_facil">fácil</label>
                </div>

                <div id='rango_edad_pre' class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="input-group mb-2" >
                        <select class="form-control" name="edad_id" id="zone">
                            <option value="">Edadaes entre:</option> 
                            <option value="0">Todos</option>
                            <option value="1"> 0 a 10 años</option>
                            <option value="2">11 a 20 años</option>
                            <option value="3">21 a 30 años</option>
                            <option value="4">31 a 40 años</option>
                            <option value="5">41 a 50 años</option>
                            <option value="6">11 a 60 años</option>
                            <option value="7">11 a 70 años</option>
                            <option value="8">Mayores a 70 Años</option>
                        </select>
                    </div>
                </div>
            </div>
            
        </div>
            
        
        
        <div  class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="edad_customd">
            <div class="row">
                <div class="custom-control custom-radio col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                    <input type="radio" class="custom-control-input" id="edad_custom" name="radios">
                    <label class="custom-control-label" for="edad_custom">Custom</label>
                </div>
            
                <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 input-group mb-2" >
                    <input type="number" min="0" name="edadinicial" class="form-control" value="{{old('edadinicial')}}" placeholder="Introduce edad Inicial">
                </div>
                
                <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 input-group mb-2">    
                    <input type="number" min="0" name="edadfinal" class="form-control" value="{{old('edadfinal')}}" placeholder="Introduce edad Final">
                </div>
            
            </div>
            
        </div>

        
    </div>    

   <!-- Group of default radios - option 3 -->
<div class="alert alert-success" role="alert">
    Segmetacion por fecha de registros
</div>
    <div class="row pt-2 border-succes">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="registro_facild">
            <div class="row">
                 <div class="custom-control custom-radio col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                    <input type="radio" class="custom-control-input" id="registro_facil" name="radios_registros" checked>
                    <label class="custom-control-label" for="registro_facil">Fácil</label>
                </div>
                <div id='rango_edad_pre' class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="input-group mb-2" >
                        <select class="form-control" name="registro_id" id="zone">
                            <option value="">Registrados:</option> 
                            <option value="0">Todos</option>
                            <option value="1">Hoy</option>
                            <option value="2">Ayer</option>
                            <option value="3">Esta semana</option>
                            <option value="4">Este Mes</option>
                            <option value="5">Este Año</option>
                            <option value="10">Hace Mucho Tiempo</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>   
        
        <div id="rango_edad_custom" class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="registro_customd">
            <div class="row">
                <div class="custom-control custom-radio col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                    <input type="radio" class="custom-control-input" id="registros_custom" name="radios_registros">
                    <label class="custom-control-label text-sm" for="registros_custom">Custom</label>
                </div>
                 <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 input-group mb-2" >
                    <input type="date" class="form-control" name="fechainicial" id="fechainicial">
                </div>

                <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 input-group mb-2" >
                    <input type="date" class="form-control" name="fechafinal" id="fechafinal">
                </div>
            </div>
        </div>        
    </div>
</div>

<input type="text" value="{{$id}}" hidden name="mensaje_id">
