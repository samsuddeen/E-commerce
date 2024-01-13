<?php
use App\Systemsetting;
use App\Category;
use App\product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data['system'] = Systemsetting::find(1);
    $data['categories'] = category::with('products')->get();
    // dd($data);
    $_SESSION['setting'] = $data['system'];
    return view('frontend.index', $data);
})->name('userdashboard')->middleware('auth');


//User Login
//Route::view('/loginUser','frontend.login.login')->name('loginUser');
//Route::view('/registerUser','frontend.login.register')->name('registerUser');




//Admin Login
Route::view('login','backend.dashboard.login')->name('login');
Route::post('submit','LoginController@login')->name('admin.login.submit');
Route::group(['prefix' =>'admin','middleware'=>'auth'], function () {
    Route::get('dashboard','LoginController@dashboard')->name('dashboard');
   

    // Route::get('system-setting','SystemController@index')->name('system.setting');
    Route::resource('system-setting','SystemController');

    //product
    Route::get('product-create','ProductController@index')->name('product.create');
    Route::get('product-details/{id}','ProductController@productDetails')->name('product.details');


     //Category Create
   Route::post('/category-data','categorycontroller@categorydata')->name('category.data');
   Route::view('/category','backend.category.create')->name('category');
   //Category Display
   Route::get('/admin.display','categorycontroller@displayData')->name('admin.display');
   //Category Edit
   Route::get('/edit/{id}','categorycontroller@edit')->name('admin_edit');
   //Category Update
   Route::post('/update/{id}','categorycontroller@update')->name('admin.update');
   //Delete Category
   Route::get('/delete/{id}','categorycontroller@delete')->name('admin.delete');



   //product Create
   Route::get('/formcreate','ProductController@displayData')->name('formcreate');
   Route::post('product-data','ProductController@productcreate')->name('product.data');
   //Display Data
   Route::get('/display.product','ProductController@displayproduct')->name('display.product');
    //product Edit
    Route::get('/editproduct/{id}','ProductController@editproduct')->name('product.edit');
    //product Update
    Route::post('/updateproduct/{id}','ProductController@updateproduct')->name('product.update');
    //Display Category
   Route::get('/display.cate','ProductController@displayData')->name('display.cate');
    //Delete product
    Route::get('/deleteproduct/{id}','ProductController@deleteproduct')->name('delete.product');

});



Route::group(['prefix' =>'user'], function (){
    //Register User
    Route::post('/registerUser','usercontroller@signup')->name('user.register');
    Route::view('/registerUser','frontend.login.register')->name('registerUser');
    //Login User
    Route::post('/loggin','usercontroller@signin')->name('user.login');
    Route::view('/login','frontend.login.login')->name('login');  
    //logout
   Route::get('/loggin','usercontroller@logout')->name('userlogout');


   //cart 
   Route::post('/add_cart/{id}','ProductController@add_cart')->name('add_cart');
   Route::get('/show_cart','CartController@show_cart')->name('show_cart');
    
   //mail
    Route::post('product-usermails/{id}','mailcontroller@usermails')->name('product.mail');
});
