@extends('layout_cc.app')

@section('frontend')
<!-- ##### Order Success Page Start ##### -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 text-center">
            <!-- Success Icon -->
            <div class="mb-4">
                <i class="fa fa-check-circle fa-5x text-success"></i>
            </div>

            <!-- Success Message -->
            <h3 class="mb-3">Your order has been placed successfully!</h3>
            <p class="lead mb-4">Thank you for your order. We will notify you when it has been shipped.</p>

            <!-- Button to Go to Home or Order Details -->
            <div class="d-flex justify-content-center">
                <a href="{{route('index.landing')}}" class="btn btn-primary mx-2">Go to Home</a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Order Success Page End ##### -->
@endsection
