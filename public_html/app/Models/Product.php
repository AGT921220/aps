<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';

    public function images()
    {
        return $this->hasMany(ProductImage::class)->select('image', 'product_id');
    }
    public function childrens()
    {
        return $this->hasMany(Product::class, 'parent_id')->select('name','stock','color','parent_id');
    }
}
