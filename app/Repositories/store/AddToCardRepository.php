<?php


namespace App\Repositories\store;


use App\model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCardRepository
{

    public function addTocard($request){
        $pro = Product::find($request->id);
        $cart = Cart::add([
            'id' => $pro->id,
            'name' => $pro->name,
            'qty' => 1,
            'price' => $pro->price,
            'weight' => 500,
            'options' => [
                'img' => $pro->img,
            ]
        ]);
        return $cart;
    }
}
