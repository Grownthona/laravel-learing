<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\StoreController;


Route::get('/admin', function () {
    return view('admin');
});

Route::get('/warehouse', function () {
    return view('warehouse');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/addproduct', [AdminController::class, 'showaddproduct']);
Route::post('/addproduct', [AdminController::class, 'addproduct'])->name('products.add');

Route::get('/products', [WarehouseController::class, 'showproduct']);
Route::post('/products', [WarehouseController::class, 'updateproduct'])->name('update.product');

Route::get('/storerequest', [StoreController::class, 'showstoreproducts']);
Route::post('/request', [StoreController::class, 'requestproduct'])->name('request.product');

Route::get('/adminstorerequests', [AdminController::class, 'adminstorerequests']);
Route::post('/approvestorerequests', [AdminController::class, 'approvestorerequests'])->name('approve.store');

Route::get('/warehousestorerequests', [WarehouseController::class, 'storerequests']);
Route::post('/acceptwarehousereq', [WarehouseController::class, 'acceptwarehousereq'])->name('approve.warehouse');



Route::get('/adduser', [AdminController::class, 'addusershow']);
Route::post('/adduser', [AdminController::class, 'adduser'])->name('add.user');

Route::get('/staff', [AdminController::class, 'staffinfo']);

Route::get('/signin', [AdminController::class, 'signinview']);
Route::post('/', [AdminController::class, 'signin'])->name('signin.user');

/*
Route::get('/request', [AdminController::class, 'requestadd']);
Route::post('/request', [AdminController::class, 'requestproduct'])->name('request.product');

Route::get('/requestlist', [AdminController::class, 'requestlist']);
Route::post('/requestupdate', [AdminController::class, 'requestupdate'])->name('request.update');
*/