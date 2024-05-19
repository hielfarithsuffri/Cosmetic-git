<?php
 
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Cart;
 use App\Models\Order;
 use Illuminate\Support\Facades\Auth;
 
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
         $total = $totalprice * 100; // Stripe expects the amount in cents
 
         $user = Auth::user();
         $userid = $user->id;
         $cartItems = Cart::where('user_id', $userid)->get();
 
         foreach ($cartItems as $cartItem) {
             $order = new Order;
             $order->name = $cartItem->name;
             $order->email = $cartItem->email;
             $order->phone = $cartItem->phone;
             $order->address = $cartItem->address;
             $order->user_id = $cartItem->user_id;
             $order->product_title = $cartItem->product_title;
             $order->quantity = $cartItem->quantity;
             $order->price = $cartItem->price;
             $order->image = $cartItem->image;
             $order->product_id = $cartItem->product_id;
             $order->payment_status = 'Pending'; // Initial status
             $order->delivery_status = 'Pending'; // Initial status
             $order->created_at = now();
             $order->updated_at = now();
 
             $order->save();
 
             $cartItem->delete();
         }
 
         $session = \Stripe\Checkout\Session::create([
             'line_items' => [
                 [
                     'price_data' => [
                         'currency' => 'USD',
                         'product_data' => [
                             'name' => $productname,
                         ],
                         'unit_amount' => $total,
                     ],
                     'quantity' => 1,
                 ],
             ],
             'mode' => 'payment',
             'success_url' => route('success'),
             'cancel_url' => route('checkout'),
         ]);
 
         return redirect()->away($session->url);
     }
 
     public function success()
     {
         $user = Auth::user();
         $userid = $user->id;
         $orders = Order::where('user_id', $userid)->where('payment_status', 'Pending')->get();
 
         foreach ($orders as $order) {
             $order->payment_status = 'Paid';
             $order->delivery_status = 'Processing';
             $order->updated_at = now();
             $order->save();
         }
 
         // Fetch the newly created orders to display in the invoice
         $orders = Order::where('user_id', $userid)->where('payment_status', 'Paid')->get();
 
         // Return the invoice view with the orders
         return view('home.invoice', ['orders' => $orders]);
     }
 }
 