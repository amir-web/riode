<?php


namespace App\Repositories\admin;


use App\model\Product;
use App\model\ProductGallery;

class ProductRepository
{
    public function store($adminProductRequest){
        $prod = Product::add($adminProductRequest->all());

        $prod->uploadImage($adminProductRequest->file('img'));
        $prod->setCategory($adminProductRequest->get('category_id'));

        if($prod->save()){
            $id  = $prod->id;
            $data = [
                'id' => $id,
                'gallery' => $adminProductRequest->file('gallery[]'),
            ];
            $gal = ProductGallery::add($data);
            $gal->uploadGallery();
        }

        return $prod;
    }

}
