<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Adjust this import statement based on your actual Cart model

class StripeController extends Controller
{
    public function checkout()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get(); // Fetch cart items for the authenticated user
        return view('home.checkout', ['cart' => $cartItems]);
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $productname = $request->get('productname');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        // You might want to clear the cart after a successful payment
        // Cart::where('user_id', auth()->id())->delete();
        
        // Return the invoice view with the cart items
        return view('home.invoice', ['cart' => $cartItems]);
    }

}
