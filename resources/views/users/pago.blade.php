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
            <?php } ?>

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
                                <td class="product-name">{{ $c[0]->marca }} {{ $c[0]->modelo }}</td>
                                <td class="product-total"><span class="amount">${{ $monto }}US</span></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td><span class="amount">${{ $monto }}US</span></td>

                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td><span class="amount">${{ $monto }}US</span></td>
                            </tr>
                            </tfoot>
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
                                        data-amount="{{ $montoDos }}"
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