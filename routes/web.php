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
    return view('login');
});

Route::middleware(['auth.check'])->group(function () 
{

    Route::match(['get', 'post'], '/products', [ProductController::class, 'index'])->name('products');

    Route::get('/add_product', [productController::class,'add_product_show'])->name('add_product_show');
    Route::post('/add_product', [productController::class,'add_product'])->name('add_product');

    Route::get('/details/{id}', [productController::class,'getById'])->name('product.details');

    Route::get('/myProduct', [productController::class,'getMyProducts'])->name('getMyProducts');
    Route::delete('/myProduct/{product}', [ProductController::class, 'deleteMyProducts'])->name('delete.product');
    Route::put('/myProduct/{product}', [ProductController::class, 'editMyProducts'])->name('edit.product');
    

});

Route::post('/register', [userController::class,'register'])->name('register');

Route::get('/register', [userController::class,'index2'])->name('register.show');

Route::get('/login', [userController::class,'index'])->name('login.show');
Route::post('/login', [userController::class,'login'])->name('login');

Route::post('/logout', [userController::class,'logout'])->name('logout');
