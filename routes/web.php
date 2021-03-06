<?php

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

Route::get('/','EcomController@index');

Route::get('/category-view/{id}','EcomController@category');

Route::get('/contact','EcomController@contact');

Route::get('/productDetails/{id}','EcomController@productDetails');

Route::get('/dashboard', 'HomeController@index');

Route::post('/addCart','CartController@addcart');
Route::get('/showCart','CartController@showCart');
Route::get('/cart/delete/{id}','CartController@delete');
Route::post('/cart/updateQty','CartController@updateQty');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/checkout/sign-up','CheckoutController@customerRegistration');
Route::get('/checkout/shipping','CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping','CheckoutController@saveShippingData');
Route::get('/checkout/payment','CheckoutController@showPaymentForm');
Route::post('/checkout/save-payment','CheckoutController@savePaymentInfo');
Route::get('/checkout/my-home','CheckoutController@customerHome');



 //*Middlewear*//
Route::group(['middleware'=>'auth'],function(){ 


//*User info*//

Route::get('/user/manage','UserController@manageUser');

//*User info*//

//*Category info*//

Route::get('/category/add', 'CategoryController@createCategory'); 
Route::post('/category/save', 'CategoryController@storeCategory');
Route::get('/category/manage', 'CategoryController@manageCategory');
Route::get('/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/category/update', 'CategoryController@updateCategory');
Route::get('/category/delete/{id}', 'CategoryController@destroyCategory');

//*Category info*//

//*Manufacturer info*//

Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer'); 
Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');
Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');
Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer');
Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');
Route::get('/manufacturer/delete/{id}', 'ManufacturerController@destroyManufacturer');

//*Manufacturer info*//

//*Product info*//

Route::get('/product/add', 'ProductController@createProduct'); 
Route::post('/product/save', 'ProductController@storeProduct');
Route::get('/product/manage', 'ProductController@manageProduct');
Route::get('/product/edit/{id}', 'ProductController@editProduct');
Route::get('/product/view/{id}', 'ProductController@viewProduct');
Route::post('/product/update', 'ProductController@updateProduct');
Route::get('/product/delete/{id}', 'ProductController@destroyProduct');

//*Product info*//

});


Auth::routes();

