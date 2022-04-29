<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DownloadController;
  
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
    
Route::resource('products', ProductController::class);
Route::get('viewfiles', [DownloadController::class, 'index']);

Route::get('get/{file}', [DownloadController::class, 'getfile']);