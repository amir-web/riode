<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\Product;
use App\model\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function add(Request $request)
    {
        session_start();
        if(isset($_SESSION['single'])){

            $img = $_SESSION['single'];

        }else{
            $img = "no-image.jpg";

        }


        $post = Product::create([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'old_price' => $request->get('old_price'),
            'img'=>$img,
        ]);

        if($post->save()){
            $id = $post->id;
            // dd($id);
            if(!empty($_SESSION['multi'])){
                $sql_part = '';
                foreach($_SESSION['multi'] as $v){


                    $gall = ProductGallery::create([

                        'product_id'=>$id,
                        'img' => $v,

                    ]);

                }

                $gall->save();
                unset($_SESSION['multi']);
            }


            unset($_SESSION['single']);

            return redirect()->route("product.index");

        }
    }

    public function uploadimage(){

        if($_POST['name'] =="single"){

            $name = $_POST['name'];

            $this->uploadImg($name);

        }

        if($_POST['name'] =="multi"){

            $name = $_POST['name'];

            $this->uploadImg($name);

        }

    }

    public function uploadImg($name){
        $uploaddir = public_path() . '/uploads/products/';
        $image = $_FILES[$name]['name'];
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // расширение картинки
        $new_name = Str::random(10) . '.' . $ext;

        if($image!= null) Storage::delete('/uploads/products/' . $_FILES[$name]['name']);




        $tmp = $_FILES[$name]['tmp_name'];


        $img = Image::make($tmp);
        $img->backup();
        $pat = public_path().'/uploads/products/'.$new_name;
        $img->fit(800,500)->save($pat,100);
        //$img->fit(310,380)->insert(public_path().'/uploads/mask/mask.png','bottom-right')->save($pat,100);
        $img->reset();
        $img->backup();
        session_start();
        if($name == 'single'){
            $_SESSION['single'] = $new_name;
        }else{
            $_SESSION['multi'][] = $new_name;
        }


        $res = array("file" => $new_name);
        exit(json_encode($res));

//        if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)){
//            session_start();
//            if($name == 'single'){
//                $_SESSION['single'] = $new_name;
//            }else{
//
//
//              //  session()->put('products.name', []);
//                //session()->push('products.name', $new_name[]);
//                $_SESSION['multi'][] = $new_name;
//
//
//               // dd( $_SESSION['img']);
//
//               // $res= ["file" => $_SESSION['img']];
//                //exit(json_encode($res));
//            }
//
//           $res = array("file" => $new_name);
//            exit(json_encode($res));
//        }
    }

    public function upd(Request $request){

        $id = $request->get('id');


        if($request->get('new') =="on"){

            $new = 1;
        }else{

            $new = null;
        }


        if($request->get('hits') =="on"){

            $hits = 1;
        }else{

            $hits = null;
        }



        session_start();
        if(isset($_SESSION['single'])){

            $img = $_SESSION['single'];

        }else{
            $img = "no-image.jpg";

        }

        $pro_edit = Product::where('id', $id)->update([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'old_price' => $request->get('old_price'),
            'img'=>$img,
        ]);






        if(!empty($_SESSION['multi'])){

            foreach($_SESSION['multi'] as $v){


                $gall = ProductGallery::create([

                    'product_id'=>$request->get('product_id'),
                    'img' => $v,

                ]);

            }

            $gall->save();
            unset($_SESSION['multi']);

        }
        unset($_SESSION['single']);



        return redirect()->back();

    }



    public function delmultiimage(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if(!$id || !$src){
            abort('404');
        }




        $del =   DB::delete("delete from product_gallery where id = ? and img =?",[$id,$src]);
        if($del){
            @unlink(public_path().'/uploads/products/'.$src);
            exit('1');
        }


        return;
    }















}
