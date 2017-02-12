@extends('layout.master')

@section('title','Inicio')

@section('cuerpo')
    <?php
        $c=$carros[0];
    ?>
    <div class="cs-banner loader">
        <ul class="cs-banner-slider slick-initialized ">
            <div aria-live="polite" class="slick-list draggable" tabindex="0">
                <div class="slick-track" style="opacity: 1; width: 5746px;">
                    <?php
                        for($i=0;$i<$c->contadorImagenes;$i++){
                    ?>
                    <li class="slick-slide slick-active" data-slick-index="-4" aria-hidden="false" style="width: 338px;">
                        <div class="cs-media">
                            <figure><img data-echo="{{ url('/images/carros/'.$c->id.'/'.$i) }}" src="/images/blank.gif" alt=""></figure>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <button type="button" data-role="none" class="slick-prev" aria-label="previous" style="display: block;">Previous</button><button type="button" data-role="none" class="slick-next" aria-label="next" style="display: block;">Next</button></ul>

    </div>

    <div class="main-section">
        <div class="page-section" style="box-shadow: 0 2px 3px -2px rgba(0,0,0,0.4);position:relative;">
            <div class="container">
                <div class="row">
                    <div class="custom-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="page-section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="car-detail-heading">
                                        <div class="auto-text">
                                            <h2>{{ $c->marca }} {{ $c->modelo }}</h2>
                                            <span><i class="icon-building-o"></i>{{ $c->colorExterior }}</span>
                                            <address><i class="icon-location"></i>{{ $c->ciudad }}</address>
                                        </div>
                                        <div class="auto-price"><span class="cs-color">${{ number_format($c->precio) }}</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-detail-nav">
                                        <ul>
                                            <li><a class="" href="#vehicle">Información general</a></li>
                                            <li><a href="#specification" class="active">Especificaciones técnicas</a></li>
                                            <?php
                                                if($c->contacto){
                                            ?>
                                            <li><a href="#contact">Contactanos</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="on-scroll">
                                        <div id="vehicle" class="auto-overview detail-content">
                                            <ul class="row">
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-calendar cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Año</span>
                                                        <strong>{{ $c->anio }}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-vehicle92 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Millaje</span>
                                                        <strong>{{ number_format($c->millaje) }}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-driving2 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Transmisión</span>
                                                        <strong>{{ $c->transmision }}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-gas20 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Combustible</span>
                                                        <strong>{{ $c->tipoCombustible }}</strong>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="more-text" style="display: block;">
                                                {{ $c->comentarios }}
                                            </p>
                                        </div>
                                        <div id="specification" class="auto-specifications detail-content">
                                            <div class="section-title" style="text-align:left;">
                                                <h4>Especificaciones técnicas</h4>
                                            </div>
                                            <ul class="row">
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="element-title">
                                                        <i class="cs-color icon-car"></i>
                                                        <span>General</span>
                                                    </div>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Condición</span>

                                                                <strong><?php if($c->condicion==0){ echo "Usado";}else{ echo "Nuevo";} ?></strong>
                                                            </li>
                                                            <li>
                                                                <span>Color exterior</span>
                                                                <strong>{{ $c->colorExterior }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Color interior</span>
                                                                <strong>{{ $c->colorInterior }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Manejo</span>
                                                                <strong>{{ $c->manejo }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Fecha de registro</span>
                                                                <strong>{{ $c->fechaRegistro }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>VIN</span>
                                                                <strong>{{ $c->vin }}</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
                                        if($c->contacto){
                                            ?>
                                        <div id="contact" class="cs-contact-form detail-content">
                                            <div class="section-title">
                                                <h4 style="text-align:left;">Contact Us</h4>
                                            </div>
                                            <form>
                                                <input type="text" placeholder="Full Name">
                                                <input type="email" placeholder="Email Address">
                                                <input type="text" placeholder="Phone Number">
                                                <textarea placeholder="Your Message"></textarea>
                                                <input type="submit" value="submit" class="cs-bgcolor">
                                            </form>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="cs-category-link-icon">
                            <ul>
                                <li><a href="{{ url('/perfil/'.$c->idUser) }}" target="_blank"><i class="cs-color icon-info-circle"></i>Ver todos mis carros</a></li>
                                <?php if(isset($user)){ ?><li><a data-toggle="modal" data-target="#mandar-mensaje"><i class="cs-color icon-email"></i>Mandame un mensaje</a></li><?php } ?>
                            </ul>
                            <?php if(isset($user)){ ?>
                            <div class="cs-form-modal">
                                <div class="modal fade" id="mandar-mensaje" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Mandar mensaje</h4>
                                                <div class="cs-login-form">
                                                    <form class="row" action="{{ url('/mandarmensaje') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $user->id }}" name="idUserSend">
                                                        <input type="hidden" value="{{ $c->idUser }}" name="idUserReceive">
                                                        <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <div class="cs-modal-field">
                                                                <label for="txtMensaje">
                                                                    <strong>Mensaje</strong>
                                                                    <i class="icon-text"></i>
                                                                    <textarea required name="txtMensaje" id="txtMensaje"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <div class="cs-modal-field">
                                                                <button class="csborder-color btn-form btn cs-bgcolor" style="color:white;" type="submit">
                                                                    <i class="icon-send"></i>
                                                                    Mandar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
