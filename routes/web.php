<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeletedOrderController;


Route::get('/', function () {
    return view('welcome');
});

// Role routes
Route::resource('roles', RoleController::class);

// User routes
Route::resource('users', UserController::class);

// Customer routes
Route::resource('customers', CustomerController::class);

// Order routes
Route::resource('orders', OrderController::class);

// Deleted Order routes (for restoring deleted orders)
Route::get('deleted-orders', [DeletedOrderController::class, 'index'])->name('deleted-orders.index');
Route::post('deleted-orders/{id}/restore', [DeletedOrderController::class, 'restore'])->name('deleted-orders.restore');
