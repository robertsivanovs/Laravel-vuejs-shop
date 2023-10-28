<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrdersController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/contacts', [IndexController::class, 'contacts']);
// Allow GET to avoid throwing exceptions when user reloads the order results page
Route::match(['GET','POST'],'/orders/order', [OrdersController::class, 'order']);
