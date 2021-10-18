<?php


namespace App\Repositories\store;


use App\model\Category;

class CategoryRepository
{
    public function cat($url){
        return $cat = Category::where('slug', $url)->first();
    }

    public function listCategories(){
        return $categories = Category::with('children')->where('parent_id', 0)->get();
    }
}
