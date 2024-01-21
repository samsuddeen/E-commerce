<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use Illuminate\Http\Request;
use App\Systemsetting;
use App\Order;
use Session;
use Stripe;

class CartController extends Controller
{
    public function show_cart()
    {
        $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
        $data['carts'] = Cart::where('user_id',auth()->user()->id)->get();
        

        return view('frontend.showcart',$data);
    }

    public function addToCart(Request $request)
    {

        $user = auth()->user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        
        
        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            // If not, create a new cart item
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
        $data['carts'] =  Cart::with('product')->where('user_id',auth()->user()->id)->get();

        return view('frontend.showcart',$data);
    }


        //      //Delete Record
public function removeproduct($id){
    if (!$id) {
        return redirect()->back();
    }
    $cartItem = Cart::find($id);

   if($cartItem){
    $cartItem->delete();
   }
   return redirect()->route('show_cart')->with('success', 'Product removed from cart successfully.');
   }




    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        
        $data = Cart::where('user_id','=',$userid)->get();
        foreach($data as $data)
        {
            $order=new order;
    
            $order->user_id=$data->user_id;
            $order->quantity=$data->quantity;
            $order->product_id=$data->product_id;
        
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            
            $order->save();
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','we will send your order soon.');


    }

    public function stripe($total)
    {
        return view('frontend.stripe',compact('total'));
    }

    public function stripePost(Request $request,$total)
    {
        $totalNumeric = (float) str_replace(['$', ','], '', $total);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalNumeric * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);

        $user=Auth::user();
        $userid=$user->id;
        
        $data = Cart::where('user_id','=',$userid)->get();
        foreach($data as $data)
        {
            $order=new order;
    
            $order->user_id=$data->user_id;
            $order->quantity=$data->quantity;
            $order->product_id=$data->product_id;
        
            $order->payment_status='Paid';
            $order->delivery_status='processing';
            
            $order->save();
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id', '=', $userid)->get();
            return view('frontend.order', compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=Order::find($id);
        $order->delivery_status='You cancelled the order';
        $order->save();
        return redirect()->back();
    }

    public function order_search(Request $request)
    {
        $searchterm =$request->search;
        $data['systemdata'] = Systemsetting::find(1);
  $_SESSION['setting'] = $data['systemdata'];
  $order=Order::where('user_id','LIKE','%'.$searchterm.'%')
            ->orWhere('product_id','LIKE','%'.$searchterm.'%')
            ->orWhere('payment_status','LIKE','%'.$searchterm.'%')->get();
           
            return view('backend.dashboard.order',compact('order'));
  
  }
    }

