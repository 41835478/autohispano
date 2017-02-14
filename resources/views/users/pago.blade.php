@extends('users.topMenu')

@section('title','Pagar')

@section('vista')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="woocommerce">
            <form class="checkout woocommerce-checkout row" method="post" action="{{ url('/cobrar') }}">
            <?php if(isset($c)){?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="auto-listing">
                    <div class="cs-media">
                        <figure> <img alt="#" src="{{ url('/images/carros/'.$c[0]->id.'/0') }}"></figure>
                    </div>
                    <div class="auto-text"> <span class="cs-categories"><a href="#">Timlers Motors</a></span>
                        <div class="post-title">
                            <h4>{{ $c[0]->marca }} {{ $c[0]->modelo }}</h4>
                        </div>
                    </div>
                </div>
            </div>
                <input type="hidden" value="{{ $c[0]->id }}" name="idCarro">
                <?php
                } ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @foreach($precios as $precio)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <div class="pricetable-holder modren first-element">
                            <h2>{{ $precio->nombre }}</h2>
                            <div class="price-holder ">
                                <div class="cs-price">
                                    <span class="cs-color">
                                        <sup class="cs-color">$</sup>{{ $precio->precio }}<em>/Mes</em>
                                    </span>

                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>

                {{ csrf_field() }}

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4>Su pago</h4>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                            <tr>
                                <th class="product-name">Servicio</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item">
                                <?php if(isset($c)){?>
                                    <td class="product-name">{{ $c[0]->marca }} {{ $c[0]->modelo }}</td>
                                    <?php } else {
                                        ?><td class="product-name">Mensualidad Dealer</td>
                                        <?php
                                    }
                                    ?>

                                <td class="product-total">
                                    <span class="amount">
                                        <div class="cs-field-holder">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-field">
                                                    <select id="cboPrecio" name="cboPrecio" class="chosen-select">
                                                        @foreach($precios as $precio)
                                                            <option value="{{ $precio->id }}">${{ $precio->precio }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4>Pagar</h4>
                    <div id="payment" class="woocommerce-checkout-payment">
                        <ul class="wc_payment_methods payment_methods methods">
                            <li>
                                <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_PLfcizpu5o33tR0cb13IDX3P"
                                        data-email="{{ $user->email }}"
                                        data-locale="auto"
                                        >
                                </script>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection