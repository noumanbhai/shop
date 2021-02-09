<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Brands;

class Product extends Model
{
	use HasFactory;
	protected $guarded = [];
	public function allcats()
	{
		return $this->hasOne(Category::class,'id','category_id');
	}
	public function allbrands()
	{
		return $this->hasOne(Brand::class,'id','brand_id');
	}
}
