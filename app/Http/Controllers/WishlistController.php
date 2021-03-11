<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
    public function addwishlist($id)
      // return $id;
// { 
// if (Auth::check()) {
// $userid=Auth::id();
// $check=Wishlist::where('user_id',$userid)->where('product_id',$id);
// if ($check==[]) {
// return \Response::json(['success'=>'Wish list is add']);


// } else {

// $list= new Wishlist([
// 'user_id'=>$userid,
// 'product_id'=>$id,
// ]);
// $list->save();
// return \Response::json(['success'=>'Wish list is add']);

// }

// }
// }
// 
    {


        $userid = Auth::id();
        $check=Wishlist::where('user_id',$userid)->where('product_id',$id)->first();

        $data = array(
            'user_id' => $userid,
            'product_id' => $id,

        );

        if (Auth::Check()) {

         if ($check) {
          return \Response::json(['error' => 'Product Already Has on your wishlist']);   
      }else{

        $list= new Wishlist([
            'user_id'=>$userid,
            'product_id'=>$id,
        ]);
        $list->save();


    return \Response::json(['success' => 'Product Added on wishlist']);

    }


}else{
    return \Response::json(['error' => 'At first loing your account']);      

} 

}
}







