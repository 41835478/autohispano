@extends('users.topMenu')

@section('title','Mensajes')

@section('vista')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="cs-user-section-title">
            <h4>Mensaje de {{ $remitente->nombre }} {{ $remitente->apellido }}</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="scroll" style="max-height: 400px; overflow-y: scroll">
            <ul class="cs-shortlisted-car">
                @foreach($mensajes as $mensaje)
                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12" <?php if($mensaje->idUserSend==$user->id){ ?> style="text-align: right"  <?php } ?>>

                        <div class="cs-text">
                            <address>
                                <i class=" icon-calendar"></i>{{ $mensaje->fecha }} {{ $mensaje->hora }}
                            </address>
                            <p>
                                {{ $mensaje->mensaje }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <br>
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="cs-signin">
                <div class="row">
                    <form class="row" action="{{ url('/mandarmensaje') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $user->id }}" name="idUserSend">
                        <input type="hidden" value="{{ $remitente->id }}" name="idUserReceive">
                        <input type="hidden" value="{{ $mensajes[0]->idMensaje }}" name="idMensaje">
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
@endsection