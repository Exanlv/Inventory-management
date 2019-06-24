<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = true;

    protected $fillable = ['name', 'category_id', 'price', 'description'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
