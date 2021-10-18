<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\Category;
use App\model\Product;
use App\Repositories\admin\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $cat = Category::all();
        return view('admin.category.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ad_cat = new CategoryRepository();
        $admin_categories = $ad_cat->admin_categories();
        $delimiter = '';
        $admin_category = [];
        return view('admin.category.create', compact('admin_categories', 'delimiter', 'admin_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad_cat = new CategoryRepository();
        $store = $ad_cat->store($request);
        return redirect(route('category.index'));
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
        $edit_cat = Category::find($id);
        $admin_categories = $ad_cat->admin_categories();
        $delimiter = '';
        $admin_category = [];
        return view('admin.category.edit', compact('edit_cat', 'admin_category', 'admin_categories', 'delimiter'));
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
        $ad_cat = new CategoryRepository();
        $update = $ad_cat->update($request, $id);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect(route('category.index'));
    }
}
