<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;

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

// Route::get('/products',[productController::class,'index']);

Route::get('/', function () {
    return view('register');
});

Route::get('/details/{id}', [productController::class,'getById'])->name('product.details');

Route::post('/register', [userController::class,'register'])->name('register');

Route::get('/login', [userController::class,'index'])->name('login.show');
Route::post('/login', [userController::class,'login'])->name('login');

Route::get('/products', [productController::class,'index'])->name('products');
