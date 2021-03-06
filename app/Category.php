<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $incrementing = true;
	protected $table = 'Category';
	protected $fillable = ['name'];
	
	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
