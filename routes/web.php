<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/meal', [MealController::class, 'index'])->name('meal.index');
Route::post('/meal', [MealController::class, 'store'])->name('meal.store');
Route::get('/meal/{meal}/edit', [MealController::class, 'edit'])->name('meal.edit');
Route::delete('/meal/{meal}', [MealController::class, 'destroy'])->name('meal.destroy');
Route::put('/meal/{meal}', [MealController::class, 'update'])->name('meal.update');
Route::get('/meal/create', [MealController::class, 'create'])->name('meal.create');
Route::get('/meal/{meal}', [MealController::class, 'show'])->name('meal.show');


Route::get('/goal', [GoalController::class, 'index'])->name('goal.index');
Route::post('/goal', [GoalController::class, 'store'])->name('goal.store');
Route::get('/goal/{goal}/edit', [GoalController::class, 'edit'])->name('goal.edit');
Route::delete('/goal/{goal}', [GoalController::class, 'destroy'])->name('goal.destroy');
Route::put('/goal/{goal}', [GoalController::class, 'update'])->name('goal.update');
Route::get('/goal/create', [GoalController::class, 'create'])->name('goal.create');
Route::get('/goal/{goal}', [GoalController::class, 'show'])->name('goal.show');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
