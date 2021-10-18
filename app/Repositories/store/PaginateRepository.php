<?php


namespace App\Repositories\store;


use App\model\Category;
use App\Http\Controllers\StoreController;

class PaginateRepository
{
    public function pag($url){
        $cat = Category::where('slug', $url)->first();
        return $product = $cat->product()->paginate(9);
    }
}
