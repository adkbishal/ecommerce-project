<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function vendor() {
    return $this->belongsTo(Vendor::class);
   }
   public function category() {
      return $this->belongsTo(Category::class);
   }

   public function productImageGalleries() {
      return $this->hasMany(ProductImageGallery::class);
   }

   public function variants() {
      return $this->hasMany(ProductVariant::class);
   }
   
   public function brand() {
      return $this->belongsTo(Brand::class);
   }
}
