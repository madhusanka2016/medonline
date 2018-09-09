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

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('index');
});
Route::post('/', [
    'uses' => 'shopcontroller@searchProduct',
    'as' => 'searchProduct'
]);

Auth::routes();
//common
Route::post('/orderinvoice', [
    'uses' => 'HomeController@orderinvoice',
    'as' => 'orderinvoice'
]);

//Users
Route::get('/profile', 'HomeController@index')->name('profile');
Route::get('/profile/{id}', 'HomeController@indexid')->name('profileid');
Route::get('/shoppingcart/{id}', 'HomeController@shoppingcart')->name('shoppingcart');
Route::get('/myorders/{id}', 'HomeController@userorder')->name('myorders');
Route::get('/vieworders/{id}', 'HomeController@vieworderuser')->name('vieworderuser');
Route::get('/mypayments/{id}', 'HomeController@mypayments')->name('mypayments');
Route::get('/myprescriptions/{id}', 'HomeController@myprescriptions')->name('myprescriptions');
Route::post('/addtocart',
    //User register form quarry
    [
        'uses' => 'HomeController@addtocart',
        'as' => 'addtocart',

    ]);
Route::post('/deletecart',
    //User register form quarry
    [
        'uses' => 'HomeController@deletecart',
        'as' => 'deletecart',

    ]);
Route::post('/purchase',
    //User register form quarry
    [
        'uses' => 'HomeController@purchase',
        'as' => 'purchase',

    ]);
Route::post('/addpresc',
    //User register form quarry
    [
        'uses' => 'HomeController@addpresc',
        'as' => 'addpresc',

    ]);
Route::post('/addpayment',
    //User register form quarry
    [
        'uses' => 'HomeController@addpayment',
        'as' => 'addpayment',

    ]);
//users over


// admin
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/add', 'HomeController@additems')->name('add');
Route::get('/items', 'HomeController@items')->name('items');

Route::get('/recent', 'HomeController@recent')->name('recent');
Route::get('/backup', 'HomeController@backup')->name('backup');
Route::post('/additem',
    //User register form quarry
    [
        'uses' => 'HomeController@additemdb',
        'as' => 'additemdb',

    ]);
Route::post('/addqty',
    //User register form quarry
    [
        'uses' => 'HomeController@addqty',
        'as' => 'addqty',

    ]);
Route::post('/changeitem',
    //User register form quarry
    [
        'uses' => 'HomeController@changeitem',
        'as' => 'changeitem',

    ]);
Route::post('/deleteitem',
    //User register form quarry
    [
        'uses' => 'HomeController@deleteitem',
        'as' => 'deleteitem',

    ]);
// admin over

//cashier
Route::get('/viewpres/{id}', 'HomeController@viewpres')->name('viewpres');
Route::get('/cashier', 'HomeController@cashier')->name('cashier');
Route::get('/uporders', 'HomeController@uporders')->name('uporders');
Route::get('/uppres', 'HomeController@uppres')->name('uppres');
Route::get('/cusorder', 'HomeController@cusorder')->name('cusorder');
//cashier over
Route::get('/product', [
    'uses' => 'shopcontroller@product',
    'as' => 'product'
]);
Route::get('/{type}', [
    'uses' => 'shopcontroller@getProduct',
]);
Route::post('/addtopresc',
    //User register form quarry
    [
        'uses' => 'HomeController@addtopresc',
        'as' => 'addtopresc',

    ]);
Route::post('/processprec',
    //User register form quarry
    [
        'uses' => 'HomeController@processprec',
        'as' => 'processprec',

    ]);
Route::post('/processorder',
    //User register form quarry
    [
        'uses' => 'HomeController@processorder',
        'as' => 'processorder',

    ]);