<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'IndexController@show');
Route::get('/index', 'IndexController@show');
Route::get('/shop', 'ShopController@show');
Route::get('/category-list-{idLoai}','CateListController@catlist');
Route::get('/category','CateListController@category');
Route::get('/brand-list-{idBrand}','BrandListController@brandlist');
Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/product-details-{idProducts}',['as'=>'viewDetail','uses'=>'ProductDetailsController@procDetails']);
Route::post('/product-details-{idProducts}',['as'=>'postComment','uses'=>'ProductDetailsController@postComment']);
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-single', function () {
    return view('blog-single');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/contact-us', function () {
    return view('contact');
});

Route::get('search','SearchController@index');
Route::get('search-advanced','SearchController@advanced');
Route::get('search-adv','SearchController@advresult');
Route::get('/index2', function () {
    $product = DB::table('products');
    var_dump($product);
});
//Product
//Route::group(['prefix'=>'admin'],function (){
//    Route::get('list',['as'=>'getList','uses'=>'AdminProductController@getList']);
//    Route::get('addproduct',['as'=>'getaddproduct','uses'=>'AdminProductController@getAdd']);
//    Route::post('addproduct',['as'=>'postaddproduct','uses'=>'AdminProductController@postAdd']);
//    Route::get('deleteproduct/{idproduct}',['as'=>'getDelete','uses'=>'AdminProductController@getDelete']);
//    Route::get('editproduct-{idproduct}',['as'=>'getEdit','uses'=>'AdminProductController@getEdit']);
//    Route::post('editproduct-{idproduct}',['as'=>'postEdit','uses'=>'AdminProductController@postEdit']);
//});
Route::get('list',['as'=>'getList','uses'=>'AdminProductController@getList']);
Route::get('addproduct',['as'=>'getaddproduct','uses'=>'AdminProductController@getAdd']);
Route::post('addproduct',['as'=>'postaddproduct','uses'=>'AdminProductController@postAdd']);
Route::get('deleteproduct/{idproduct}',['as'=>'getDelete','uses'=>'AdminProductController@getDelete']);
Route::get('editproduct-{idproduct}',['as'=>'getEdit','uses'=>'AdminProductController@getEdit']);
Route::post('editproduct-{idproduct}',['as'=>'postEdit','uses'=>'AdminProductController@postEdit']);


//User
Route::get('listuser',['as'=>'getListUser','uses'=>'AdminUserController@getList']);
Route::get('noti',['as'=>'getNoti','uses'=>'AdminUserController@getNoti']);
Route::get('deleteuser/{username}',['as'=>'getDeleteUser','uses'=>'AdminUserController@getDelete']);
Route::get('edituser-{username}',['as'=>'getEditUser','uses'=>'AdminUserController@getEdit']);
Route::post('edituser-{username}',['as'=>'postEditUser','uses'=>'AdminUserController@postEdit']);


Route::get('test','AdminProductController@admin');
Auth::routes();

Route::get('reset', function () {
    return view('auth.passwords.reset');
});
Route::get('edit-account-{id}',['as'=>'getEditAccount','uses'=>'AccountController@getEdit']);
Route::post('edit-account-{id}',['as'=>'postEditAccount','uses'=> 'AccountController@postEdit']);

Route::group(['prefix'=>'admin'],function (){
    Route::get('/', 'AdminProductController@admin');
    Route::get('index','AdminProductController@admin');
    Route::get('listproduct',['as'=>'getList','uses'=>'AdminProductController@getList']);
    Route::get('addproduct',['as'=>'getaddproduct','uses'=>'AdminProductController@getAdd']);
    Route::post('addproduct',['as'=>'postaddproduct','uses'=>'AdminProductController@postAdd']);
    Route::get('deleteproduct/{idproduct}',['as'=>'getDelete','uses'=>'AdminProductController@getDelete']);
    Route::get('editproduct-{idproduct}',['as'=>'getEdit','uses'=>'AdminProductController@getEdit']);
    Route::post('editproduct-{idproduct}',['as'=>'postEdit','uses'=>'AdminProductController@postEdit']);

    Route::get('listcat',['as'=>'getListCat','uses'=>'AdminProductController@getListCat']);
    Route::get('addcat',['as'=>'getaddcat','uses'=>'AdminProductController@getAddCat']);
    Route::post('addcat',['as'=>'postaddcatt','uses'=>'AdminProductController@postAddCat']);
    Route::get('deletecat/{idcat}',['as'=>'getDeleteCat','uses'=>'AdminProductController@getDeleteCat']);
    Route::get('editcat-{idcat}',['as'=>'getEditCat','uses'=>'AdminProductController@getEditCat']);
    Route::post('editcat-{idcat}',['as'=>'postEditCat','uses'=>'AdminProductController@postEditCat']);

    Route::get('listuser',['as'=>'getListUser','uses'=>'AdminUserController@getList']);
    Route::get('deleteuser/{username}',['as'=>'getDeleteUser','uses'=>'AdminUserController@getDelete']);
    Route::get('edituser-{username}',['as'=>'getEditUser','uses'=>'AdminUserController@getEdit']);
    Route::post('edituser-{username}',['as'=>'postEditUser','uses'=>'AdminUserController@postEdit']);
});