<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGaleryController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** Profile Route **/

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

/** Slider Route */

Route::resource('slider', SliderController::class);


/** Category Route */
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');

Route::resource('category', CategoryController::class);

/** Sub Category Route */
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');

Route::resource('sub-category', SubCategoryController::class);

/** Child Category Route */
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-category', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');

Route::resource('child-category', ChildCategoryController::class);

/** Brand Route */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');

Route::resource('brand', BrandController::class);

/** Vendor Profile Routes */

Route::resource('vendor-profile', AdminVendorProfileController::class);

/** Products Route */
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childcategories', [ProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product',ProductController::class);

/** Product Image Gallery Route */
Route::resource('product-image-gallery',ProductImageGalleryController::class);

/** Product Variant Route */
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant',ProductVariantController::class);

/** Product Variant Item Route */
Route::get('product-variant-item/{productId}/{variantId}',[ProductVariantItemController::class,'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}',[ProductVariantItemController::class,'create'])->name('product-variant-item.create');
Route::post('product-variant-item',[ProductVariantItemController::class,'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}',[ProductVariantItemController::class,'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}',[ProductVariantItemController::class,'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{variantItemId}',[ProductVariantItemController::class,'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item-status',[ProductVariantItemController::class,'changeStatus'])->name('product-variant-item.change-status');


/** Seller Product Routes */
Route::get('seller-product',[SellerProductController::class,'index'])->name('seller-product.index');
Route::get('seller-pending-product',[SellerProductController::class,'sellerPendingProducts'])->name('seller-pending-product.index');
Route::put('change-approve-status',[SellerProductController::class,'changeApproveStatus'])->name('change-approve-status');

/** Flash Sale Routes */
Route::get('flash-sale',[FlashSaleController::class,'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSaleController::class,'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSaleController::class,'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/change-status',[FlashSaleController::class,'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale/status',[FlashSaleController::class,'changeStatus'])->name('flash-sale.change-status');
Route::delete('flash-sale/{id}',[FlashSaleController::class,'destroy'])->name('flash-sale.destroy');

/** Coupon Routes */
Route::put('coupons/change-status',[CouponController::class,'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

/** Shipping Rule Routes */
Route::put('shipping-rule/change-status',[ShippingRuleController::class,'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

/**  Setting Routes */
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('general-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('general-setting.update');