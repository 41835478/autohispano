@extends('users.topMenu')

@section('title','Mi inventario')

@section('vista')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-user-section-title">
                    <h4>Lista de mis vehículos</h4>
                    @if($user->tipo==1)
                    <p>* En caso de que su cuenta este desactivada ningún vehículo será mostrado aunque diga que se encuentra publicado</p>
                    @endif
                </div>
            </div>
            <ul class="cs-featurelisted-car">
                @foreach($carros as $carro)
                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-media">
                        <figure><a href="#"><img alt="" style="display: block; width: 100%;" src="{{ url('/images/carros/'.$carro->id.'/0') }}"></a></figure>
                    </div>
                    <div class="cs-text">
                        <h6><a href="#">{{ $carro->marca }} {{ $carro->modelo }}</a></h6>
                        <div class="post-options">
                            <span>Tipo <em>{{ $carro->tipo }}</em></span>
                            <span><a href="#"> Precio <em>${{ number_format($carro->precio)}}</em></a></span>
                            @if($user->tipo==0)
                            <span><a href="#">Vencimiento:<em>{{ $carro->vencimiento }}</em></a></span>
                            @endif
                        </div>
                        <div class="cs-post-types">
                            <div class="cs-post-list">


                                <div class="cs-post-list cs-list">
                                    <?php
                                    if($carro->estado==1){
                                    ?>
                                        <a title="" data-placement="top" data-toggle="tooltip" href="{{ url('/carro/editar/'.$carro->id) }}" data-original-title="Editar">
                                            <i class="icon-edit2"></i>
                                        </a>
                                        <a title="" data-placement="top" data-toggle="tooltip" href="{{ url('/carro/vendido/'.$carro->id) }}" data-original-title="Marcar como vendido">
                                            <i class="icon-check-circle"></i>
                                        </a>
                                    <?php
                                    }
                                    elseif($carro->estado==0 || $carro->estado==4){
                                        ?>
                                        <a title="" data-placement="top" data-toggle="tooltip" href="{{ url('/usuario/pagar/'.$carro->id) }}" data-original-title="Pagar">
                                            <i class="icon-payment"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                                if($carro->estado==2){
                                ?>
                                <span style="color:#4aa818; border:1px solid #4aa818;" class="cs-default-btn">Publicado</span>
                                <?php
                                }
                                elseif($carro->estado==0){
                                ?>
                                <span style="color:#d00000; border:1px solid #d00000; display:block;" class="cs-default-btn">Por pagar</span>
                                <?php
                                }
                                elseif($carro->estado==3){
                                ?>
                                <span style="color:#e28e20; border:1px solid #e28e20;" class="cs-default-btn">Vendido</span>
                                <?php
                                }
                                elseif($carro->estado==4){
                                ?>
                                <span style="color:#d00000; border:1px solid #d00000;" class="cs-default-btn">Vencido</span>
                                <?php
                                }
                                elseif($carro->estado==1){
                                ?>
                                <span style="color:#14eb00; border:1px solid #14eb00;" class="cs-default-btn">Destacado</span>
                                <?php
                                }
                                ?>

                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
            <div class="cs-load-more">{{ $carros->links() }}</div>

@endsection