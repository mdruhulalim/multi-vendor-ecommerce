<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;

// vendor routes
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'profileUpdate'])->name('profile.update');
Route::post('profile/update/password', [VendorProfileController::class, 'passwordUpdate'])->name('password.update');