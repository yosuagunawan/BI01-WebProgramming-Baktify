<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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

Route::get('/add_category', [ProductTypeController::class, 'index'])->middleware('admin');
Route::get('/insert_product', [ProductController::class, 'index2'])->middleware('admin');
Route::get('/products', [ProductController::class, 'index3']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/update_product/{id}', [ProductController::class, 'index4']);
Route::post('/insert_product', [ProductController::class, 'store'])->name('admin.insertproduct');
Route::patch('/update_product/{id}', [ProductController::class, 'update'])->name('admin.updateproduct');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.removeproduct');
Route::post('/add_category', [ProductTypeController::class, 'store'])->name('admin.addcategory');

Route::get('/checkoutcart', [CartController::class, 'viewcheckout']);
Route::post('/checkoutcart/{passcode}', [CartController::class, 'checkout'])->name('member.checkout')->middleware('not_admin');
Route::get('/carts', [CartController::class, 'index'])->middleware('not_admin');
Route::get('/addtocart/{id}', [CartController::class, 'store'])->name('member.addtocart')->middleware('not_admin');
Route::patch('/updatecart/{id}', [CartController::class, 'update'])->name('member.updatecart')->middleware('not_admin');
// Route::get('/checkout', [CartController::class, 'checkout'])->middleware('not_admin');
Route::get('/transaction', [CartController::class, 'transaction'])->middleware('not_admin');

Route::get('/', [ProductController::class, 'index']);
Route::get('/home', [ProductController::class, 'index']);
Route::get('/about', function () {
    return view('about');
});

Route::get('/profile', [UserController::class, 'show']);
Route::get('/profile_update', [UserController::class, 'edit']);
Route::post('/profile_update', [UserController::class, 'update']);
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/login', [UserController::class, 'get_login_page'])->name('login')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
