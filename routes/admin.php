<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;

// admin routes
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// for profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// for Slider
Route::resource('slider', SliderController::class);

// for Category
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);