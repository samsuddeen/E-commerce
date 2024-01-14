<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Systemsetting;

class CartController extends Controller
{
    public function show_cart()
    {
        $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
        $data['carts'] =  Cart::where('user_id',auth()->user()->id)->get();

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
    public function removeproduct($id){
        if(!$id){
            return redirect()->back();
        }
    
       $cartItem= Cart::find($id);
       if($cartItem){
        $cartItem->delete();
       }
       return redirect()->back()->with('success', 'Product removed from the cart successfully.');
       }
}
