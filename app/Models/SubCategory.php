<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
     public function childCategories() {
        return $this->hasMany(ChildCategory::class);
    }
    
    
}
