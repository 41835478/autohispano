@extends('layout.master')

@section('title','Iniciar Sesión')

@section('cuerpo')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div style="margin-bottom:20px;" class="cs-section-title">
                            <h3 style="text-align:left;">Iniciar Sesión</h3>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                            if(isset($error)){
                            ?>
                            <div class="cs-massege-box">
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <i class="icon-blocked"></i>
                                    <span>El nombre de usuario y/o la contraseña son incorrectos</span>
                                </div>
                            </div>
                            <?php
                            }
                        ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="cs-signin">
                            <div class="row">
                                <form method="post" action="{{ url('/usuario/login') }}">
                                    {{ csrf_field() }}
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Nombre de usuario o correo electrónico *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="" name="txtCorreo">
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Contraseña *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" placeholder="" name="txtPass">
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-btn-submit">
                                                <input type="submit" value="Iniciar Sesión">
                                            </div>
                                            <a data-dismiss="modal" data-target="#user-forgot-pass" data-toggle="modal" class="cs-forgot-password" href="#"><i class="cs-color icon-help-with-circle"></i>Forgot password?</a> </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-checkbox">
                                                <input type="checkbox" value="check1" name=chkRemember" id="check15">
                                                <label for="check15">Recordarme</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection