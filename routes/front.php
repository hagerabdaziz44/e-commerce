<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
|site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
Route::group(['namespace' => 'Site'/*, 'middleware' => 'guest'*/], function () {
    //guest  user
    route::get('/', [HomeController::class,'home'])->name('home')->middleware('VerifiedUser');
    // route::get('category/{slug}', 'CategoryController@productsBySlug')->name('category');
    // route::get('product/{slug}', 'ProductController@productsBySlug')->name('product.details');

    /**
     *  Cart routes
     */
    // Route::group(['prefix' => 'cart'], function () {
    //     Route::get('/', 'CartController@getIndex')->name('site.cart.index');
    //     Route::post('/cart/add/{slug?}', 'CartController@postAdd')->name('site.cart.add');
    //     Route::post('/update/{slug}', 'CartController@postUpdate')->name('site.cart.update');
    //     Route::post('/update-all', 'CartController@postUpdateAll')->name('site.cart.update-all');
    // });
});
// Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
//     // must be authenticated user


// });
});