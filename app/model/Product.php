<?php

namespace App\model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class Product extends Model
{

    use Sluggable;
    protected $table = 'products';
    protected $fillable = ['category_id','name','slug','description','content','price','old_price','img',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }


    /*public function last_pro(){
        $last_pro = Product::orderBy('created_at','desc')->limit(5)->get();
        return $last_pro;
    }*/



    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();
        return $post;
    }


    public function removeImage()
    {


        if($this->img != "") @unlink(public_path().'/uploads/posts/'.$this->img);


    }



    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension();
        $pat = public_path().'/uploads/posts/'.$filename;
        $img = Image::make($image);
        $img->backup();
        $img->fit(800,500)->save($pat,100);
        $img->reset();
        $img->backup();
        $this->img = $filename;
        $this->save();
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
