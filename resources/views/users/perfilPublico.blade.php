@extends('layout.master')

@section('title','perfil')

@section('cuerpo')
    <div class="main-section">
        <div class="page-section" style="background-color:#fafafa; padding:40px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-admin-info">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/extra-images/agent-detal-logo1.jpg" alt="#">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <div class="cs-title">
                                    <h3>{{ $perfil->nombre }}</h3>
                                    
                                </div>
                                <address>{{ $perfil->ubicacion}}</address>
                                <ul>
                                    <li>
                                        <span>Número telefónico</span>
                                        {{ $perfil->numtel}}
                                    </li>
                                    <li>
                                        <span>Email</span>
                                        <a href="#">{{ $perfil->email}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section" style="border-top:1px solid #eee; border-bottom:1px solid #eee; padding:20px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="cs-social-media pull-right">
                                    <ul>
                                        <li><a href="{{ $perfil->fb}}"><i class="icon-facebook22"></i></a></li>
                                        <li><a href="{{ $perfil->twitter}}"><i class="icon-twitter4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                @foreach($carros as $carro)

                                <div class="auto-listing">
                                    <div class="cs-media">
                                        <figure> <img alt="#" src="{{ url ('/images/carros/'.$carro->id.'/0') }}"></figure>
                                    </div>
                                    
                                    <div class="auto-text">
                                        <div class="post-title">
                                            <h4><a href="#">{{ $carro->marca }} {{ $carro->modelo }}</a></h4>
                                            <div class="auto-price"><span class="cs-color">{{ $carro->precio }}</span></div>
                                            <a href="#"><img alt="" src="assets/extra-images/post-list-img2.jpg"></a>
                                        </div>
                                        <ul class="auto-info-detail">
                                            <li>Año<span>{{ $carro->anio }}</span></li>
                                            <li>Millaje<span>{{ $carro->millaje }}</span></li>
                                            <li>Transmisión<span>{{ $carro->transmision }}</span></li>
                                            <li>Tipo de combustible<span>{{ $carro->tipoCombustible }}</span></li>
                                        </ul>
                                        
                                        <p>{{ $carro->comentarios }}</p>
                                        
                                    </div>
                                </div>
                                @endforeach


                            </div>
                                {{ $carros->links() }}
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="cs-tabs-holder">
                                    <div class="cs-location-tabs">
                                        <!--Tabs Start-->
                                        

                                        <!--Tabs End-->
                                    </div>
                                    <div class="cs-agent-contact-form">
                                        <span class="cs-form-title">Contact Dealer</span>

                                        <form>
                                            {{ csrf_field() }}
                                            <input type="text" placeholder="Full Name">
                                            <input type="email" placeholder="Email Address">
                                            <input type="text" placeholder="Phone Number">
                                            <textarea placeholder="I am interested in a price quote on this vehicle. Please contact me at your earliest convenience with your best price for this vehicle"></textarea>
                                            <input class="cs-bgcolor" type="submit" value="Contact Dealer">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <div class="page-section" style="background:#19171a;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-ad" style="text-align:center; padding:55px 0 32px;">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/extra-images/cs-ad-img.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
