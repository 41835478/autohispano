@extends('users.topMenu')

@section('title','Mis pagos')

@section('vista')

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-user-section-title">
                    <h4>Sus pagos</h4>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="payment-list">
                    <ul>
                        <li>
                            <div class="payment-label">
                                <ul>
                                    <li>Fecha</li>
                                    <li>Monto</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="payment-content">
                                @foreach($pagos as $pago)
                                <ul>

                                    <li>{{ $pago->fecha }}</li>
                                    <li>${{ $pago->monto }}US</li>

                                </ul>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
@endsection