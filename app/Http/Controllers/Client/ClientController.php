<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Land;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $categories = Category::inRandomOrder()->limit(3)->get();
        $products = Product::inRandomOrder()->limit(4)->get();

        return view('layout_cc.landing', compact('categories', 'products'));
    }

    public function allProducts()
    {
        // Fetch products with their category and paginate them
        $products = Product::with('category')->paginate(12);
        return view('layout_cc.products', compact('products'));
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(5)
            ->get();

        return view('layout_cc.products_details', compact('product', 'relatedProducts'));
    }

    public function checkout()
    {
        return view('layout_cc.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Validate the request data
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_address' => 'required|string|max:255',
            'client_phone' => 'required|string|max:15',
            'cart' => 'required|json', // Ensure cart is a valid JSON string
        ]);

        // Decode the cart data
        $cart = json_decode($request->cart);

        $totalPrice = 0;

        foreach ($cart as $item) {
            $product = Product::find($item->id);

            // Calculate the total price for the product
            $totalPrice += $product->price * $item->quantity;

            // Create the order entry
            Order::create([
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'total_price' => $product->price * $item->quantity,
                'client_name' => $request->client_name,
                'client_address' => $request->client_address,
                'client_phone' => $request->client_phone,
            ]);
        }

        // Return a response
        return redirect()->route('order.success')->with('message', 'Your order has been placed successfully!');
    }


    public function orderSuccess()
    {
        return view('layout_cc.order-success');
    }
}
