<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('layouts.riode');
});*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::name('store.')->group(function (){
        Route::get('/', "StoreController@index")->name('index');
        Route::match(['get','post'],'/category/{url}','StoreController@category')->name('category');
        Route::get('/product/{url}','StoreController@product')->name('product');
        Route::post('/add-to-cart/', 'StoreController@add_to_cart')->name('add.to.cart');
        Route::get('/cart', 'StoreController@cart')->name('cart');
        Route::post('/plus-qty/','StoreController@plus_qty')->name('plus.qty');
        Route::post('/minus-qty/','StoreController@minus_qty')->name('minus.qty');
        Route::post('/remove-cart/','StoreController@remove_cart')->name('remove.cart');
        Route::post('/remove-cart-page/','StoreController@remove_cart_page')->name('remove.cart.page');
        Route::post('/wishlist/', "StoreController@wishlist")->name('wishlist');
        Route::post('/filter/', "StoreController@filter")->name('filter');

        /*============= Register and Login =============*/

        Route::match(['get','post'],'/register', 'UserController@create')->name('register');
        Route::match(['get','post'],'/login', 'UserController@login')->name('login');

        //Route::match(['get', 'post'], '/login', 'UserController@login')->name('login');
        Route::get('/logout', 'UserController@logout')->name('logout');
    });
});


//Route::post('/register','UserController@register_user')->name('register');
//Route::match(['get','post'],'login', 'UserController@login')->name('login');
/*========= Admin Panel =========*/



Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin'],function (){



    Route::get('/', 'AdminController@index')->name('index');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductController');

    /*========= Test upload route =========*/
    Route::match(['post','get'],'/uploads', 'UploadController@upload')->name('uploads');
    Route::match(['post','get'], '/add', 'UploadController@add')->name('add');
    Route::match(['get','post'],'/uploadimage', 'UploadController@uploadimage')->name('uploadimage');
    Route::post('/upd', 'UploadController@upd')->name('upd');
    Route::match(['post','get'],'/delmultiimage', 'UploadController@delmultiimage')->name('delmultiimage');
    /*========= end Test upload route =========*/


});






