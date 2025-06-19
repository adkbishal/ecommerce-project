<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{   
    /** Show Product Detail Page */
    public function showProduct(string $slug) {
        $product= Product::with(['vendor','category','productImageGalleries', 'variants','brand'])->where('slug', $slug)->where('status',1)->first();
        return view('frontend.pages.product-details',compact('product'));
    }
}
