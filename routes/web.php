<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/home-two',[UserController::class,'index_two'])->name('home_two');
Route::get('/home-three',[UserController::class,'index_three'])->name('home_three');
Route::post('/form-register_one',[UserController::class,'store_method_one'])->name('register_one');
Route::post('/form-register_two',[UserController::class,'store_method_two'])->name('register_two');
Route::post('/form-register_three',[UserController::class,'store_method_three'])->name('register_three');
