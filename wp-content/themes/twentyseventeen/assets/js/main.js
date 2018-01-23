jQuery(document).ready(function($) {
    var sourceSwap = function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        $this.data('alt-src', $this.attr('src'));
        $this.attr('src', newSource);
    }

    // $(function () {
    //     $('img.product-image-on-shop').hover(sourceSwap);
    // });

    $('img.product-image-on-shop').hover(function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        var oldSource = $this.attr('src');
        $this.attr('src', newSource).fadeIn();
        $this.data('alt-src', oldSource).fadeIn();
    })
});
//
// $('div.test').hover(function () {
//     $(this).find('img').hide().attr('src', 'http://blog.stackoverflow.com/wp-content/uploads/StackExchangeLogo1.png').fadeIn(2000);
// }, function () {
//     $(this).find('img').fadeOut(2000,function(){
//         $(this).attr('src','http://londontechnologyweek.co.uk/assets/uploads/2014/06/Stack-Overflow-Logo.png').fadeIn();
//     });
// });

