<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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
//     return view('welcome');
// });

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/export', [AdminController::class, 'export']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/search', [AdminController::class, 'index']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::post('/delete', [AdminController::class, 'destroy']);