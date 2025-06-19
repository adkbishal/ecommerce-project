<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\FlashSaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('flash-sale',[FlashSaleController::class,'index'])->name('flash-sale');

/** Product Detail Route */
Route::get('flash-detail/{slug}',[FrontendProductController::class,'showProduct'])->name('product-detail');

/** Add to Carts Route */
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');

Route::group(['middleware' =>['auth', 'verified'],'prefix'=>'user', 'as'=>'user.'],function() {
Route::get('dashboard',[UserDashboardController::class, 'index'])->name('dashboard');
Route::get('profile',[UserProfileController::class,'index'])->name('profile');
Route::put('profile',[UserProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile',[UserProfileController::class, 'updatePassword'])->name('profile.update.password');

/** User Address Controller */
Route::resource('address', UserAddressController::class);

});






