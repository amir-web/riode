<?php


namespace App\Repositories\store;


use App\model\Product;

class IndexRepository
{
    public function index_last_pro(){
        return $last_pro = Product::orderBy('created_at','desc')->limit(5)->get();
    }

    public function index_feat_pro(){
        return $feat_pro = Product::orderBy('price', 'desc')->limit(5)->get();
    }
}
