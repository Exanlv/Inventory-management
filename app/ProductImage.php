<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $incrementing = true;

    protected  $fillable = ['product_id', 'path'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
