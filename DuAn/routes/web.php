<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
//------------------------------//
//-----------FrontEnd-----------//
//------------------------------//

Route::group(['namespace'=>'Frontend'], function(){
    
    //Route::get('/member-blog','BlogController@index');
    //Route::post('/blog/rate','BlogController@rate')->name("blog-rate");
    Route::post('/info','ProductController@rate')->name("product-rate");
    Route::get('/index','ProductController@trangchu')->name('index');
    Route::post('find','ProductController@search')->name('search-product');
    //Route::get('email','ProductController@email')->name('email');  
    Route::get('/cate/{id}','ProductController@findCate')->name('cate-find');
    Route::get('/brand/{id}','ProductController@findBrand')->name('brand-find');
    Route::get('search','SearchController@search');
    Route::post('search','SearchController@search_advance');
    Route::post('index','SearchController@search_range')->name('search-range');
    //Route::get('/single-blog/{id}','BlogController@single')->name('blog-single');
    //Route::post('/single-blog/{id}','BlogController@comment');
    Route::post('/logout-1','AccountController@logout');
    Route::get('/detail-product/{id}','ProductController@detail')->name('detail-product');
    Route::post('add-to-cart','ProductController@addCart')->name('add-to-cart');
    Route::get('cart','ProductController@cart')->name('cart');
    Route::post('ajax-handle-cart','ProductController@handleCart')->name('ajax-handle-cart');
    Route::get('checkout','ProductController@checkout')->name('checkout1');
    Route::post('checkout','MemberController@register');
    Route::get('checkout1','ProductController@order')->name('order');
    
});
Route::group(['namespace'=>'Frontend'],function(){
    Route::get('/register1','MemberController@index');
    Route::post('/register1','MemberController@register');
    Route::get('/member/login','MemberController@log')->name('login.member');
    Route::post('/member/login','MemberController@login');
});
Route::group(['prefix' => 'user','middleware' => 'user'],function(){
    Route::post('/account','Frontend\AccountController@update');  
    Route::get('/account','Frontend\AccountController@index')->name('user.account');
    // Route::get('my-product','Frontend\ProductController@index')->name('my-product');
    // Route::get('/add-product','Frontend\ProductController@add')->name('add.product');
    // Route::post('/add-product','Frontend\ProductController@store')->name('add.product.post');
    // Route::get('/edit-product/{id}','Frontend\ProductController@edit');
    // Route::post('/edit-product/{id}','Frontend\ProductController@update');
    // Route::get('/delete-product/{id}','Frontend\ProductController@delete');
});


//----------------------------------------------------------------
//----------------------------------------------------------------
//----------------------------------------------------------------
//------------------------------//
//-----------Admin--------------//
//------------------------------//





Route::group([
    'prefix' => 'admin', 'middleware' => 'admin'
], function(){
    Route::get('/dashboard','admin\UserController@index');
    Route::get('/profile','admin\UserController@profile')->name('admin-profile');
    Route::post('/profile','admin\UserController@update');
//startCountry
    Route::get('/country','admin\countryController@index')->name('admin-country');
    Route::get('/add','admin\countryController@add')->name('add-country');
    Route::post('/add','admin\countryController@store');
    Route::get('/country/{id}','admin\countryController@destroy');
//endCountry
//startCategory
    Route::get('/category','admin\categoryController@index')->name('admin-category');
    Route::get('/addCate','admin\categoryController@add')->name('add-cate');
    Route::post('/addCate','admin\categoryController@store')->name('add-category');
    Route::get('/category/{id}','admin\categoryController@destroy');
//endCategory
//startBrand
    Route::get('/brand','admin\brandController@index')->name('admin-brand');
    Route::get('/addBrand','admin\brandController@add')->name('get-brand');
    Route::post('/addBrand','admin\brandController@store')->name('post-brand');
    Route::get('/brand/{id}','admin\brandController@destroy');    
//endBrand
//startOrder
    Route::get('/order','admin\orderController@index')->name('admin-order');
    Route::get('/order/{id}','admin\orderController@detail')->name('order-detail');
    Route::get('/approve/{id}','admin\orderController@approved')->name('approve-order');
    Route::get('/delete-order/{id}','admin\orderController@delete')->name('order-delete');
    Route::get('/approved','admin\orderController@app')->name('approved');
//endOrder
//startQluser
    Route::get('/Qluser','admin\UserController@qluser')->name('qluser');
    Route::get('/delete-user/{id}', 'admin\UserController@deleteUser')->name('deleteUser');
//endQluser
    Route::get('/blog1','admin\BlogController@main')->name('all-blog');
    Route::get('/addBlog','admin\BlogController@huy')->name('admin-addBlog');
    Route::post('/addBlog','admin\BlogController@store');
    Route::get('/editBlog/{id}','admin\BlogController@edit');
    Route::post('/editBlog/{id}','admin\BlogController@update');
    Route::get('/deleteBlog/{id}','admin\BlogController@destroy');
    Route::get('my-product','admin\ProductController@index')->name('admin-product');
    Route::get('/add-product','admin\ProductController@add')->name('add.product');
    Route::post('/add-product','admin\ProductController@store')->name('add.product.post');
    Route::get('/edit-product/{id}','admin\ProductController@edit');
    Route::post('/edit-product/{id}','admin\ProductController@update');
    Route::get('/delete-product/{id}','admin\ProductController@delete');
    Route::post('findAdmin','admin\ProductController@search')->name('search_admin');
});
   
   
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();



