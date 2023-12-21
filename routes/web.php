<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
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
// Route::resource('categories', CategoryController::class);
// Route::resource('tasks', TaskController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home')->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('tasks', TaskController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
   Route::get('profile',[ProfileController::class,'index'])->name('profile');
  Route::post('profile/{user}',[ProfileController::class,'update'])->name('profile.update');
});

 
