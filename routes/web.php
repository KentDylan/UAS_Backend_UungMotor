<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\motorcycleController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMotorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', [homeController::class, 'index'])->name('home');

// Products Page
Route::get('/product', [productController::class, 'index'])->name('product');

// Motorcycles Page
Route::get('/product/{id}', [MotorController::class, 'index'])->name('motorcycle');

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register Page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Order
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/orders/{order}/finish', [OrderController::class, 'finish'])->name('orders.finish');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

//Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Authentication Handle
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('me', [AuthController::class, 'me'])->name('me');
});
