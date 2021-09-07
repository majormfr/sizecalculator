<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Models\Products;

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


Auth::routes();


    Route::middleware(['auth.shopify'])->group(function () {


Route::get('/',[App\Http\Controllers\AttributeController::class,'index'])->name('attributes.home');
Route::get('/home',[App\Http\Controllers\AttributeController::class,'index'])->name('home');
Route::get('/delete/{id}/',[App\Http\Controllers\AttributeController::class,'destroy'])->name('attributes.delete');
Route::get('/edit/{id}',[App\Http\Controllers\AttributeController::class,'edit'])->name('attributes.edit');
Route::post('/update',[App\Http\Controllers\AttributeController::class,'update'])->name('attributes.update');
Route::get('/add/type',[App\Http\Controllers\AttributeController::class,'create'])->name('attributes.create');
Route::get('/get/all-products',[App\Http\Controllers\AttributeController::class,'getAllProducts'])->name('attributes.products');
Route::get('/get/all-tags',[App\Http\Controllers\TagsController::class,'getAllTags'])->name('attributes.tags');
Route::get('/product/edit/',[App\Http\Controllers\AttributeController::class,'editProduct'])->name('products.edit');
Route::get('/tags/edit/',[App\Http\Controllers\TagsController::class,'editProductOnTags'])->name('tags.edit');
//attribute type routes
Route::get('get/attributetypes-all/view/{id}',[App\Http\Controllers\AttributeController::class,'attributeType'])->name('attributetypes.home');
Route::get('attributes/create',[App\Http\Controllers\AttributeController::class,'attributeTypeCreate'])->name('attributestypes.create');
Route::post('attributes/type/add',[App\Http\Controllers\AttributeController::class,'storeAttributeType'])->name('attributesTypes.add');
Route::get('attributes/type/edit',[App\Http\Controllers\AttributeController::class,'storeAttributeEdit'])->name('attributesTypes.edit');
Route::post('attributes/type/update',[App\Http\Controllers\AttributeController::class,'storeAttributeUpdate'])->name('attributesTypes.update');
Route::get('attributes/type/delete',[App\Http\Controllers\AttributeController::class,'disableAttributeType'])->name('attributesTypes.delete');
//Route::get('/add/type?hmac='.Config::get('constants.SHOPIFY_URL.hmac', 'default').'&host='.Config::get('constants.SHOPIFY_URL.hmac', 'default').'&new_design_language='.Config::get('constants.SHOPIFY_URL.new_design_language', 'default').'&session='.Config::get('constants.SHOPIFY_URL.session','default').'&shop='.Config::get('constants.SHOPIFY_URL.shop','default').'&timestamp='.Config::get('constants.SHOPIFY_URL.timestamp','default'),[App\Http\Controllers\AttributeController::class,'create'])->name('attributes.create');

Route::post('/add',[App\Http\Controllers\AttributeController::class,'store'])->name('attributes.add');
//size routes
Route::group(['prefix'=>'sizes'], function () {
Route::get('/',[App\Http\Controllers\SizeController::class,'index'])->name('sizes.home');
Route::get('/delete/{id}',[App\Http\Controllers\SizeController::class,'destroy'])->name('sizes.delete');
Route::get('/edit/{id}',[App\Http\Controllers\SizeController::class,'edit'])->name('sizes.edit');
Route::get('product/edit/{id}',[App\Http\Controllers\SizeController::class,'selectProduct'])->name('sizes.selectproduct');
Route::post('/update',[App\Http\Controllers\SizeController::class,'update'])->name('sizes.update');
Route::get('/add/type',[App\Http\Controllers\SizeController::class,'create'])->name('sizes.create');
Route::post('/add',[App\Http\Controllers\SizeController::class,'store'])->name('sizes.add');
});
Route::get('/get/products',[App\Http\Controllers\ProductsController::class,'getProducts'])->name('products.collection');
//Route::get('get/product-details/{id}',[App\Http\Controllers\AttributeController::class,'getSpecificProducts'])->name('products.specific');
Route::get('get/product-details/{id}',[App\Http\Controllers\TagsController::class,'getSpecificProducts'])->name('products.specific');

Route::get('/selected/products',[App\Http\Controllers\SizeController::class,'selectedProducts'])->name('products.selectedbox');
Route::get('/all/products',[App\Http\Controllers\SizeController::class,'getAllProducts'])->name('products.getAllProducts');
Route::get('/search/product/{search}',[App\Http\Controllers\SizeController::class,'searchProduct'])->name('products.search');
Route::post('/remove/product',[App\Http\Controllers\SizeController::class,'removeProductFromBox'])->name('products.remove');
Route::get('/calculator',[App\Http\Controllers\Calculator::class,'index'])->name('calculator.start');
Route::get('/script_tags',[App\Http\Controllers\ProductsController::class,'index']);
Route::get('/script_tags_add',[App\Http\Controllers\AttributeController::class,'addScriptTag']);
Route::get('/script_tags_get',[App\Http\Controllers\ProductsController::class,'create']);
Route::get('script_tags/delete',[App\Http\Controllers\ProductsController::class,'deleteTag']);
Route::post('/calculate/new-size',[App\Http\Controllers\ProductsController::class,'createSizeCalculation'])->name('sizes.new_calculate');
Route::get('/metatag/create',[App\Http\Controllers\ProductsController::class,'metacreate'])->name('sizes.meta.create');
Route::get('/metatags',[App\Http\Controllers\ProductsController::class,'metatags'])->name('sizes.meta');
Route::get('/delete/meta/tag',[App\Http\Controllers\ProductsController::class,'deletemeta']);
Route::get('/update/script_tag',[App\Http\Controllers\ProductsController::class,'updateScriptTag']);
Route::get('/update/asset',[App\Http\Controllers\ProductsController::class,'updateAsset']);
Route::get('/addWidget',[App\Http\Controllers\ProductsController::class,'addWidget']);
Route::get('/getpage',[App\Http\Controllers\ProductsController::class,'getProductPage']);
Route::get('/get/theme',[App\Http\Controllers\ProductsController::class,'getThemeData']);
Route::get('/get/products/{id}',[App\Http\Controllers\ProductsController::class,'getProductDetails']);
Route::post('add/product-from-selection',[App\Http\Controllers\AttributeCOntroller::class,'addProductFromSelection']);


                                            //check shop config
Route::get('/shop_config',[App\Http\Controllers\AttributeController::class,'shopConfiguration']);
                                                //Size Chart

Route::group(['prefix'=>'sizechart'],function(){
    Route::get('/home/{id}',[App\Http\Controllers\SizeController::class,'sizeChartIndex'])->name('sizechart.home');
    Route::get('/bodysizes/{id}',[App\Http\Controllers\SizeController::class,'sizeOfSpecificRange'])->name('sizechart.range');
    Route::get('/sizechart/delete',[App\Http\Controllers\SizeController::class,'sizeChartDelete'])->name('sizechart.delete');
    Route::get('/sizechart/edit',[App\Http\Controllers\SizeController::class,'sizeChartEdit'])->name('sizechart.edit');
    Route::get('/add/',[App\Http\Controllers\SizeController::class,'createSizeChart'])->name('sizechart.create');
    Route::post('sizechart/post',[App\Http\Controllers\SizeController::class,'sizeChartPost'])->name('sizechart.add');
    Route::post('sizechart/update/post',[App\Http\Controllers\SizeController::class,'sizeChartUpdatePost'])->name('sizechart.update');
});
});


ROute::get('/loginshop',[App\Http\Controllers\AttributeController::class,'loginshop'])->name('loginshop');
Route::get('/greeting', function () {

    $pro = new Products();
    $pro->product_id = $_GET['product_id'];
    $pro->name = $_GET['name'];
    $pro->image_link = $_GET['image_link'];
    $pro->status = $_GET['status'];
    $pro->is_deleted = 0;
    $pro->website_name = "58318782618";
    $pr = $pro->save();
    return $pro;
    // return $pro::create([
    //     'product_id' => $_GET['product_id'],
    //     'name' => $_GET['name'],
    //     'image_link' =>$_GET['image_link'],
    //     'status' => $_GET['status'],
    //     'is_deleted' => "0",
    //     'website_name' => "58318782618",
    // ]);
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\AttributeController::class, 'index'])->name('home');


