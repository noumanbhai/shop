<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcat;


class HomeController extends Controller
{
	public function index()
	{
		$categorys=Category::all();
		$subcats=Subcat::all();
		return view('frontend.main',compact('categorys','subcats'));
	}

}
