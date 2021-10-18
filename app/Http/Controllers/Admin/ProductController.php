<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\model\Category;
use App\model\Product;
use App\model\ProductGallery;
use App\Repositories\admin\CategoryRepository;
use App\Repositories\admin\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pat = public_path().'/uploads/products/';
        $products = Product::paginate(50);
        return view('admin.product.index', compact('products','pat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $def_cat = Category::find(1);
        $ad_cat = new CategoryRepository();
        $admin_categories = $ad_cat->admin_categories();
        $delimiter = '';
        $admin_category = [];
        return view('admin.product.create', compact('def_cat', 'admin_categories', 'admin_category','delimiter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductRequest $adminProductRequest)
    {
        $pro_rep = new ProductRepository();
        $store = $pro_rep->store($adminProductRequest);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ad_cat = new CategoryRepository();
        $admin_categories = $ad_cat->admin_categories();
        $delimiter = '';
        $admin_category = [];
        $edit_pro = Product::find($id);
        $def_cat = Category::find($edit_pro->category_id);
        $gallery = ProductGallery::where('product_id', $edit_pro->id)->get();
        return view('admin.product.edit', compact('edit_pro', 'def_cat', 'admin_category','admin_categories','delimiter', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rev_pro_img = Product::find($id);
        $rev_pro_img->removeImage();
        Product::destroy($id);
        return redirect(route('product.index'));
    }
}
