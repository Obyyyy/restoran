@extends('layouts.app');

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pay with Paypay</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pay with Paypal</a></li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Service Start -->
    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=Acm5Cf039r3WBhw8xUqLwQHW90_jE9fozU2LImibeb0Qx6K5iHwXmgPV21OYgHU3Cd0eeudyfXFMswAX&currency=USD">
        </script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ Session::get('price') }}' // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {

                        window.location.href = 'http://restoran.test/cart/payment/success';
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </div>
@endsection
