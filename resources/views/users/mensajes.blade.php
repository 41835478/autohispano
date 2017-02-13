@extends('users.topMenu')

@section('title','Mensajes')

@section('vista')
    <style>
        .payment-content a{
            display: block;
        }

        .wp-automobile .payment-list .payment-content .noleido li{
           color:white;
        }
    </style>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="cs-user-section-title">
            <h4>Mensajes</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="payment-list">
            <ul>
                <li>
                    <div class="payment-label">
                        <ul>
                            <li>De</li>
                            <li>Fecha</li>
                            <li>Hora</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="payment-content">
                        <ul>
                            <?php
                                $id=0;
                            ?>
                            @foreach($mensajes as $mensaje)
                                <?php

                                if($mensaje->idUserSend!=$id){
                                    $id=$mensaje->idUserSend;
                                ?>
                                <a href="{{ url('/usuario/mensaje/'.$mensaje->idUserSend) }}">
                                    <li>{{ $mensaje->nombre }} {{ $mensaje->apellido }}</li>
                                    <li>{{ $mensaje->fecha }}</li>
                                    <li>{{ $mensaje->hora }}</li>
                                </a>
                                <?php
                                }
                                ?>
                            @endforeach
                        </ul>
                    </div>

                    {{ $mensajes->links() }}
                </li>
            </ul>
        </div>
    </div>
@endsection