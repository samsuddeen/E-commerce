<?php

use App\Cart;
use App\Systemsetting;
use App\Category;
use App\product;
use App\Comment;
use App\Reply;
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
    $data['categories'] = Category::with('products')->get();
    $data['comments']= Comment::all();
    $data['reply'] = Reply::all();
    $_SESSION['setting'] = $data['system'];

    return view('frontend.index', $data);
})->name('userdashboard');



//Admin Login
Route::group(['prefix' => 'admin',], function () {
Route::view('adminlogin','backend.dashboard.login')->name('admin.login');
Route::post('submit','LoginController@login')->name('admin.login.submit');
Route::group(['prefix' =>'admin','middleware'=>'auth'], function () {
    Route::get('dashboard','LoginController@dashboard')->name('dashboard');
});

    // Route::get('system-setting','SystemController@index')->name('system.setting');
    Route::resource('system-setting','SystemController');

    //product
    Route::get('product-create','ProductController@index')->name('product.create');
    Route::get('product-details/{id}','ProductController@productDetails')->name('product.details')->middleware('auth');


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



Route::group(['prefix' => 'user',], function () {
    //Register User
    Route::post('/registerUser','usercontroller@signup')->name('user.register');
    Route::view('/registerUser','frontend.login.register')->name('registerUser');
    //Login User
    Route::post('/loggin','usercontroller@signin')->name('user.login');
    Route::view('/login','frontend.login.login')->name('login');
    //logout
   Route::get('/logout','usercontroller@logout')->name('userlogout');


   //cart 
   Route::get('/show_cart','CartController@show_cart')->name('show_cart');
    
   //mail
    Route::post('product-usermails/{id}','mailcontroller@usermails')->name('product.mail');

   //Search
    Route::get('/posts/search', 'ProductController@search')->name('posts.search');
    //remove product
    Route::get('/deleteproduct/{id}','ProductController@deleteproduct')->name('delete.product');

    // routes/web.php or routes/api.php
    Route::post('/add-to-cart', 'CartController@addToCart')->name('cart.add');

    //remove product
    Route::get('/remove-product/{id}', 'CartController@removeproduct')->name('remove.product');
    //cash_order
    Route::post('/cash_order', 'CartController@cash_order')->name('cash_order');


    //card_payment
    Route::get('/stripe/{total}','CartController@stripe')->name('stripe');
    Route::post('stripe-post/{total}', 'CartController@stripePost')->name('stripe.post');

    //order in dashboard
    Route::get('/order','ProductController@order')->name('order');
    Route::get('/delivered/{id}','ProductController@delivered')->name('delivered');

    //show_order
    Route::get('/show-order','CartController@show_order')->name('show_order');
    //cancel_order
    Route::get('/cancel-order/{id}','CartController@cancel_order')->name('cancel_order');
    //search order
    Route::get('/search-order','CartController@order_search')->name('order_search');

     //show_user
     Route::get('/show-user','usercontroller@show_user')->name('show_user');
     //delete_user
     Route::get('/delete_user/{id}','usercontroller@delete_user')->name('delete_user');
     //search user
    Route::get('/user-search','usercontroller@user_search')->name('user_search');

    //comment
    Route::get('comments', 'CommentController@index')->name('comments.index');
    // no need to check Auth::id() in controller
    Route::post('/comments/add', 'CommentController@add_comment')->name('comments.add')->middleware('auth');
    
    //reply
    Route::post('/reply/add','CommentController@add_reply')->name('reply.add');

   


});

