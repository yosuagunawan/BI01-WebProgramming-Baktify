<?php

use Illuminate\Support\Facades\Route;
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
Route::post('/insert_product', [ProductController::class, 'store'])->name('admin.insertproduct');
Route::post('/add_category', [ProductTypeController::class, 'store'])->name('admin.addcategory');

Route::get('/', [ProductController::class, 'index']);


