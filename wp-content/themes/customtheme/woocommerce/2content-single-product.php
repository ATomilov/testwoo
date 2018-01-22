<?php
global $product;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 return;
	 }
?>

<!-- begin wrap  -->
    <div class="wrap">
        <!-- begin container  -->
        <div class="content container">

            <!-- begin breadcrumbs  -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="">Главная</a></li>
                    <li><a href="">Каталог</a></li>
                    <li><a href="">Города, улицы</a></li>
                    <li>Карловы Вары, Чехия</li>
                </ul>
            </div>
            <!-- end breadcrumbs -->

            <!-- begin sidebar  -->
            <?php  do_action( 'woocommerce_sidebar' ); ?>
            <!-- end sidebar -->

            <!-- begin product  -->
            <div class="product content">
                <div class="product__image">
                    <img src="<?php the_post_thumbnail_url();?>" alt="">
                </div>
                <div class="product__title"><?php echo the_title(); ?></div>
                <div class="product__container group">
                    <button class="btn btn_blue product__btn-like" type="button">Нравится этот товар</button>
                    <a class="btn product__btn-manual" href="">Инструкция по оклейке</a>
                    <div class="social-menu social-menu_product">
                        <span class="social-menu__title">Поделиться</span>
                        <ul>
                            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/vk.png" alt=""></a></li>
                            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/f.png" alt=""></a></li>
                            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/ok.png" alt=""></a></li>
                            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt=""></a></li>
                            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/google.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-items">
                    <div class="product__item action">
                        <div class="product__article">Артикул: <?php echo $product->get_sku(); ?></div>
                        <div class="product__size">Размер: <?php echo $product->get_dimensions(); ?> </div>
                        <div class="product__number-bands">Количество полос: 1</div>
                        <div class="product__price"><?php echo $product->get_price(); ?> руб.</div>
                        <a class="btn_blue product__btn-buy" href="">Купить</a>
                    </div>
                </div>
            </div>
            <!-- end product -->
        </div>
        <!-- end container -->


        <!-- begin why  -->
        <?php wc_get_template( 'template-why-block.php' ); ?>
        <!-- end why -->

        <!-- begin info  -->
        <?php wc_get_template( 'template-footer-info.php' ); ?>
    </div>
    <!-- end wrap -->
	<?php get_footer( 'shop' ); ?>
