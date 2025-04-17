@extends('layout_cc.app')

@section('frontend')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url('{{ asset('client/img/bg-img/breadcumb.jpg') }}');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">
                    <div class="cart-page-heading mb-30">
                        <h5>Billing Address</h5>
                    </div>

                    <form id="checkout-form" action="{{ route('order.place') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client_name">Full Name <span>*</span></label>
                                <input type="text" class="form-control" id="client_name" name="client_name" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="client_address">Address <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="client_address" name="client_address" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="client_phone">Phone No <span>*</span></label>
                                <input type="number" class="form-control" id="client_phone" name="client_phone" min="0" required>
                            </div>
                        </div>

                        <!-- Hidden input to send cart data -->
                        <input type="hidden" name="cart" id="cart-data">

                        <button type="submit" class="btn essence-btn" id="place-order-btn" onclick="placeOrder()">Place Order</button>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">
                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details</p>
                    </div>

                    <ul class="order-details-form mb-4" id="order-details">
                        <li><span>Product</span> <span>Total</span></li>
                        <!-- Product items will be dynamically added here -->
                    </ul>

                    <ul class="order-details-form mb-4" id="order-summary">
                        <!-- Summary will be dynamically added here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection