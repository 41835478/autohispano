<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') | AutoHispano</title>
        <link rel="icon" href="{{ url('/images/icon.png') }}">
        <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ url('/css/iconmoon.css') }}">
        <link rel="stylesheet" href="{{ url('/css/chosen.css') }}">
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">
        <link href="{{ url('/css/cs-automobile-plugin.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('/css/color.css') }}">
        <link rel="stylesheet" href="{{ url('/css/widget.css') }}">
        <link rel="stylesheet" href="{{ url('/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ url('/css/bootstrap-slider.css') }}">

        <link rel="stylesheet" href="{{ url('/css/jquery.mCustomScrollbar.css') }}">


        <link rel="stylesheet" href="{{ url('/css/woocommerce.css') }}">

    </head>
    <body class="wp-automobile single-page cs-agent-detail">

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="cs-logo">
                        <div class="cs-media">
                            <figure><a href="{{ url('/') }}"><img alt="" src="{{ url('/images/logo.png') }}"></a></figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="cs-main-nav">
                        <nav class="main-navigation">
                            <ul>
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li><a href="{{ url('/inventario') }}">Inventario</a></li>
                                <li><a href="{{ url('/lista') }}">Dealers</a></li>
                                <?php
                                if(!isset($user)){
                                ?>
                                <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
                                <?php
                                }
                                ?>

                                <li class="cs-user-option">
                                    <div class="cs-login">

                                        <?php

                                            if(isset($user)){
                                            ?>
                                            <div class="cs-login-dropdown"> <a href="#"><i class="icon-user2"></i>{{ $user->nombre }} {{ $user->apellido }} <i class="icon-chevron-down2"></i></a>
                                                <div class="cs-user-dropdown">
                                                    <ul>
                                                        <li><a href="{{ url('/usuario/perfil') }}">Mi perfil</a></li>
                                                        <li><a href="{{ url('/usuario/perfil/inventario') }}">Mi inventario</a></li>
                                                        <li><a href="{{ url('/usuario/perfil/mensajes') }}">Mensajes</a></li>
                                                        <li><a href="{{ url('/usuario/perfil/configuracion') }}">Configuración</a></li>
                                                    </ul>
                                                    <a href="{{ url('/usuario/logout') }}" class="btn-sign-out">Cerrar Sesión</a>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        <a aria-hidden="true" data-target="#user-sign-up" <?php if(!isset($user)){ ?> data-toggle="modal" <?php }else{ ?> href="{{ url('/carro/nuevo') }}" <?php } ?> class="cs-bgcolor btn-form"><i class="icon-plus"></i> Añada su carro</a>
                                        <!-- Modal -->
                                        <div role="dialog" tabindex="-1" id="user-sign-up" class="modal fade">
                                            <div role="document" class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Crear una cuenta</h4>
                                                        <div class="cs-login-form">
                                                            <form method="post" action="{{ url('/usuario/nuevo') }}">
                                                                {{ csrf_field() }}
                                                                <div class="input-holder">
                                                                    <label for="cs-username"> <strong>Primer Nombre</strong><i class="icon-user-plus"></i>
                                                                        <input type="text" placeholder="Ingrese su nombre" id="cs-username" class="" name="txtNombre" required>
                                                                    </label>
                                                                </div>
                                                                <div class="input-holder">
                                                                    <label for="cs-username"> <strong>Primer Apellido</strong><i class="icon-user-plus"></i>
                                                                        <input type="text" placeholder="Ingrese su primer apellido" name="txtApellido" id="cs-username"  required>
                                                                    </label>
                                                                </div>
                                                                <div class="input-holder">
                                                                    <label for="cs-email"> <strong>Email</strong> <i class="icon-envelope"></i>
                                                                        <input type="email" placeholder="Ingrese su correo electrónico" name="txtCorreo" id="cs-email" required>
                                                                    </label>
                                                                </div>
                                                                <div class="input-holder">
                                                                    <label for="cs-confirm-password"> <strong>Celular</strong> <i class="icon-phone"></i>
                                                                        <input type="text" placeholder="Ingrese su número celular" name="txtCelular" id="cs-confirm-password" required>
                                                                    </label>
                                                                </div>

                                                                <div class="cs-switch-holder input-holer">
                                                                    <div class="material-switch">
                                                                        <input type="checkbox" name="chkDealer" id="someSwitchOptionPrimary" >
                                                                        <label class="label-default" for="someSwitchOptionPrimary"></label>
                                                                    </div>
                                                                    <label for="someSwitchOptionPrimary">
                                                                        Cuenta Dealer ($30US/mes)
                                                                    </label>

                                                                </div>
                                                                <br>

                                                                <div class="input-holder">
                                                                    <label for="cs-confirm-password"> <strong>Nombre de usuario</strong> <i class="icon-user-plus2"></i>
                                                                        <input type="text" placeholder="Ingrese su nombre de usuario" name="txtUsername" id="cs-confirm-password" required>
                                                                    </label>
                                                                </div>
                                                                <div class="input-holder">
                                                                    <label for="cs-login-password"> <strong>Contraseña</strong> <i class="icon-unlock40"></i>
                                                                        <input type="password" placeholder="Ingrese su contraseña" name="txtPass" id="cs-login-password" required>
                                                                    </label>
                                                                </div>
                                                                <div class="input-holder">
                                                                    <input type="submit" value="Crear cuenta" class="cs-color csborder-color">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="cs-separator"><span>o</span></div>
                                                        <a aria-hidden="true" href="{{ url('/login') }}" >Iniciar sesión</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                        <div class="cs-user-option hidden-lg visible-sm visible-xs">
                            <div class="cs-login">

                                <?php

                                if(isset($user)){
                                ?>
                                    <div class="cs-login-dropdown"> <a href="#"><i class="icon-user2"></i>{{ $user->nombre }} {{ $user->apellido }} <i class="icon-chevron-down2"></i></a>
                                        <div class="cs-user-dropdown">
                                            <ul>
                                                <li><a href="{{ url('/usuario/perfil') }}">Mi perfil</a></li>
                                                <li><a href="{{ url('/usuario/perfil/inventario') }}">Mi inventario</a></li>
                                                <li><a href="{{ url('/usuario/perfil/mensajes') }}">Mensajes</a></li>
                                                <li><a href="{{ url('/usuario/perfil/configuracion') }}">Configuración</a></li>
                                            </ul>
                                            <a href="{{ url('/usuario/logout') }}" class="btn-sign-out">Cerrar Sesión</a> </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <a aria-hidden="true" data-target="#user-sign-up-sm" href="{{ url('/carro/nuevo') }}" <?php if(!isset($user)){ ?>data-toggle="modal" <?php } ?> class="cs-bgcolor btn-form"><i class="icon-plus"></i> Añada su carro</a>

                                <div role="dialog" tabindex="-1" id="user-sign-up-sm" class="modal fade">
                                    <div role="document" class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Crear una cuenta</h4>
                                                <div class="cs-login-form">
                                                    <form method="post" action="{{ url('/usuario/nuevo') }}">
                                                        {{ csrf_field() }}
                                                        <div class="input-holder">
                                                            <label for="cs-username"> <strong>Primer Nombre</strong><i class="icon-user-plus"></i>
                                                                <input type="text" placeholder="Ingrese su nombre" id="cs-username" class="" name="txtNombre" required>
                                                            </label>
                                                        </div>
                                                        <div class="input-holder">
                                                            <label for="cs-username"> <strong>Primer Apellido</strong><i class="icon-user-plus"></i>
                                                                <input type="text" placeholder="Ingrese su primer apellido" name="txtApellido" id="cs-username"  required>
                                                            </label>
                                                        </div>
                                                        <div class="input-holder">
                                                            <label for="cs-email"> <strong>Email</strong> <i class="icon-envelope"></i>
                                                                <input type="email" placeholder="Ingrese su correo electrónico" name="txtCorreo" id="cs-email" required>
                                                            </label>
                                                        </div>
                                                        <div class="input-holder">
                                                            <label for="cs-confirm-password"> <strong>Celular</strong> <i class="icon-phone"></i>
                                                                <input type="text" placeholder="Ingrese su número celular" name="txtCelular" id="cs-confirm-password" required>
                                                            </label>
                                                        </div>
                                                        <div class="cs-switch-holder input-holer">
                                                            <div class="material-switch">
                                                                <input type="checkbox" name="chkDealer" id="someSwitchOptionPrimary" >
                                                                <label class="label-default" for="someSwitchOptionPrimary"></label>
                                                            </div>
                                                            <label for="someSwitchOptionPrimary">
                                                                Cuenta Dealer ($30US/mes)
                                                            </label>

                                                        </div>
                                                        <br>

                                                        <div class="input-holder">
                                                            <label for="cs-confirm-password"> <strong>Nombre de usuario</strong> <i class="icon-user-plus2"></i>
                                                                <input type="text" placeholder="Ingrese su nombre de usuario" name="txtUsername" id="cs-confirm-password" required>
                                                            </label>
                                                        </div>
                                                        <div class="input-holder">
                                                            <label for="cs-login-password"> <strong>Contraseña</strong> <i class="icon-unlock40"></i>
                                                                <input type="password" placeholder="Ingrese su contraseña" name="txtPass" id="cs-login-password" required>
                                                            </label>
                                                        </div>
                                                        <div class="input-holder">
                                                            <input type="submit" value="Crear cuenta" class="cs-color csborder-color">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="cs-separator"><span>o</span></div>
                                                <a aria-hidden="true" href="{{ url('/login') }}" >Iniciar sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="wrapper">
        @yield('cuerpo')
    </div>

    <footer id="footer">
        <div style="background:#141215; padding-top:37px; padding-bottom:37px;" class="cs-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="copyright-text">
                            <p>Powered by <a class="cs-color" href="{{ url('/') }}">DC-IT</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="cs-back-to-top">
                            <address>
                                <i class="icon-phone"></i> <a href="#">+0 (123) 456-789-10</a>
                            </address>
                            <a href="" class="btn-to-top cs-bgcolor"><i class="icon-keyboard_arrow_up"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>

    <script src="{{ url('/scripts/jquery.js') }}"></script>
    <script src="{{ url('/scripts/jquery.countdown.js') }}"></script>
    <script src="{{ url('/scripts/jquery.mCustomSCrollbar.concat.min.js') }}"></script>
    <script src="{{ url('/scripts/jquery.viewbox.min.js') }}"></script>
    <script src="{{ url('/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ url('/scripts/bootstrap-slider.js') }}"></script>
    <script src="{{ url('/scripts/echo.js') }}"></script>
    <script src="{{ url('/scripts/functions.js') }}"></script>
    <script src="{{ url('/scripts/chosen.select.js') }}"></script>
    <script src="{{ url('/scripts/counter.js') }}"></script>
    <script src="{{ url('/scripts/modernizr.js') }}"></script>
    <script src="{{ url('/scripts/responsive.menu.js') }}"></script>
    <script src="{{ url('/scripts/slick.js') }}"></script>
    @yield('js')
</html>