<?php

use App\Http\Controllers\dashboard\AttributesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MainCategoriesController;
use App\Http\Controllers\Dashboard\BrandsController;
use App\Http\Controllers\dashboard\OptionsController;
use App\Http\Controllers\Dashboard\TagsController;
use App\Http\Controllers\Dashboard\ProductsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
|admin Routes
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

Route::group(['namespace'=>'Dashboard','middleware'=>'auth:admin', 'prefix' => 'admin'],function(){
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::group(['prefix'=>'profile'], function()
    {
        Route::get('edit',[ProfileController::class,'editProfile'])->name('edit.profile');
        Route::put('update',[ProfileController::class,'updateprofile'])->name('update.profile');
    });


    Route::group(['prefix' => 'settings'], function () {
        Route::get('shipping-methods/{type}',[SettingsController::class,'editShippingMethods'])->name('edit.shippings.methods');
        Route::put('shipping-methods/{id}', [SettingsController::class,'updateShippingMethods'])->name('update.shippings.methods');
    });
     ############################ Categories ##########################################
     Route::group(['prefix' => 'main_categories'], function () {
        Route::get('/', [MainCategoriesController::class,'index'])->name('admin.maincategories');
        Route::get('create', [MainCategoriesController::class,'create'])->name('admin.maincategories.create');
        Route::get('subCategories', [MainCategoriesController::class,'subCategories'])->name('admin.subcategories');
        Route::post('store',[MainCategoriesController::class,'store'])->name('admin.maincategories.store');
        Route::get('edit/{id}', [MainCategoriesController::class,'edit'])->name('admin.maincategories.edit');
        Route::post('update/{id}', [MainCategoriesController::class,'update'])->name('admin.maincategories.update');
        Route::get('delete/{id}', [MainCategoriesController::class,'destroy'])->name('admin.maincategories.delete');
    });
    ################################## End Categories #####################################
    

     ################################## brands routes ######################################

    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [BrandsController::class,'index'])->name('admin.brands');
        Route::get('create', [BrandsController::class,'create'])->name('admin.brands.create');
        Route::post('store',[BrandsController::class,'store'])->name('admin.brands.store');
        Route::get('edit/{id}', [BrandsController::class,'edit'])->name('admin.brands.edit');
        Route::post('update/{id}', [BrandsController::class,'update'])->name('admin.brands.update');
        Route::get('delete/{id}', [BrandsController::class,'destroy'])->name('admin.brands.delete');
    }); 
     ################################## end brands    #######################################
   
     ################################## Tags routes ######################################
     Route::group(['prefix' => 'tags' ], function () {
        Route::get('/', [  TagsController::class,'index'])->name('admin.tags');
        Route::get('create', [  TagsController::class,'create'])->name('admin.tags.create');
        Route::post('store',[  TagsController::class,'store'])->name('admin.tags.store');
        Route::get('edit/{id}', [  TagsController::class,'edit'])->name('admin.tags.edit');
        Route::post('update/{id}', [  TagsController::class,'update'])->name('admin.tags.update');
        Route::get('delete/{id}', [  TagsController::class,'destroy'])->name('admin.tags.delete');
    });
    ################################## end brands    #######################################

     ################################## products routes ######################################
     Route::group(['prefix' => 'products'], function () {
        Route::get('/', [  ProductsController::class,'index'])->name('admin.products');
        Route::get('create', [  ProductsController::class,'create'])->name('admin.products.general.create');
        Route::post('store',[  ProductsController::class,'store'])->name('admin.products.general.store');
        Route::get('index',[ProductsController::class,'index'])->name('admin.products.general.index');

        Route::get('price/{id}', [  ProductsController::class,'getPrice'])->name('admin.products.price');
        Route::post('price',[  ProductsController::class,'saveProductPrice'])->name('admin.products.price.store');

        Route::get('stock/{id}', [ProductsController::class,'getStock'])->name('admin.products.stock');
        Route::post('stock', [ProductsController::class,'saveProductStock'])->name('admin.products.stock.store');

        Route::get('images/{id}',[ProductsController::class,'addImages'])->name('admin.products.images');
        Route::post('images',[ProductsController::class,'saveProductImages'])->name('admin.products.images.store');
        Route::post('images/db',[ProductsController::class,'saveProductImagesDB'])->name('admin.products.images.store.db');


    });
    ################################## end brands    #######################################
     ################################## attrributes routes ######################################
     Route::group(['prefix' => 'attributes'], function () {
        Route::get('/',  [AttributesController::class,'index'])->name('admin.attributes');
        Route::get('create', [AttributesController::class,'create'])->name('admin.attributes.create');
        Route::post('store', [AttributesController::class,'store'])->name('admin.attributes.store');
        // Route::get('delete/{id}', 'AttributesController@destroy')->name('admin.attributes.delete');
        Route::get('edit/{id}', [AttributesController::class,'edit'])->name('admin.attributes.edit');
        Route::post('update/{id}', [AttributesController::class,'update'])->name('admin.attributes.update');
    });
    ################################## end attributes    #######################################
    ################################## options ######################################
    Route::group(['prefix' => 'options'], function () {
        Route::get('/', [OptionsController::class,'index'])->name('admin.options');
        Route::get('create', [OptionsController::class,'create'])->name('admin.options.create');
        Route::post('store', [OptionsController::class,'store'])->name('admin.options.store');
        //Route::get('delete/{id}','OptionsController@destroy') -> name('admin.options.delete');
        Route::get('edit/{id}', [OptionsController::class,'edit'])->name('admin.options.edit');
        Route::post('update/{id}',[ OptionsController::class,'update'])->name('admin.options.update');
    });
    ################################## end options    #######################################
 

    });
    



Route::group(['namespace'=>'Dashboard','middleware'=>'guest', 'prefix' => 'admin'],function(){
     Route::get('/login',[LoginController::class,'login'])->name('admin.login');
     Route::post('/login',[LoginController::class,'check'])->name('admin.check');
  

});
});
