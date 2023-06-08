<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthCotroller;
use PhpParser\Node\Stmt\Catch_;



Route::get('/', [CategoryController::class,'index'])->name('index');
Route::get('test', [CategoryController::class, 'tests'])->name('admin.category');
Route::get('create', [CategoryController::class, 'create'])->name('cat.category');
Route::post('store', [CategoryController::class, 'store'])->name('class.store');
Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('class.delete');
Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('class.edit');
Route::put('update/{id}', [CategoryController::class, 'update'])->name('class.update');

Route::get('login', [CustomAuthCotroller::class, 'login'])->name('login');
Route::get('register', [CustomAuthCotroller::class, 'registration'])->name('register');
Route::post('regCreate', [CustomAuthCotroller::class, 'regCreate'])->name('register.create');
Route::post('login-user', [CustomAuthCotroller::class, 'loginUser'])->name('login-user');
///logout form
Route::get('/logout', [CustomAuthCotroller::class, 'logout']);


