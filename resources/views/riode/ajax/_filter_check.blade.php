@if(count($check_filter))
    <div class="row cols-2 cols-sm-3 product-wrapper">
        @foreach($check_filter as $item)
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
{{$check_filter->links('riode.pagination.paginate')}}
