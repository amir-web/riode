<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\FilterAttribute;
use App\model\FilterGroup;
use App\model\Product;
use App\Repositories\store\AddToCardRepository;
use App\Repositories\store\CategoryRepository;
use App\Repositories\store\FilterProductRepository;
use App\Repositories\store\IndexRepository;
use App\Repositories\store\PaginateRepository;
use App\Repositories\store\ProductRepository;
use App\Repositories\store\QtyProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{

    public function index()
    {
        $pro = new IndexRepository();
        $last_pro = $pro->index_last_pro();
        $feat_pro = $pro->index_feat_pro();

        return view('riode.index',compact('last_pro', 'feat_pro'));
    }

    public function category(Request $request,$url)
    {
        $category = new CategoryRepository();
        $paginator = new PaginateRepository();
        $filter = new FilterProductRepository();
        $cat = $category->cat($url);
        $categories = $category->listCategories();
        $pro_group = $filter->filterGroupList();

        if ($request->ajax()){
            if (isset($request->min,$request->max)){
                $filter_price = $filter->filter_price($request, $cat);
                return view('riode.ajax._filter_price',compact('filter_price'));
            }elseif (isset($request->array)){
                $check_filter = $filter->filter_checklist($request, $cat);
                return view('riode.ajax._filter_check',compact('check_filter'));
            }else{
                $product = $paginator->pag($url);
            }
        }
        else{
            $product = $paginator->pag($url);
        }
        return view('riode.category', compact('product','categories','pro_group', 'cat'));
    }

    public function product($url)
    {
        $pro_rep = new ProductRepository();
        $product = $pro_rep->product($url);
        $pro_cat = $product->category_id;
        $other_pro = $pro_rep->other_pro($pro_cat);
        return view('riode.product', compact('product', 'other_pro'));
    }

    public function add_to_cart(Request $request)
    {
        $atc_rep = new AddToCardRepository();
        if ($request->ajax()) {
            $result = $atc_rep->addTocard($request);
            return view('riode.ajax._cart_modal')->render();
        }
    }

    public function cart()
    {
        $cart_content = Cart::content();
        return view('riode.cart', compact('cart_content'));
    }

    public function plus_qty(Request $request)
    {
        $qty_plus = new QtyProductRepository();
        if ($request->ajax())
        {
            $qty_plus->qty_plus($request);
            return view('riode.ajax._cart_page_table')->render();
        }
    }

    public function minus_qty(Request $request)
    {
        $qty_minus = new QtyProductRepository();
        if ($request->ajax()) {
            $qty_minus->qty_minus($request);
            return view('riode.ajax._cart_page_table')->render();
        }
    }

    public function remove_cart(Request $request)
    {
        if ($request->ajax())
        {
            Cart::remove($request->rowId);
            return view('riode.ajax._cart_modal')->render();
        }
    }

    public function remove_cart_page(Request $request)
    {
        if ($request->ajax())
        {
            Cart::remove($request->rowId);
            return view('riode.ajax._cart_page_table')->render();
        }
    }

    /*public function wishlist(Request $request)
    {
        if ($request->ajax())
        {

            $product = Product::find($request->id);
            Session::put('key',[
                'w_id' => $product->id,
                'w_name' => $product->name,
                'w_price' => $product->price,
                'w_img' => $product->img
            ]);

            return view('riode.ajax._wishlist_count', compact('count'));
        }
    }*/

}
