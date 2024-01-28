<?php

namespace App\Http\Controllers;
use App\Category;
use App\Systemsetting;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::paginate(5);
        $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
        return view('backend.category.display', $data);
    }

    // Insert Data
    public function categorydata(Request $request){
        $data = [
            'category_name' =>$request->catename,
            'status' => $request->status,
       ];
       
       category::insert($data);

        return redirect()->route('admin.display');
    }

     //Display Data
     public function displayData(){
        $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
        $data= category::all();
         return view('backend.category.display',compact('data'));
     }

    //Edit Data
    public function edit($id)
    {
     if(!$id){
         return redirect()->back();
     }
     $cat_data= category::find($id);
     $data['system'] = Systemsetting::find(1);
     $_SESSION['setting'] = $data['system'];
     
    if($cat_data){
     return view('backend.category.edit',compact('cat_data'));
    }
    return redirect()->back();
    }


     //Update Data
     public function update(Request $request,$id)
     {
      if(!$id){
          return redirect()->back();
      }
      $cat_data= category::find($id);
      $data['system'] = Systemsetting::find(1);
      $_SESSION['setting'] = $data['system'];
     if($cat_data){
      $data=[
          'category_name' =>$request->catename,
          'status' => $request->status,
      ];
     $cat_data->update($data);
    return redirect()->route('admin.display');
      
     }
     return redirect()->back();
  }


  //Delete Record
  public function delete($id){
    if(!$id){
        return redirect()->back();
    }

   $cat_data= category::find($id);
   if($cat_data){
    $cat_data->delete();
   }
   return redirect()->back();
   }

public function dispsetting()
{
    $data['system'] = Systemsetting::find(1);
    $_SESSION['setting'] = $data['system'];
    return view('backend.category.create',compact('data'));
}


}