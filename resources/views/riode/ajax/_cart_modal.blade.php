
    <div class="products scrollable">
        @if(count(Cart::content()))
            @foreach(Cart::content() as $m_item)
                <div class="product product-cart">
                    <figure class="product-media">
                        <a>
                            <img src="/public/riode/images/shop/<?php echo ($m_item->options->has('img') ? $m_item->options->img : ''); ?>" alt="product" width="80" height="88">
                        </a>
                        <button onclick="remove_pro()" data-url="{{route('store.remove.cart')}}" data-html="{{$m_item->rowId}}" id="remove_pro" class="btn btn-link btn-close">
                            <i class="fas fa-times"></i><span class="sr-only">Close</span>
                        </button>
                    </figure>
                    <div class="product-detail">
                        <a class="product-name">{{$m_item->name}}</a>
                        <div class="price-box">
                            <span class="product-quantity">{{$m_item->qty}}</span>
                            <span class="product-price">${{$m_item->price}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Cart is empty ;(</p>
        @endif
    </div>
    <!-- End of Products  -->
    <div class="cart-total">
        <label>Subtotal:</label>
        <span class="price">$<?php echo Cart::subtotal(); ?></span>
    </div>
    <!-- End of Cart Total -->
    <div class="cart-action">
        <a href="{{route('store.cart')}}" class="btn btn-dark"><span>Go To Checkout</span></a>
    </div>
    <!-- End of Cart Action -->

