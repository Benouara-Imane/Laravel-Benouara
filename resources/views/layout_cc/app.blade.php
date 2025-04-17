<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('client/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('client/style.css')}}">

</head>

<!-- Navbar -->
@include('layout_cc.header')



@yield('frontend')

<!-- Footer -->
@include('layout_cc.footer')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('client/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('client/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('client/js/plugins.js')}}"></script>
<!-- Classy Nav js -->
<script src="{{asset('client/js/classy-nav.min.js')}}"></script>
<!-- Active js -->
<script src="{{asset('client/js/active.js')}}"></script>
<script>
    // Function to add product to the cart in localStorage and update the UI
    function addToCart(product) {
        // Get the current cart from localStorage, or initialize an empty array if it doesn't exist
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product already exists in the cart
        let existingProductIndex = cart.findIndex(item => item.id === product.id);

        if (existingProductIndex >= 0) {
            // If product exists, update the quantity
            cart[existingProductIndex].quantity += 1;
        } else {
            // If product doesn't exist in the cart, add it
            product.quantity = 1; // Default quantity is 1
            cart.push(product);
        }

        // Save the updated cart back to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Update the cart UI
        updateCartUI();
    }

    // Function to update the cart UI (cart items and cart summary)
    function updateCartUI() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let cartList = document.getElementById('cart-list');
        let cartSummary = document.getElementById('cart-summary');
        let cartItemCount = document.getElementById('cart-item-count');
        let essenceCartBtn = document.getElementById('essenceCartBtn').querySelector('span');

        // Clear the cart list and summary before re-rendering
        cartList.innerHTML = '';
        cartSummary.innerHTML = '';

        let subtotal = 0;
        let totalItems = cart.length;

        // If cart is empty, display a message
        if (cart.length === 0) {
            cartList.innerHTML = '<p>Your cart is empty</p>';
            cartSummary.innerHTML = `
                <li><span>Subtotal:</span> <span>$0.00</span></li>
                <li><span>Delivery:</span> <span>Free</span></li>
                <li><span>Total:</span> <span>$0.00</span></li>
            `;
            cartItemCount.innerText = 0;
            essenceCartBtn.innerText = 0; // Update cart icon button with 0
        } else {
            // Loop through each product in the cart and display them
            cart.forEach(item => {
                let cartItem = document.createElement('div');
                cartItem.classList.add('single-cart-item');
                cartItem.setAttribute('data-id', item.id); // Adding a custom attribute to use for removal

                cartItem.innerHTML = `
                    <a href="#" class="product-image">
                        <img src="${item.image}" class="cart-thumb" alt="Product Image">
                        <div class="cart-item-desc">
                            <span class="product-remove" onclick="removeFromCart('${item.id}')">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </span>
                            <span class="badge">${item.category}</span>
                            <h6>${item.title}</h6>
                            <p class="price">$${item.price}</p>
                            <p class="quantity">Quantity: ${item.quantity}</p> <!-- Displaying quantity -->
                        </div>
                    </a>
                `;

                cartList.appendChild(cartItem);

                // Update the subtotal (subtotal = price * quantity)
                subtotal += item.price * item.quantity;
            });

            // Update the cart item count
            cartItemCount.innerText = totalItems;

            // Update the cart summary (Total without discount)
            let delivery = 0; // Free delivery
            let totalWithoutDiscount = subtotal + delivery;

            cartSummary.innerHTML = `
                <li><span>Subtotal:</span> <span>$${subtotal.toFixed(2)}</span></li>
                <li><span>Delivery:</span> <span>Free</span></li>
                <li><span>Total (without discount):</span> <span>$${totalWithoutDiscount.toFixed(2)}</span></li>
            `;
            essenceCartBtn.innerText = totalItems; // Update cart icon button with the number of items
        }
    }

    // Function to remove product from cart (and localStorage)
    function removeFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Find and remove the product by ID
        cart = cart.filter(item => item.id !== productId);

        // Update localStorage with the new cart
        localStorage.setItem('cart', JSON.stringify(cart));

        // Reload the cart UI and update the cart count
        updateCartUI();
    }

    // Function to update order details and summary from cart
    function updateOrderDetails() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let orderDetails = document.getElementById('order-details');
        let orderSummary = document.getElementById('order-summary');
        let total = 0;

        // Clear previous items
        orderDetails.innerHTML = `<li><span>Product</span> <span>Total</span></li>`;

        // Loop through the cart and add products to the order
        cart.forEach(item => {
            let productTotal = item.price * item.quantity;
            total += productTotal;

            let orderItem = document.createElement('li');
            orderItem.innerHTML = `
                <span>
                    <img src="${item.image}" alt="${item.title}" class="cart-thumb" style="width: 50px; height: 50px; object-fit: cover;">
                    ${item.title} (x${item.quantity})
                </span> 
                <span>$${productTotal.toFixed(2)}</span>
            `;

            orderDetails.appendChild(orderItem);
        });

        // Update the order summary
        orderSummary.innerHTML = `
            <li><span>Subtotal:</span> <span>$${total.toFixed(2)}</span></li>
            <li><span>Shipping:</span> <span>Free</span></li>
            <li><span>Total:</span> <span>$${total.toFixed(2)}</span></li>
        `;
    }
    function placeOrder() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        

        
        // Clear the cart from localStorage
        localStorage.removeItem('cart');

        // Update the cart UI
        updateCartUI();

    }
    // Combine the window.onload functionality into one
    window.onload = function() {
        updateCartUI();
        updateOrderDetails();

        // Get cart data from localStorage and add it to the hidden input field
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        document.getElementById('cart-data').value = JSON.stringify(cart);
    };

    // Attach event listener to all 'Add to Cart' buttons using event delegation
    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('add-to-cart-btn')) {
            // Get product details from the data attributes
            let product = {
                id: event.target.getAttribute('data-id'),
                title: event.target.getAttribute('data-title'),
                price: parseFloat(event.target.getAttribute('data-price')), // Ensure it's a float
                image: event.target.getAttribute('data-image'),
                category: event.target.getAttribute('data-category')
            };

            // Ensure that the product has valid data
            if (product.id && product.title && product.price && product.image && product.category) {
                // Add product to cart
                addToCart(product);
            } else {
                console.error("Invalid product data:", product);
            }
        }
    });
</script>







</body>

</html>