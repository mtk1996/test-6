<?php

use App\Models\Income;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'Language'], function () {
    Route::get('/', 'PageController@home');
    Route::get('/product', 'ProductController@all');
    Route::get('/product/{slug}', 'ProductController@detail');

    Route::get('/profile', 'ProfileController@dashboard');
    // auth
    Route::get('/register', 'AuthController@showRegister');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@showLogin');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
});

// api
Route::post('/api/add-to-cart', 'Api\CartController@addToCart');
Route::get('/api/cart', 'Api\CartController@getCart');
Route::post('/api/add-cart-qty', 'Api\CartController@addQty');
Route::post('/api/checkout-cart', 'Api\CartController@checkout');
//change password api
Route::post('/api/change-password', 'Api\ProfileController@changePassword');

//order api
Route::get('/api/order', 'Api\CartController@getOrder');
//review
Route::post('/api/make-review', 'Api\ReviewController@makeReview');


// language
Route::get('/lang/{lang}', 'PageController@switchLanguage');


// Admin Management
Route::group(['prefix' => "admin", 'namespace' => "Admin", 'as' => 'admin.'], function () {
    Route::get('/login', 'AuthController@showLogin');
    Route::post('/login', 'AuthController@login');

    Route::get('/logout', 'AuthController@logout');

    Route::get('/', 'DashboardController@index');

    // supplier
    Route::resource('/supplier', 'SupplierController');
    // income
    Route::resource('/income', 'IncomeController');
    // product
    Route::resource('/product', 'ProductController');
    //order
    Route::get('/order', 'OrderController@all');
    Route::get('/change-order-status', 'OrderController@changeStatus');
});

Route::get('/test', function () {
    return Product::all();
    $incomeStartDateArray = [date('Y-m-d')];
    $incomeDateName = [date('D')];
    for ($i = 1; $i <= 5; $i++) {
        $incomeStartDateArray[] = date('Y-m-d', strtotime("-$i day"));
        $incomeDateName[] = date('D', strtotime("-$i day"));
    }

    $incomeData = [];

    foreach ($incomeStartDateArray as $d) {
        $incomeData[] = Income::whereDate('create_date', $d)->sum('amount');
    }
    return $incomeDateName;
    return view('test');
});
