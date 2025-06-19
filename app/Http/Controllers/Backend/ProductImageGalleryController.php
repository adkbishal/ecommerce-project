<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImageGallery;

class ProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request, ProductImageGalleryDataTable $dataTable)
    {
        $product= Product::findOrFail($request->product);

        return $dataTable->render('admin.product.image-gallery.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
        */
    public function create()
    {
       
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  $request->validate([
        //     'image.*'=> ['required','image','max:3000'],
        //  ]);

        $request->validate([
    'image' => ['required', 'array', 'min:1'], // Ensure it's a non-empty array
    'image.*' => ['required','image', 'max:3000'],
    'product' => ['required', 'exists:products,id'],
        ]);

         /** Handle Image Upload */
    $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

    if (!empty($imagePaths)) {
        foreach ($imagePaths as $path) {
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }
        toastr('Uploaded successfully!');
    } else {
        toastr()->error('No images were uploaded.');
    }

    return redirect()->back();
}


    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage= ProductImageGallery::findOrFail($id);
        $this->deleteImage($productImage->image);
        $productImage->delete();
         return response()->json([
        'status' => 'success',
        'message' => 'Deleted successfully!'
         ]);
    }
}
