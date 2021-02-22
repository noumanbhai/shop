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

Route::get('/', function () {
    // return view('welcome');
    return view('frontend.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('admin.index');

})->name('dashboard');
Route::resource('/category','CategoryController');
Route::resource('/subcategory','SubcatController');
Route::resource('/brand','BrandController');
Route::resource('/coupon','CouponController');
Route::resource('/other','NewsleterController');
Route::resource('/product','ProductController');
Route::get('/subcat/{id?}','ProductController@cat');
Route::get('/subcatajax/{id?}','ProductController@getSubCatsAjax');
Route::get('/productstatus/{id?}','ProductController@status')->name('product.status');
Route::resource('/blog/post','PostController');
Route::resource('/blog/postcategory','PostCategoryController');


