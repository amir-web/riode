@extends('layouts.riode')
@section('content')
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('store.index')}}"><i class="d-icon-home"></i></a></li>
                    <li>@lang('category_page.breadcrumb_title')</li>
                </ul>
            </div>
        </nav>
        <div class="page-content mb-10 pb-3">
            <div class="container">
                <div class="row gutter-lg">
                    <aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">@lang('category_page.cat_title')</h3>
                                    @include('riode.topmenu.category')
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Filter by Price</h3>
                                    <div class="widget-body mt-3">
                                        <form action="">
                                            <div class="price_slider"></div>
                                            <p>
                                                <label id="price_filter" data-url="{{route('store.category',['url' => $cat->slug])}}" for="amount">Price range:</label>
                                                <input onchange="price()" type="text" id="amount" readonly>
                                            </p>
                                        </form><!-- End Filter Price Form -->
                                    </div>
                                </div>
                                <div class="check_filter">
                                @foreach($pro_group as $group)
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">{{$group->name}}</h3>
                                    <ul class="widget-body filter-items my_filter">
                                        @foreach($group->attrs as $item)
                                        <li><input type="checkbox" value="{{$item->id}}">{{$item->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endforeach
                                </div>
                                {{--<div class="widget widget-collapsible">
                                    <h3 class="widget-title">Color</h3>
                                    <ul class="widget-body filter-items">
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">White</a></li>
                                    </ul>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Brands</h3>
                                    <ul class="widget-body filter-items">
                                        <li><a href="#">Cinderella</a></li>
                                        <li><a href="#">Comedy</a></li>
                                        <li><a href="#">Rightcheck</a></li>
                                        <li><a href="#">SkillStar</a></li>
                                        <li><a href="#">SLS</a></li>
                                    </ul>
                                </div>--}}
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-9 ajax_filter">
                        @if(count($product))
                            <div class="row cols-2 cols-sm-3 product-wrapper">
                                @foreach($product as $item)
                                    <div class="product-wrap">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="">
                                                    <img src="/public/riode/images/shop/{{$item->img}}" alt="product" width="280" height="315">
                                                </a>
                                                <div class="product-label-group">
                                                    <label class="product-label label-new">new</label>
                                                    <label class="product-label label-sale">12% OFF</label>
                                                </div>
                                                <div class="product-action-vertical">
                                                    <a href="" class="btn-product-icon btn-cart" title="Add to cart"><i class="d-icon-bag"></i></a>
                                                    <a class="btn-product-icon btn-wishlist" id="add_wishlist" data-url="{{route('store.wishlist')}}" onclick="wishlist({{$item->id}})"  title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                </div>
                                                <div class="product-action">
                                                    <button title="Add to cart" onclick="add_to_cart({{$item->id}})" data-url="{{route("store.add.to.cart")}}" id="product_add" class="btn-product border_none">
                                                        Add to cart
                                                    </button>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="{{route('store.category',['url' => $item->category->slug])}}">{{$item->category->title}}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="{{route('store.product',['url' => $item->slug])}}">{{$item->name}}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <ins class="new-price">${{$item->price}}</ins><del class="old-price">${{$item->old_price}}</del>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:60%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="product-1.html" class="rating-reviews">( 16 reviews )</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h2>There is no product here! ;(</h2>
                        @endif
                        {{$product->links('riode.pagination.paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        .minipopup-area{
            display: none!important;
        }

        .my_modal{
            z-index: 3000;
        }

        .border_none{
            border: none!important;
            cursor: pointer;
        }

        .my_modal_active{
            visibility: visible;
            opacity: 1;
            top: 100%;
        }

        .my_filter li {
            display: flex;
            align-items: center;
            padding: 13px 3px 13px 0px;
        }
    </style>

@endsection
