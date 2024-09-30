<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;

// vendor routes
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'profileUpdate'])->name('profile.update');
Route::post('profile/update/password', [VendorProfileController::class, 'passwordUpdate'])->name('password.update');

// for shop profile
Route::resource('shop-profile', VendorShopProfileController::class);

// for products routes
Route::get('product/get-sub-categories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [VendorProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::resource('products', VendorProductController::class);

// product image gallery
Route::resource('products-image-callery', VendorProductImageGalleryController::class);