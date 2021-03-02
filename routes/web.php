<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route biasa
Route::get('/', [HomeController::class, 'index'])->name('home');

//Route prefix
Route::prefix('/product')->group(function(){
Route::get('/product', [ProductController::class, 'index'])->name('product');
});

//Route parameter
Route::get('/news/{title}', [NewsController::class, 'index'])->name('news');

//Route biasa (halaman about-us)
Route::get('/about-us', [AboutController::class, 'index'])->name('about');

//Route resource only
Route::resource('/contact-us', ContactController::class, ['only' => ['index']
]);
