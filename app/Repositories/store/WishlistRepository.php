<?php


namespace App\Repositories\store;


use App\model\Product;
use Illuminate\Support\Facades\Session;

class WishlistRepository
{


   /* public function wish($request){
        $product = Product::find($request->id);
        $count =  Session::put('key',[
            'w_id' => $product->id,
            'w_name' => $product->name,
            'w_price' => $product->price,
            'w_img' => $product->img
        ]);
        return $count;
    }*/
}
