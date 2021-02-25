<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcat;
use App\Models\Product;
// use DB;


class HomeController extends Controller
{
	public function index()
	{
		$categorys=Category::all();
		$subcats=Subcat::all();
		// $products=Product::all();
		// return $products->status;
		// if($products->status=='1')
		// {
		// 	return $products->status;
		// }
    // $products= DB::table('products')->select()->where("Status",1) ->orderBy("ID", "asc") ->get();
    		$products=Product::all();

		return view('frontend.main',compact('categorys','subcats','products'));
	}

}
