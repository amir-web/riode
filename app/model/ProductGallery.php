<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductGallery extends Model
{
    protected $table = 'product_gallery';
    protected $fillable = ['product_id', 'img'];

    public static function add($data){
        $request = new static();
        $request->fill($data);
        $request->save();
    }

    public function uploadGallery($gallery, $id){
        $folder = date("Y-m-d");

        foreach ($gallery as $img){
            $this->product_id = $id;
            $this->img = $img->store("images/{$folder}");
            $this->save();
        }
    }
}
