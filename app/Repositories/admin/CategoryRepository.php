<?php


namespace App\Repositories\admin;


use App\model\Category;

class CategoryRepository
{

    public function admin_categories(){
        return Category::with('children')->where('parent_id', 0)->get();
    }

    public function store($request){
        $category = Category::create([
            'parent_id' => $request->parent_id,
            'title' => $request->cat_name,
            'ru_title' => $request->cat_ru_name,
            'en_title' => $request->cat_en_name,
            'slug' => $request->cat_slug,
        ]);
        $category->save();
        return $category;
    }

    public function update($request, $id){
        $category = Category::find($id);
        $category->update([
            'parent_id' => $request->parent_id,
            'title' => $request->cat_name,
            'ru_title' => $request->cat_ru_name,
            'en_title' => $request->cat_en_name,
            'slug' => $request->cat_slug,
        ]);
        $category->save();
        return $category;
    }
}
