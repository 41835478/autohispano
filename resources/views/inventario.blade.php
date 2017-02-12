@extends('layout.master')

@section('title','Inicio')

@section('cuerpo')
    <div class="main-section">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="cs-listing-filters">
                        <div class="cs-search">
                            <form class="search-form">
                                <div class="loction-search">
                                    <input type="text" placeholder="Selecciona ubicación">
                                    <a href="#"><i class="icon-hair-cross cs-color"></i></a>
                                </div>
                                <div class="select-input">
                                    <select id="cboMarca" data-placeholder="Seleccionar marca" tabindex="-1" class="chosen-select" style="display: none;">
                                        <option value="">Selecciona una marca</option>
                                        @foreach($marcas as $marca)
                                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="select-input">
                                    <select id="cboModelo" data-placeholder="Seleccionar marca" tabindex="-1" class="chosen-select" style="display: none;">

                                    </select>

                                </div>
                                <div class="select-input">
                                    <select data-placeholder="Seleccionar marca" tabindex="-1" class="chosen-select" style="display: none;">
                                        <option value="">Selecciona un tipo de coche</option>
                                        @foreach($tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </form>
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Año
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="cs-model-year">
                                            <div class="cs-select-filed">
                                                <input type="number">
                                            </div>
                                            <span>to</span>
                                            <div class="cs-select-filed">
                                                <input type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="auto-your-search">
                                <ul class="filtration-tags">

                                </ul>
                                <a href="#" class="clear-tags cs-color" style="display: none">Limpiar filtros</a>
                            </div>
                        </div>

                        @foreach($carros as $carro)

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="auto-listing">
                                <div class="cs-media">
                                    <figure> <img src="{{ url('/images/carros/'.$carro->id.'/0') }}" alt="#"></figure>
                                </div>
                                <div class="auto-text">
                                    <span class="cs-categories"><a href="{{ url('/perfil/'.$carro->idUser) }}">{{ $carro->user }}</a></span>
                                    <div class="post-title">
                                        <h4><a href="{{ url('/carro/view/'.$carro->id) }}">{{ $carro->marca }} {{ $carro->modelo }}</a></h4>
                                        <div class="auto-price"><span class="cs-color">${{ number_format($carro->precio) }}</span></div>
                                        <a href="#"><img src="" alt=""></a>
                                    </div>
                                    <ul class="auto-info-detail">
                                        <li>Año<span>{{ $carro->anio }}</span></li>
                                        <li>Millaje<span>{{ number_format($carro->millaje) }}</span></li>
                                        <li>Transmisión<span>{{ $carro->transmision }}</span></li>
                                        <li>Tipo de combustible<span>{{ $carro->tipoCombustible }}</span></li>
                                    </ul>
                                    <p>{{ $carro->comentarios }}</p>

                                    <a href="{{ url('/carro/view/'.$carro->id) }}" class="View-btn" >Ver detalles<i class=" icon-arrow-long-right"></i></a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
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