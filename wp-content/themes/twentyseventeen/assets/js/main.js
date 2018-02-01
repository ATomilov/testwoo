jQuery(document).ready(function($) {
    $('img.product-image-on-shop').hover(function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        var oldSource = $this.attr('src');
        $this.attr('src', newSource);
        $this.data('alt-src', oldSource);
    });
    $('body').on('click', '.test-add-to-cart', function (e) {
        e.preventDefault();
        var data_productid = $(this).closest('li.product').data('productid');
        $.ajax({
            url: twAjaxAddToCart.ajaxurl,
            method: 'post',
            data: {
                action: 'twAddToCart',
                data_productid: data_productid,
            },
            success: function(response) {
                if ( response['success'] ) {
                    $('#myModal').fadeIn(500);
                    $('.cart-header').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> (' + response['data'] + ')');
                    $('#myModal').delay(1000).fadeOut();
                }
                else {
                    alert("Error with add to cart")
                }
            },
            error: function(response) {
                alert("Error with add to cart request");
            }
        });
    });
    $('.product-image-on-shop').click(function (e) {
        var data_productid = $(this).closest('li.product').data('productid');
        $.ajax({
            url: twAjaxAddToCart.ajaxurl,
            method: 'post',
            data: {
                action: 'twGetProductContent',
                data_productid: data_productid
            },
            success: function(response) {
                if ( response['success'] ) {
                    $('.modal-content-container.showmore-product > .modal-content').html(response['data']);
                    $('.modal.showmore-product').fadeIn(500);
                }
                else {
                    alert("Error with show quick view product")
                }
            },
            error: function(response) {
                alert("Error with show quick view request");
            }
        });

    });
    $('.close-modal').click(function () {
        $('.modal.showmore-product').fadeOut();
        // setTimeout(function () {
        //     $('.modal-content-container.showmore-product > .modal-content').html("");
        // }, 500);
    });
    $('body').on('change', 'select[name=current-product-variations]', function() {
        alert( this.value );
    });
    $('body').on('click', '.add-to-cart.quick-show', function (e) {
        e.preventDefault();
        var data_productquickshowid = $(this).closest('div.product-quick-view-info').data('productQuickShowId');
        alert(data_productquickshowid);
    });
});

