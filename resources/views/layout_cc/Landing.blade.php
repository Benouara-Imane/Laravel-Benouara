@extends('layout_cc.app')


@section('frontend')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url('{{ asset('client/img/bg-img/bg-1.jpg') }}');">

    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h6>asoss</h6>
                    <h2>New Collection</h2>
                    <a href="{{route('allProducts')}}" class="btn essence-btn">view collection</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->


<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">


                    @foreach($products as $product)
                    <div class="single-product-wrapper ">
                        <!-- Product Image -->
                        <div class="product-img ">
                            <img class="card-img-top w-200" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="height: 350px; object-fit: cover;">

                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>{{ $product->category->name }}</span>
                            <a href="{{ route('product.details', $product->id) }}">
                                <h6>{{ $product->title }}</h6>
                            </a>
                            <p class="product-price">${{ number_format($product->price, 2) }}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="javascript:void(0)" class="btn essence-btn add-to-cart-btn"
                                        data-id="{{ $product->id }}"
                                        data-title="{{ $product->title }}"
                                        data-price="{{ $product->price }}"
                                        data-image="{{ asset('storage/' . $product->image) }}"
                                        data-category="{{ $product->category->name }}">
                                        Add to Cart
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('client/img/core-img/brand1.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('client/img/core-img/brand2.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('client/img/core-img/brand3.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('client/img/core-img/brand4.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('client/img/core-img/brand5.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('client/img/core-img/brand6.png')}}" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->

@endsection