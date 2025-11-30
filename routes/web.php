<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/messages', function () {
    return view('messages');
})->name('messages');

Route::get('/order', [OrderController::class, 'index'])->name('order');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); 
Route::get('/orders-data', [OrderController::class, 'indexJson'])->name('orders.data');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');