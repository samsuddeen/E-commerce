<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Systemsetting;
use App\Category;
use App\product;
use App\ordermailmodel;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class mailcontroller extends Controller
{
     //mail
     public function usermails(Request $request, $id)
     {
         if (!$id) {
             return redirect()->back();
         }
 
         $product = product::find($id);
         $data['system'] = Systemsetting::find(1);
         $_SESSION['setting'] = $data['system'];
 
         $orderNumber = rand(10, 9999999999999);
 
         if ($product) {
             $data = [
                 'ordernumber' => $orderNumber,
                 'user_id' => auth()->user()->id,
                 'product_id' => $id,
             ];
 
             $orderMail = ordermailmodel::create($data);
 
             if ($orderMail) {
                 $to = auth()->user()->email;
                 Mail::to($to)->send(new OrderMail($orderMail));
 
                 return redirect()->back()->with('success', 'Order placed successfully and email sent!');
             }
         }
 
         // If execution reaches here, it means something went wrong
         return redirect()->back()->with('error', 'Failed to process the order.');
     }
 }
