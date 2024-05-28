<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/meals', [App\Http\Controllers\MealController::class, 'index'])->name('meals.index');
Route::get('/meals/create', [App\Http\Controllers\MealController::class, 'create'])->name('meals.create');
Route::post('/meals/store', [App\Http\Controllers\MealController::class, 'store'])->name('meals.store');
// Route::get('/meals/edit/{meal}', [App\Http\Controllers\MealController::class, 'edit'])->name('meals.edit');
// Route::put('/meals/update/{meal}', [App\Http\Controllers\MealController::class, 'update'])->name('meals.update');
// Route::delete('/meals/destroy/{meal}', [App\Http\Controllers\MealController::class, 'destroy'])->name('meals.destroy');

Route::get('/meals/edit/{id}', [App\Http\Controllers\MealController::class, 'edit'])->name('meals.edit');
Route::put('/meals/update/{id}', [App\Http\Controllers\MealController::class, 'update'])->name('meals.update');
Route::delete('/meals/destroy/{id}', [App\Http\Controllers\MealController::class, 'destroy'])->name('meals.destroy');


//orders
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/status/{id}', [App\Http\Controllers\OrderController::class, 'changeStatus'])->name('orders.status');




