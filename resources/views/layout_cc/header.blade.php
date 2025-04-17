<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="index.html"><img src="{{asset('client/img/core-img/logo.png')}}" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="{{ route('index.landing') }}">Home</a></li>
                        <li><a href="{{ route('allProducts') }}">Shop</a></li>

                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
           
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="{{asset('client/img/core-img/bag.svg')}}" alt=""> <span>0</span></a>
            </div>
        </div>

    </div>
</header>

<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">
    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart">
            <img src="{{asset('client/img/core-img/bag.svg')}}" alt="">
            <span id="cart-item-count">0</span> <!-- Number of items in the cart -->
        </a>
    </div>

    <div class="cart-content d-flex">
        <!-- Cart List Area -->
        <div class="cart-list" id="cart-list">
            <!-- Cart items will be added here dynamically -->
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">
            <h2>Summary</h2>
            <ul class="summary-table" id="cart-summary">
                <!-- Cart summary will be updated dynamically -->
            </ul>
            <!-- Checkout Button -->
            <div class="checkout-btn mt-100" id="checkout-btn">
                <a href="{{route('checkout')}}" class="btn essence-btn">Check out</a>
            </div>
            <!-- Empty Cart Message -->
            <div class="empty-cart-message mt-3" id="empty-cart-message" style="display: none;">
                <p>Your cart is empty. Add some products to your cart!</p>
            </div>
        </div>
    </div>
</div>

