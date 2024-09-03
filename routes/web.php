<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\ThrottleTodoCreation;

// Route::get('/', function () {
//     return view('home');
// });
// Đăng nhập
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Đăng ký
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Auth::routes();

Route::get('/', [App\Http\Controllers\TodoController::class, 'index']);
Route::get('/home', [App\Http\Controllers\TodoController::class, 'index'])->name('home');



Route::get('/dashboard', [TodoController::class, 'index'])->name('dashboard')->middleware(['auth']);
Route::post('/todos', [App\Http\Controllers\TodoController::class, 'store'])
    ->name('todos.store')
    ->middleware(ThrottleTodoCreation::class);

// Route cho action sửa
Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');

// Route cho action cập nhật
Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');

// Route cho action xóa
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::put('/todos/{id}', [TodoController::class, 'updateCheck'])->name('todos.updateCheck');

Route::get('/export', [TodoController::class, 'export'])->name('todos.export');
