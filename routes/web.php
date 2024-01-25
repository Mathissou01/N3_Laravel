<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');


    // Route Products
    Route::get('/tasks/export', [TaskController::class, 'export'])->name('tasks.export');
    Route::get('/tasks/import', [TaskController::class, 'import'])->name('tasks.import');
    Route::post('/tasks/import', [TaskController::class, 'handleImport'])->name('tasks.handleImport');
    Route::resource('/tasks', TaskController::class);
    Route::resource('/categories', CategoryController::class);
