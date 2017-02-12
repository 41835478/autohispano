@extends('layout.master')

@section('cuerpo')
    <div class="cs-user-account-holder">
        <div class="row">
            <?php
            if($user->tipo==1 && $user->status==0){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-massege-box">
                        <div class="alert alert-danger">
                            <i class="icon-warning3"></i>
                            <span>Su cuenta esta desactivada ya que no se ha realizado el pago correspondiente al mes
                        <br>
                        <a href="{{ url('/usuario/pagar') }}" class="cs-bgcolor btn" style="color:white;">Pagar</a>
                        </span>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="cs-user-accounts-list">
                    <li class="<?php if($num==1){ echo 'active'; }?>"><a href="{{ url('/usuario/perfil') }}">Mi perfil</a></li>
                    <li class="<?php if($num==2){ echo 'active'; }?>"><a href="{{ url('/usuario/perfil/inventario') }}">Mi inventario</a></li>
                    <li class="<?php if($num==3){ echo 'active'; }?>"><a href="{{ url('/usuario/perfil/mensajes') }}">Mensajes</a></li>
                    <li class="<?php if($num==4){ echo 'active'; }?>"><a href="{{ url('/usuario/perfil/pagos') }}">Pagos</a></li>
                    <li class="<?php if($num==5){ echo 'active'; }?>"><a href="{{ url('/usuario/perfil/configuracion') }}">Configuración</a></li>
                    <li class="<?php if($num==7){ echo 'active'; }?>"><a href="{{ url('/carro/nuevo') }}">Agregar carro</a></li>
                    <li class="<?php if($num==6){ echo 'active'; }?>"><a href="{{ url('/usuario/logout') }}">Cerrar sesión</a></li>
                </ul>
            </div>
            @yield('vista')
        </div>
    </div>
@endsection