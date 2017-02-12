@extends('users.topMenu')

@section('title','Configuración')

@section('vista')

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-user-section-title">
                    <h4>Configuración de su perfil</h4>
                </div>
            </div>
            <form class="user-setting" method="post" action="{{ url('/usuario/perfil/actualizar') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <div class="cs-browse-holder">
                                <em>Mi foto de perfil<br>*El cambio se verá reflejado posterior a guardar los cambios</em>
                                <span class="file-input btn-file"> Actualizar
                                    <input type="file" multiple name="fotoPerfil">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Nombre</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" placeholder="Primer nombre" value="{{ $user->nombre }}" name="txtNombre" required>
                            <br>
                            <br>
                            <input type="text" placeholder="Primer apellido" value="{{ $user->apellido }}" name="txtApellido" required>
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Nombre de usuario</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" placeholder="" value="{{ $user->username }}" required name="txtUsername">
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Correo electrónico</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" placeholder="" value="{{ $user->email }}" required name="txtEmail">
                        </div>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Ciudad</label>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-field">
                                            <input type="text" placeholder="Ciudad" value="{{ $user->ciudad }}" name="txtCiudad">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-massege-box">

                        <div class="alert alert-danger">
                            <i class="icon-warning3"></i>
                            <span>Al activar el pago autómatico se cargará a la cuenta que haya registrado como pago</span>
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-switch-holder">
                            <label for="someSwitchOptionDefault">Formulario de contacto</label>
                            <div class="material-switch">
                                <input type="checkbox" name="chkFormulario" id="someSwitchOptionDefault" <?php if($user->contacto){ echo "checked"; } ?> >
                                <label class="label-default" for="someSwitchOptionDefault"></label>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cs-switch-holder">
                                <label for="someSwitchOption">Pago autómatico</label>
                                <div class="material-switch">
                                    <input type="checkbox" name="chkAutoPago" id="someSwitchOption" <?php if($user->autopago){ echo "checked"; } ?> >
                                    <label class="label-default" for="someSwitchOption"></label>
                            </div>
                        </div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-seprator"></div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6>Información de contacto</h6>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Número de celular</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" placeholder="" name="txtCelular" value="{{ $user->numtel }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-seprator"></div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6>Actualizar la contraseña</h6>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Contraseña</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="password" placeholder="" name="txtPass">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-seprator"></div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6>Redes sociales</h6>
                    </div>
                </div>
                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Facebook</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" placeholder="" name="txtFb" value="{{ $user->fb }}">
                            <i class="icon-facebook2"></i>
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Twitter</label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-field">
                            <input type="text" placeholder="" name="txtTwitter" value="{{ $user->Twitter }}">
                            <i class="icon-twitter2"></i>
                        </div>
                    </div>
                </div>

                <div class="cs-field-holder">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                        <div class="cs-field">
                            <div class="cs-btn-submit">
                                <input type="submit" value="Guardar cambios">
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
            </form>
@endsection