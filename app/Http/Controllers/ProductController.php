<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Order;
use App\Systemsetting;
use App\mail\OrderMail;
use App\mail;
class ProductController extends Controller
{
   //Data Insert
   public function productcreate(Request $request){
    $image_url = '';
    if($request->has('image') && $request->file('image')){
        $file  = $request->file('image');
        $name  = time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/productimg'.'/';
        $file->move($path,$name);
        $image_url = asset('/productimg').'/'.$name;
    }
    $data = [
        'name'=>$request->name,
        'price'=>$request->price,
        'description'=>$request->description,
        'status'=> $request->status,
        'image'=>$image_url,
        'category_id'=>$request->category_id

   ];

   product::insert($data);
   return redirect()->back();
}

//Category Display
public function displayData(){
    $data['categories']= category::where('status',1)->get();
     return view('backend.product.create',$data);
 }

 //product Display
 public function displayproduct(){
    $data= product::all();
     return view('backend.product.display',compact('data'));
 }

      //Edit Data
      public function editproduct($id)
      {
       if(!$id){
           return redirect()->back();
       }
       $cat_data= product::find($id);
       $categories = Category::all();
      if($cat_data){

    return view('backend.product.edit', compact('cat_data', 'categories'));

      }
      return redirect()->back();
      }



//      //Delete Record
public function deleteproduct($id){
    if(!$id){
        return redirect()->back();
    }

   $cat_data= product::find($id);
   if($cat_data){
    $cat_data->delete();
   }
   return redirect()->back();
   }


       //Update Data
       public function updateproduct(Request $request,$id)
       {
        if(!$id){
            return redirect()->back();
        }
        $cat_data= product::find($id);
       if($cat_data){
        $image_url = '';
        if($request->has('image') && $request->file('image')){
            $file  = $request->file('image');
            $name  = time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/productimg'.'/';
            $file->move($path,$name);
            $image_url = asset('/productimg').'/'.$name;
        }
        $data = [
         'name'=>$request->name,
        'price'=>$request->price,
        'description'=>$request->description,
        'status'=> $request->status,
        'image'=>$image_url,
        'category_id'=>$request->category_id
       ];
       $cat_data->update($data);
      return redirect()->route('display.product');

       }
       return redirect()->back();
    }


    public function index(){
        $data['categories'] = Category::where('status',1)->get();
        return view('backend.product.create', $data);

  }
  public function productDetails($id){
    if(!$id){
      return redirect()->back();
    }
    $data['product'] = product::find($id);
    $data['system'] = Systemsetting::find(1);
    $data['carts'] =  Cart::where('user_id',auth()->user()->id)->get();
    
    $_SESSION['setting'] = $data['system'];
    if($data['product']){
      return view('frontend.details', $data);
    }
    if(!$id){
      session()->flash('error','product not found!');
      return redirect()->back()->with('message','we have received your order. we will connect with you soon.');
    }

  }
  public function search(Request $request)
{

  $searchterm =$request->search;
  $query=product::query();
  $data['systemdata'] = Systemsetting::find(1);
  $_SESSION['setting'] = $data['systemdata'];
  
  if($searchterm){
    $query->where('name','LIKE','%'.$searchterm.'%')
            ->orWhere('description','LIKE','%'.$searchterm.'%')
            ->orWhere('price','LIKE','%'.$searchterm.'%');
            $data['products']=$query->get();
            return view('frontend.search',$data);
  }
  else{
    return redirect()->back();
  }
}

//Backend.order
public function order()
{
  $order= Order::all();
  $data['systemdata'] = Systemsetting::find(1);
  $_SESSION['setting'] = $data['systemdata'];
  

  return view('backend.dashboard.order', compact('order'));
}

public function delivered($id)
{
  $order=Order::find($id);
  $order->delivery_status="delivered";
  $order->payment_status="Paid";

  $order->save();
  return redirect()->back();
}
}
