jQuery(document).ready(function($) {
    $('img.product-image-on-shop').hover(function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        var oldSource = $this.attr('src');
        $this.attr('src', newSource);
        $this.data('alt-src', oldSource);
    });
    $(".test-add-to-cart").click(function (e) {
        e.preventDefault();
        var data_productid = $(this).closest('li.product').data('productid');
        $.ajax({
            url: twAjaxAddToCart.ajaxurl,
            method: 'post',
            data: {
                action: 'twAddToCart',
                data_productid: data_productid
            },
            success: function(response) {
                $('#myModal').fadeIn(500);
                $('.cart-header').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> (' + response + ')');
                $("#myModal").delay(1000).fadeOut();
            },
            error: function(response) {
                alert("Error");
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
                $('.modal-content-container.showmore-product > .modal-content').html(response);
                $('.modal.showmore-product').fadeIn(500);
            },
            error: function(response) {
                alert("Error");
            }

        });

    });
    $('.close-modal').click(function () {
        $('.modal.showmore-product').fadeOut();
        // setTimeout(function () {
        //     $('.modal-content-container.showmore-product > .modal-content').html("");
        // }, 500);
    });
});

