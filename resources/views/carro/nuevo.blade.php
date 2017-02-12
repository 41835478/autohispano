@extends('users.topMenu')

@section('title','Agregar un carro')

@section('vista')

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-user-section-title">
                    <h4>Agregar Carro</h4>
                </div>
            </div>
            <form class="user-post-vehicles" method="post" action="{{ url('/carro/nuevo') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6>Información general</h6>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-seprator"></div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Condición</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <select class="chosen-select" name="cboCondicion" id="cboCondicion">
                                <option value="">Selecciona una opción</option>
                                <option value="0">Usado</option>
                                <option value="1">Nuevo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Marca</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <select class="chosen-select" name="cboMarca" id="cboMarca">
                                <option value="">Selecciona una opción</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Modelo</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field select-dropdown">
                            <select class="chosen-select" data-placeholder="Selecciona una opción" name="cboModelo" id="cboModelo">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Tipo</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <select class="chosen-select" name="cboTipo" id="cboTipo">
                                <option value="">Selecciona una opción</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Año</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="number" name="txtAnio" required class="soloNumeros">
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Precio* ($)</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="number" name="txtPrecio" required class="soloNumeros">
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Color exterior</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" name="txtColorExterior">
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Color interior</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" name="txtColorInterior">
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Millaje</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="number" name="txtMillaje" required class="soloNumeros">
                        </div>
                    </div>
                </div>

                    <div class="cs-field-holder">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Fecha de registro</label>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <select id="cboDia" name="cboDia" class="chosen-select" tabindex="-1" style="display: none;">
                                <option value="">Día</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select id="cboMes" name="cboMes" class="chosen-select" tabindex="-1" style="display: none;">
                                <option value="">Mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <input type="number" name="txtAnioRegistro" id="txtAnio" placeholder="Año" class="soloNumeros">
                        </div>
                    </div>

                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>VIN</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="number"  name="txtVIN" class="soloNumeros">
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Descripción</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <textarea name="txtComentarios" id="txtComentarios"></textarea>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6>Imagenes</h6>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-seprator"></div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-upload-img">
                            <ul id="imagenesContainer">

                            </ul>
                            <input type="hidden" value="0" name="contadorImagenes" id="contadorImagenes">

                            <p>
                                <?php
                                if($user->tipo==1){
                                    echo "Sin límite de fotos";
                                    ?>
                                    <input type="hidden" value="0" name="maximoFotos" id="maximoFotos">
                                    <?php
                                }
                                else{
                                    echo "Puede subir hasta 5 fotos";
                                    ?>
                                    <input type="hidden" value="5" name="maximoFotos" id="maximoFotos">
                                    <?php
                                }
                                ?>
                            </p>
                            <div class="cs-browse-holder"><span class="file-input btn-file" id="cmdAgregarFoto"> Agregar foto

              </span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-seprator"></div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6><i class="cs-color icon-engine"></i>Motor</h6>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Tipo de combustible</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <select id="cboTipoCombustible" name="cboTipoCombustible" class="chosen-select" tabindex="-1" style="display: none;">
                                <option value="">Seleccione una opción</option>
                                <option value="Combustible">Combustible</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Electrico">Electrico</option>
                                <option value="Etanol">Etanol</option>
                                <option value="Gasolina">Gasolina</option>
                                <option value="Híbrido">Híbrido</option>
                                <option value="LPG Autogas">LPG Autogas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Transmisión</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <select id="cboTransmision" name="cboTransmision" class="chosen-select" tabindex="-1" style="display: none;">
                                <option value="">Seleccione una opción</option>
                                <option value="Automática">Automática</option>
                                <option value="Manual">Manual</option>
                                <option value="Semi-Automatica">Semi-Automatica</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label>Manejo</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <select id="cboManejo" name="cboManejo" class="chosen-select" tabindex="-1" data-placeholder="Select Make" style="display: none;">
                                <option value="">Seleccione una opción</option>
                                <option value="4WD">4WD</option>
                                <option value="AWD">AWD</option>
                                <option value="FWD">FWD</option>
                                <option value="RWD">RWD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="cs-field-holder">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                        <div class="cs-field">
                            <div class="cs-btn-submit">
                                <input type="submit" value="Subir coche">
                            </div>
                        </div>
                    </div>
                </div>
            </form>


@endsection

@section('js')
    <script>
        var modelos=[];
        @foreach($modelos as $modelo)
            modelos.push({id:"{{ $modelo->id }}",nombre:"{{ $modelo->nombre }}",idMarca:"{{ $modelo->idMarca }}"});
        @endforeach
        $(document).ready(function(){

            $('#cboMarca').change(function(){

                $('#cboModelo').children('option').remove();
                $('#cboModelo').append('<option value="">Selecciona una opción</option>');
                for(var i=0; i<modelos.length;i++){
                    if(modelos[i].idMarca==$('#cboMarca').val()){
                        $('#cboModelo').append('<option value="' + modelos[i].id + '">' + modelos[i].nombre + '</option>');
                    }
                }
                $("#cboModelo").trigger("chosen:updated");
            });

            $('form').submit(function(e){
                if($('#cboCondicion').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar la condición del coche");
                    $('#cboCondicion').focus();
                    return false;
                }
                if($('#cboMarca').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar la marca del coche");
                    $('#cboMarca').focus();
                    return false;
                }
                if($('#cboModelo').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar el modelo del coche");
                    $('#cboModelo').focus();
                    return false;
                }
                if($('#cboTipo').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar el tipo del coche");
                    $('#cboTipo').focus();
                    return false;
                }
                if($('#cboDia').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar el día de la fecha de registro");
                    $('#cboDia').focus();
                    return false;
                }
                if($('#cboMes').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar el mes de la fecha de registro");
                    $('#cboMes').focus();
                    return false;
                }
                if($('#txtAnio').val()==""){
                    e.preventDefault();
                    alert("Debe ingresar el año de la fecha de registro");
                    $('#txtAnio').focus();
                    return false;
                }
                if($('#txtComentarios').val()==""){
                    e.preventDefault();
                    alert("Debe ingresar una breve descripción del coche");
                    $('#txtComentarios').focus();
                    return false;
                }
                if($('#contadorImagenes').val()==0){
                    e.preventDefault();
                    alert("Debe seleccionar por lo menos una imagen");
                    $('#cmdAgregarFoto').focus();
                    return false;
                }
                if($('#cboTipoCombustible').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar el tipo de combustible");
                    $('#cboTipoCombustible').focus();
                    return false;
                }
                if($('#cboTransmision').val()==""){
                    e.preventDefault();
                    alert("Debe seleccionar la transmisión del coche");
                    $('#cboTransmision').focus();
                    return false;
                }
            });

            $('#cmdAgregarFoto').click(function(){
                if($('#maximoFotos').val()>0) {
                    if (parseInt($('#contadorImagenes').val()) == parseInt($('#maximoFotos').val())) {
                        return "";
                    }
                }
                var li=$('<li></li>');
                var input=$('<input type="file" id="input' + $('#contadorImagenes').val() + '" name="img' + $('#contadorImagenes').val() + '" style="display:none">');
                var img=$('<img id="img' + $('#contadorImagenes').val() + '" style="max-width:101px;">');
                var a=$('<a href="">');

                input.change(function(){
                    if(this.files[0]) {
                        li.append(input);
                        li.append(a);
                        a.append(img);
                        var reader=new FileReader();
                        reader.onload=function(e){
                            img.attr('src',e.target.result);
                        };
                        reader.readAsDataURL(this.files[0]);


                        $('#imagenesContainer').append(li);

                        $('#contadorImagenes').val(parseInt($('#contadorImagenes').val())+1);
                    }
                });
                input.click();

                a.click(function(e){
                    e.preventDefault();
                    var id=$(this).children('img').attr('id');
                    id=id.replace('img','');
                    if(parseInt($('#contadorImagenes').val())>id){
                        for(var i=parseInt(id)+1;i<parseInt($('#contadorImagenes').val());i++){
                            $('#input' + i).attr('id','input' + (i-1));
                            $('#input' + i).attr('name','input' + (i-1));
                            $('#img' + i).attr('id','img' + (i -1));
                        }
                    }
                    $('#contadorImagenes').val(parseInt($('#contadorImagenes').val())-1);
                    $(this).parent('li').remove();
                });

                $('.soloNumeros').on('onkeypress',soloNumeros);
            });
        });
    </script>
@endsection