$( function price_range() {
    $(".price_slider").slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 50, 450 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        },
        change: function( event, ui ) {
            let minimum_val = $(".price_slider").slider( "values", 0 )
            let maximum_val = $(".price_slider").slider( "values", 1 )
            let url = $('#price_filter').data('url')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                data: {min: minimum_val, max: maximum_val},
                type: 'GET',
                success: function (res) {
                    let positionParameters = location.pathname.indexOf('?')
                    let route = location.pathname.substring(positionParameters,location.pathname.length)
                    let newUrl = route + '?'
                    newUrl += 'price=' + [minimum_val,maximum_val]
                    history.pushState({},'',newUrl)
                    jQuery('.ajax_filter').html(res)
                },
                error: function(){
                    alert('Error!');
                }
            });
        }
    });
    $( "#amount" ).val( "$" + $(".price_slider").slider( "values", 0 ) +
        " - $" + $(".price_slider").slider( "values", 1 ) );
} );





/** main ajax*/
/** ======================================================= */

function add_to_cart(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = jQuery('#product_add').data("url");
    /*alert(url);*/
    $.ajax({
        url: url,
        data: {id: id},
        type: 'POST',
        success: function (res) {
            jQuery('.mm_ajax').html(res)
            jQuery(".pro_count").load(" .pro_count > *");
            jQuery('.m_box_ajax').addClass('my_modal_active')
            setTimeout(function(){ jQuery('.m_box_ajax').removeClass('my_modal_active') }, 5000)
        },
        error: function(){
            alert('Error!');
        }
    });
}

function remove_pro() {
    let pro_val = jQuery('#remove_pro').data("html");
    let url = jQuery('#remove_pro').data("url");
    /*console.log(pro_val)*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        data: {rowId: pro_val},
        type: 'POST',
        success: function (res) {
            jQuery('.mm_ajax').html(res)
            jQuery(".pro_count").load(" .pro_count > *")
            jQuery('.cart-table').load(" .cart-table > *")
        },
        error: function(){
            alert('Error!');
        }
    });
}
/** end main ajax*/
/** ======================================================= */








/** cart page ajax*/
/** ======================================================= */
function plus_qty() {
    let pro_val = jQuery('#qty_plus').data("html");
    let url = jQuery('#qty_plus').data("url");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        data: {rowId: pro_val},
        type: 'POST',
        success: function (res) {
            jQuery('.cart-table').html(res)
            jQuery(".pro_count").load(" .pro_count > *")
            jQuery('.mm_ajax').load(" .mm_ajax > *")
        },
        error: function(){
            alert('Error!');
        }
    });
}

function minus_qty() {
    let qty_pro = $('#qty_pro').val()
    if (qty_pro > 1){
        let pro_val = jQuery('#qty_minus').data("html");
        let url = jQuery('#qty_minus').data("url");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            data: {rowId: pro_val},
            type: 'POST',
            success: function (res) {
                jQuery('.cart-table').html(res)
                jQuery(".pro_count").load(" .pro_count > *")
                jQuery('.mm_ajax').load(" .mm_ajax > *")
            },
            error: function(){
                alert('Error!');
            }
        });
    }
}


function remove_cart_page() {
    let pro_val = jQuery('#remove-ajax').data("html");
    let url = jQuery('#remove-ajax').data("url");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        data: {rowId: pro_val},
        type: 'POST',
        success: function (res) {
            jQuery('.cart-table').html(res)
            jQuery(".pro_count").load(" .pro_count > *")
            jQuery('.mm_ajax').load(" .mm_ajax > *")
        },
        error: function(){
            alert('Error!');
        }
    });
}



/** wishlist */

function wishlist(id) {
    let w_url = $('#add_wishlist').data('url')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url: w_url,
        data: {id: id},
        type: 'POST',
        success: function (res) {
            jQuery('#wish_count').html(res)
            console.log(res)
        },
        error: function(){
            alert('Error!');
        }
    })
}

$('.check_filter input').on("change", function () {
    let checked = $('.check_filter input:checked')
    let array = ''
    checked.each(function () {
        array += this.value + ','
    })
    let url = $('#price_filter').data('url')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url: url,
        data: {array: array},
        type: 'POST',
        success: function (res) {
            let positionParameters = location.pathname.indexOf('?')
            let route = location.pathname.substring(positionParameters,location.pathname.length)
            let newUrl = route + '?'
            newUrl += 'filter=' + array
            history.pushState({},'',newUrl)
            jQuery('.ajax_filter').html(res)
        },
        error: function(){
            alert('Error!');
        }
    })
    //console.log(arr)
})


/* ================ register ================ */
$('#register_form').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
        url: $(this).attr('action'),
        data: new FormData(this),
        type: $(this).attr('method'),
        processData:false,
        contentType:false,
        dataType: 'json',
        beforeSend: function(){
            $(document).find('span.error-text').text('')
            $('.spinner_div').addClass('show_spin')
        },
        success: function (res) {
            setTimeout(function(){ $('.spinner_div').removeClass('show_spin') }, 1000);
            if (res.status == 0){
                $.each(res.error, function (prefix, val) {
                    $('span.'+prefix+'_error').text(val[0])
                })
            }else {
                $('#register_form')[0].reset()
                alert(res.msg)
            }
        },
        error: function(){
            /*alert('Error!');*/
        }
    })
})

$('#login_form').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
        url: $(this).attr('action'),
        data: new FormData(this),
        type: $(this).attr('method'),
        processData:false,
        contentType:false,
        dataType: 'json',
        beforeSend: function(){
            $(document).find('span.error-text').text('')
            $('.spinner_div').addClass('show_spin')
        },
        success: function (res) {
            setTimeout(function(){ $('.spinner_div').removeClass('show_spin') }, 1000);
            if (res.status == 0){
                $.each(res.error, function (prefix, val) {
                    $('span.'+prefix+'_error').text(val[0])
                })
            }else {
                $('#login_form')[0].reset()
                alert(res.msg)
            }
        },
        error: function(){
            /*alert('Error!');*/
        }
    })
})





$('.my_login_link').on('click',function () {
    $('.login_modal').fadeIn(500);
})
$('.login_close').on('click',function () {
    $('.login_modal').fadeOut(500);
})


