<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

// vendor routes
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');