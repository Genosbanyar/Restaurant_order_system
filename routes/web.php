<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;

Route::get('/',[OrderController::class, 'main'])->name('order.form');
Route::post('/order_submit',[OrderController::class, 'submit'])->name('order.submit');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::resource('/dish', DishesController::class);
Route::get('/order',[OrderController::class, 'index']);
Route::get('/order/{order}/approve', [OrderController::class, 'approve']);
Route::get('/order/{order}/cancel', [OrderController::class, 'cancel']);
Route::get('/order/{order}/ready', [OrderController::class, 'ready']);
Route::get('/order/{order}/serve', [OrderController::class, 'serve']);
