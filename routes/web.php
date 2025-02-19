<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authadmin;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware('auth', Authadmin::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

