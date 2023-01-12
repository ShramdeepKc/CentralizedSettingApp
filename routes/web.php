<?php
use App\Http\Controllers\FederalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth']);
Route::resource('federals', FederalController::class)
->middleware(['auth']);
Route::resource('clients', ClientController::class)
->middleware(['auth']);
Route::resource('products', ProductController::class)->middleware(['auth']);
Route::resource('status', StatusController::class)->middleware(['auth']);
Route::resource('/', DashboardController::class)->middleware(['auth']);

  

require __DIR__.'/auth.php';
