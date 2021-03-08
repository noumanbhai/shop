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
    		$products=Product::where('status',1)->get();

   $midsliders=Product::where('status', 1)->where('mid_slider', 1)->limit(4)->get();
   $hotdeals=Product::where('status', 1)->where('hot_deal', 1)->limit(3)->get();
   $trends=Product::where('status', 1)->where('trend', 1)->limit(8)->get();
   $bestrateds=Product::where('status', 1)->where('best_rated', 1)->limit(16)->get();
   $featured=Product::where('status', 1)->orderBy('id', 'DESC')->limit(16)->get();

// dd($ $feaures);
return view('frontend.main',compact('categorys','subcats','products','midsliders','hotdeals','trends','bestrateds','featured'));
	}

}
