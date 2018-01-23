<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$attachment_ids = $product->get_gallery_image_ids();
$attachment_id = array_shift($attachment_ids);
$gallery_image_link = wp_get_attachment_url( $attachment_id );

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
    <img class="product-image-on-shop" src="<?php the_post_thumbnail_url();?>" data-alt-src="<?php echo $gallery_image_link;?>" alt="">
    <div class="wallpapers__info">
        <div class="wallpapers__info-item wallpapers__title"><?php echo the_title(); ?></div>
        <div class="wallpapers__info-item">
            <a class="wallpapers__link" href="<?php the_permalink();?>" target="_blank">Show more</a>
        </div>
    </div>
	<?php woocommerce_template_loop_add_to_cart(); ?>
</li>
