@if(count(Cart::content()))
    <thead>
    <tr>
        <th><span>Product</span></th>
        <th><span>Name</span></th>
        <th><span>Price</span></th>
        <th><span>quantity</span></th>
        <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>
    @foreach(Cart::content() as $cart_item)
        <tr>
            <td class="product-thumbnail">
                <figure>
                    <a>
                        <img src="/public/riode/images/shop/<?php echo ($cart_item->options->has('img') ? $cart_item->options->img : ''); ?>" width="100" height="100" alt="product">
                    </a>
                </figure>
            </td>
            <td class="product-name">
                <div class="product-name-section">
                    <a>{{$cart_item->name}}</a>
                </div>
            </td>
            <td class="product-subtotal">
                <span class="amount">${{$cart_item->price}}</span>
            </td>
            <td class="product-quantity">
                <div class="input-group">
                    <a style="cursor: pointer; padding:15px 5px;" data-html="{{$cart_item->rowId}}" data-url="{{route('store.minus.qty')}}" id="qty_minus" class="quantity-minus d-icon-minus" onclick="minus_qty()"></a>
                    <input class="form-control" id="qty_pro" type="number" value="{{$cart_item->qty}}">
                    <a style="cursor: pointer; padding:15px 5px;" data-html="{{$cart_item->rowId}}" data-url="{{route('store.plus.qty')}}" id="qty_plus" class="quantity-plus d-icon-plus" onclick="plus_qty()"></a>
                </div>
            </td>
            <td style="padding: 50px 0; margin: 0;" class="product-price">
                <span class="amount">${{$cart_item->subtotal}}</span>
            </td>
            <td class="product-close">
                <a data-html="{{$cart_item->rowId}}" data-url="{{route('store.remove.cart.page')}}" id="remove-ajax" class="product-remove" title="Remove this product" onclick="remove_cart_page()">
                    <i class="fas fa-times"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
@else
    <h2>Cart is empty ;(</h2>
@endif
