<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index']);

//User Auth
Route::get('/register', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/users/auth', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);
//End of User Auth

//CRUD operations
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth');