<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

Route::get('profile',[VendorProfileController::class,'index'])->name('profile');
Route::put('profile',[VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile',[VendorProfileController::class, 'updatePassword'])->name('profile.update.password');

/** Vendor Shop Profile Route */

Route::resource('shop-profile',VendorShopProfileController::class);

/** Vendor Shop Product Route */
Route::get('product/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childcategories', [VendorProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product',VendorProductController::class);

/** Product Image Gallery Route */
Route::resource('product-image-gallery',VendorProductImageGalleryController::class);


/** Product Variant Route */
Route::put('product-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant',VendorProductVariantController::class);

/** Product Variant Item Route */
Route::get('product-variant-item/{productId}/{variantId}',[VendorProductVariantItemController::class,'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}',[VendorProductVariantItemController::class,'create'])->name('product-variant-item.create');
Route::post('product-variant-item',[VendorProductVariantItemController::class,'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}',[VendorProductVariantItemController::class,'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}',[VendorProductVariantItemController::class,'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{variantItemId}',[VendorProductVariantItemController::class,'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item-status',[VendorProductVariantItemController::class,'changeStatus'])->name('product-variant-item.change-status');