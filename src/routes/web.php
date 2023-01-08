<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodosController;

Route::get('/', [HomeController::class, 'show'])->middleware('auth');
Route::get('/home', [HomeController::class, 'show'])->middleware('auth');

Route::post('/todo', [TodosController::class, 'store'])->middleware('auth');
Route::delete('/todo/{todo}', [TodosController::class, 'destroy'])->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);