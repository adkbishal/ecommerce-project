<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SellerPendingProductDataTable;
use App\DataTables\SellerProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class SellerProductController extends Controller
{
    public function index(SellerProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-product.index');

    }

    public function sellerPendingProducts(SellerPendingProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-pending-product.index');
    }

    public function changeApproveStatus(Request $request) {
        $product= Product::findOrFail($request->id);
        $product->is_approved= $request->value;
        $product->save();

        return response()->json([
            'message' => 'Product Approve Status has been updated',

        ]);

    }

}
