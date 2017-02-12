@extends('layout.master')

@section('title','Inicio')

@section('cuerpo')
    <div style="background: url({{ url('/images/fondo.jpg') }})no-repeat; background-size:cover; padding:206px 0 80px; text-shadow: 3px 4px 6px rgba(0,0,0,.37);margin-top:-30px;height: 400px;background-attachment: fixed" class="page-section"></div>

    <div style="background: rgba(36, 41, 49, 1); padding-top:33px;padding-bottom:33px;-webkit-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);-moz-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);box-shadow: 0 0 5px rgba(0,0,0,.4), inset 0px 2px rgba(255,255,255,.3);border: solid 1px #242931;margin-bottom:110px;" class="page-section">
        <div class="container">
            <div class="row">
                <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!--Element Section Start-->
                        <div class="main-search">
                            <form method="post" action="{{ url('/inventario') }}">
                                {{ csrf_field() }}
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="search-input"> <i class="icon-search2"></i>
                                        <input type="text" placeholder="Buscar por modelo, fabricante o tipo" name="txtBusqueda" id="txtBusqueda">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <div class="select-location">
                                        <div id="cs-top-select-holder" class="select-location">
                                            <div class="cs_searchbox_div">
                                                <input type="text" autocomplete="off" placeholder="Ubicación" class="form-control cs_search_location_field" name="txtUbicacion" id="txtUbicacion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
                                    <div class="search-btn">
                                        <input type="button" class="cs-bgcolor" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Element Section End-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 co-sm-12 col-xs-12" style="padding-bottom:100px;"><!--Element Section Start-->
        <div class="cs-section-title">
            <h3 style="text-transform:uppercase !important;">El carro perfecto para ti</h3>
        </div>
        <!--Tabs Start-->

        <div class="cs-tabs full-width">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="ultimosContainer">
                    <div class="row">
                        @foreach($carros as $carro)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="auto-listing auto-grid">
                                <div class="cs-media">
                                    <figure> <img alt="#" src="{{ url('/images/carros/'.$carro->id.'/0') }}">
                                    </figure>
                                </div>
                                <div class="auto-text"> <span class="cs-categories"><a href="#">{{ $carro->tipo }}</a></span>
                                    <div class="post-title">
                                        <h6><a href="#">{{ $carro->marca }} {{ $carro->modelo }}</a></h6>
                                        <div class="auto-price"><span class="cs-color">${{ number_format($carro->precio) }}</span></div>
                                    </div>
                                    <a class="View-btn" href="{{ url('/carro/view/'.$carro->id) }}">Ver detalles<i class=" icon-arrow-long-right"></i></a> </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="cs-field-holder">
            <div class="col-lg-12 col-md-12 col-sm-12 col-md-12" style="text-align: center;">
                <a href="{{ url('/inventario') }}" class="cs-bgcolor btn" style="color:white">Mostrar todo</a>
            </div>
        </div>
    </div>
@endsection