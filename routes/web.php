<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/add_category', [ProductTypeController::class, 'index']);
Route::get('/insert_product', [ProductController::class, 'index2']);
Route::get('/products', [ProductController::class, 'index3']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/update_product/{id}', [ProductController::class, 'index4']);
Route::post('/insert_product', [ProductController::class, 'store'])->name('admin.insertproduct');
Route::patch('/update_product/{id}', [ProductController::class, 'update'])->name('admin.updateproduct');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.removeproduct');
Route::post('/add_category', [ProductTypeController::class, 'store'])->name('admin.addcategory');

Route::get('/', [ProductController::class, 'index']);
Route::get('/about', function () {
    return view('about');
});

Route::get('/profile', [UserController::class, 'show']);
