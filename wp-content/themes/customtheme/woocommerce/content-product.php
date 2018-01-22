<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="wallpapers__item">
	<?php woocommerce_template_loop_add_to_cart(); ?>
	 <img src="<?php the_post_thumbnail_url();?>" alt="">
	 <div class="wallpapers__info">
			 <div class="wallpapers__info-item wallpapers__title"><?php echo the_title(); ?></div>
			 <div class="wallpapers__info-item">
					 <a class="wallpapers__link" href="<?php the_permalink();?>" target="_blank">Посмотреть</a>
			 </div>
	 </div>
</div>
