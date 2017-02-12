@extends('users.topMenu')

@section('title','Mi perfil')

@section('vista')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="cs-user-section-title">
            <h4>Mi perfil</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="cs-profile-pic">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="profile-pic">
                    <div class="cs-media">
                        <figure>
                            <?php
                            if($user->foto!=""){
                            ?>
                            <img alt="" src="{{ url('/images/usuarios/'.$user->foto) }}">
                            <?php
                            }
                            else{
                            ?>
                            <img src="{{ url('/images/usuarios/sinfoto.png') }}">
                            <?php
                            }
                            ?>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                <div class="cs-browse-holder">
                    <h2>{{ $user->nombre }} {{ $user->apellido }}</h2>
                    <p><strong>Nombre de usuario:</strong> {{ $user->username }}</p>
                    <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
                    <p><strong>Número celular:</strong> {{ $user->numtel }}</p>
                    <p><strong>Tipo de cuenta:</strong>
                        <?php
                        if($user->tipo==0){
                            echo "Estándar";
                        }
                        else{
                            echo "Dealer";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                <div class="cs-browse-holder">
                    <p><strong>Pago Automático:</strong>
                        <?php
                        if($user->autopago){
                            echo "Sí";
                        }
                        else{
                            echo "No";
                        }
                        ?></p>
                    <p><strong>Fb: </strong> {{ $user->fb }}</p>
                    <p><strong>Twitter:</strong> {{ $user->twitter }}</p>

                </div>
            </div>
        </div>
    </div>
    <div class="cs-field-holder">
        <div class="col-lg-12 col-md-12 col-sm-12 col-md-12">
            <a href="{{ url('/usuario/perfil/configuracion') }}" class="cs-bgcolor btn" style="color:white;">Cambiar configuración</a>
            <a href="{{ url('/perfil/'.$user->id) }}" class="cs-bgcolor btn" style="color:white;">Ver perfil público</a>
        </div>
    </div>
@endsection