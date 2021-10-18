<?php


namespace App\Repositories\store;


use App\model\Product;

class ProductRepository
{

    public function product($url){
        return $product = Product::where('slug', $url)->first();
    }


    public function other_pro($pro_cat){
        return Product::where('category_id', $pro_cat)->get();
    }
}
