@extends('layout_cc.app')

@section('frontend')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url('{{ asset('client/img/bg-img/breadcumb.jpg') }}');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Dresses</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="shop_grid_product_area">
                <div class="row">
                    <!-- Loop through each product -->
                    @foreach($products as $product)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="height: 350px; object-fit: cover;">
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
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="navigation">
                <ul class="pagination mt-50 mb-70">
                    <!-- Dynamically display pagination links -->
                    {{ $products->links('pagination::bootstrap-4') }} <!-- Use Bootstrap or your custom pagination style -->
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection