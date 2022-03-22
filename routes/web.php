<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [OrderController::class, 'index'])->name('home');
// Route::resource('dish', DishController::class);
Route::get('dish',[DishController::class,'index'])->name('index');
Route::get('dish/create',[DishController::class,'create'])->name('dish.create');
Route::post('dish/create',[DishController::class,'store']);
Route::get('dish/{id}/edit',[DishController::class,'edit'])->name('dish.edit');
Route::put('dish/{id}',[DishController::class,'update'])->name('dish.update');
Route::delete('dish/{id}',[DishController::class,'destroy']);



