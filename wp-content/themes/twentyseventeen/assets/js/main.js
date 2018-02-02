jQuery(document).ready(function($) {
    $('img.product-image-on-shop').mouseover(function () {
        var $this = $(this);
        var newSource = $this.attr('data-alt-src');
        var oldSource = $this.attr('src');
        $this.attr('src', newSource);
    });
    $('img.product-image-on-shop').mouseout(function () {
        var $this = $(this);
        var mainSource = $this.attr('data-main-src');
        $this.attr('src', mainSource);
    });
    $('body').on('click', '.test-add-to-cart', function (e) {
        e.preventDefault();
        var data_productid = $(this).closest('li.product').data('productid');
        var data_productQuickShowid = $(this).parent().attr('data-productQuickShowId');
        var data_productSinglePageId = $(this).parent().attr('data-singlePageProductId');
        var data_productVariationSelector = $(this).parent().find('select[name=current-product-variations]');
        var data_productVariationId = $('option:selected', data_productVariationSelector).attr('data-currentVariationId');
        var data_quantityCurrentProduct = $(this).parent().find('#current-product-quantity').val();
        // console.log(data_productVariationId);
        // alert(data_quantityCurrentProduct);
        $.ajax({
            url: twAjaxAddToCart.ajaxurl,
            method: 'post',
            data: {
                action: 'twAddToCart',
                data_productid: data_productid,
                data_productQuickShowid: data_productQuickShowid,
                data_productSinglePageId: data_productSinglePageId,
                data_productVariationId: data_productVariationId,
                data_quantityCurrentProduct: data_quantityCurrentProduct
            },
            success: function(response) {
                if ( response['data']['possible'] ) {
                    $('#myModal').fadeIn(500);
                    $('.cart-header').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> (' + response['data']['cart_count'] + ')');
                    $('#myModal').delay(1000).fadeOut();
                }
                else {
                    alert("Error adding to cart. Maybe you forgot to choose the variation of this product.")
                }
            },
            error: function(response) {
                alert("Error with add to cart request");
            }
        });
    });
    $('body').on('click', '.product-image-on-shop', function () {
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
    // $('body').on('change', '.options-and-quantity.on-quick-show select[name=current-product-variations]', function() {
    //     if ( this.value == "") {
    //         $('.product-quick-view-info .test-add-to-cart').css('display', 'none');
    //     }
    //     else {
    //         $('.product-quick-view-info .test-add-to-cart').css('display', 'inline-block');
    //     }
    // });
    // $('body').on('change', '.summary.entry-summary select[name=current-product-variations]', function() {
    //     if ( this.value == "") {
    //         $('.summary.entry-summary .test-add-to-cart').css('display', 'none');
    //     }
    //     else {
    //         $('.summary.entry-summary .test-add-to-cart').css('display', 'inline-block');
    //     }
    // });
    $('body').find('select[name=options-of-product]').each()
});

