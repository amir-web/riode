<?php


namespace App\Repositories\store;


use Gloudemans\Shoppingcart\Facades\Cart;

class QtyProductRepository
{

    public function qty_plus($request){
        $plus_qty = Cart::get($request->rowId);
        return $plus_qty->qty++;
    }

    public function qty_minus($request){
        $minus_qty = Cart::get($request->rowId);
        return $minus_qty->qty--;
    }
}
