<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;
    protected $guarded = [];





    public function allcats()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
