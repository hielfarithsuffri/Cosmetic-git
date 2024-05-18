<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

use Session;

use Stripe;


class HomeController extends Controller
{
    public function index()
    {
        $product = products::paginate(3);
        return view('home.userpage', compact ('product'));
    }
    public function redirect()
    {
        // Retrieve the 'usertype' attribute from the authenticated user
        $usertype = Auth::user()->usertype;

        // Debugging statement to inspect the value of $usertype
    

        // Check the value of $usertype and return the appropriate view
        if ($usertype == '1') {
            return view('admin.home'); // Redirect to admin homepage
        } else {
            $product = products::paginate(3);
            return view('home.userpage', compact ('product')); // Redirect to user dashboard
        }
    }
    public function product_detail($id)
    {
        $product = products::find($id);
        return view('home.product_detail',compact ('product'));
    }

    public function add_cart(Request $request,$id)
    {   
        
        if(Auth::id()){
            $user=Auth::user();
            $product = products::find($id);
            $cart = new cart();
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            $cart->image=$product->image;
            if($product->discount_price!=null){
                $cart->price=$product->discount_price;
            }
            else {
                $cart->price=$product->price;
            }
            
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
            
        }

        else {

            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else {
            return redirect('login');
        }

    }

    public function delete_cart($id)
    {
        
            $cart=cart::find($id);
            $cart->delete();
            return redirect('show_cart');

    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for the payment" 
        ]);
        Session::flash('success', 'Payment successful!');
        return back();

    }



    

}
