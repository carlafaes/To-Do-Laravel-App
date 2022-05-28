<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;

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

Route::get('/todos', function () {
    return view('todos.index');
});

Route::post('/todos', [todoController::class, 'store'])->name('todos');

Route::get('/todos', [todoController::class, 'index'])->name('todos');

Route::get('/todos/{id}', [todoController::class, 'show'])->name('todos-show');

Route::patch('/todos/{id}', [todoController::class, 'update'])->name('todos-update');

Route::delete('/todos/{id}', [todoController::class, 'destroy'])->name('todos-destroy');