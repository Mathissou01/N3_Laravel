<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticlesController;
use App\Http\Requests\ContactFormRequest;

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

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::resource('/articles', ArticlesController::class);

Route::get('/form', function () {
    return view('contactForm');
})->name('form');

Route::post('/form', function (ContactFormRequest $request) {
    dd($request->validated());
})->name('form');


Route::get('/users/{id}', function ($id) {
    return $id;
})->where(['id' => '[0-9]+'])->name('user.show');
