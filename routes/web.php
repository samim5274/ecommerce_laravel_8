<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\OrderController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome-view');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user-login', [ManagerController::class, 'loginView']);
Route::get('/user-create-view', [ManagerController::class, 'userCreateView']);
Route::get('/user-create', [ManagerController::class, 'userCreate']);
Route::get('/user-login-backend', [ManagerController::class, 'loginUser']);

Route::group(['middleware'=>'admin'], function(){
    Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('dashboard-view');
    Route::get('/logout', [ManagerController::class, 'logout']);

    Route::get('/add-product-view', [ProductController::class, 'addProductView'])->name('add-product-view');
    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::get('/edit-product-view/{id}', [ProductController::class, 'editView'])->name('edit-product-view');
    Route::get('/delete-item/{id}', [ProductController::class, 'delete']);
    Route::post('/edit-product/{id}', [ProductController::class, 'editProduct']);
    Route::get('/specific-product-view/{id}', [ProductController::class, 'specificProduct']);

    Route::get('/show-all-product',  [ProductController::class, 'showAll'])->name('show-all');
    Route::get('/add-to-card/{id}', [ProductController::class, 'addCard']);
    Route::get('/remove/cart/{id}', [ProductController::class, 'removeCart']);

    // order section
    Route::post('/order/place', [OrderController::class, 'placeOrder']);
    Route::get('/get-order-view', [OrderController::class, 'orderView']);
    Route::get('/order-status-view/{id}', [OrderController::class, 'statusView']);
    Route::post('/update-order-status/{id}', [OrderController::class, 'statusUpdate']);
    Route::get('/view-order-item/{id}', [OrderController::class, 'orderListView']);
    // download order list
    Route::get('/download-order-list/{id}', [OrderController::class, 'downloadOrderList']);
});
