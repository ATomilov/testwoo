<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div id="myModal" class="modal">
    <div class="modal-content-container">
        The product has been added to cart!
    </div>
</div>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary" data-singlePageProductId="<?php the_ID();?>">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
        <?php
        $current_product = wc_get_product( get_the_ID() );
        if ( $current_product->is_type( 'variable' ) ) :
        $product_variation = $current_product->get_available_variations();?>
            <div class="options-and-quantity">
                <select name="current-product-variations">
                    <option value="">Choose an option</option>
                    <?php foreach ( $product_variation as $key => $value ) :
                        $meta = get_post_meta($value['variation_id'], 'attribute_pa_color', true);
                        $term = get_term_by('slug', $meta, 'pa_color');?>
                        <option value="<?php echo $value['attributes']['attribute_pa_color'];?>" data-currentVariationId="<?php echo $value['variation_id'];?>"><?php echo $term->name ." ". $value['price_html'];?></option>
                    <?php endforeach;?>
                </select>
                <input type="number" name="quantity-product" id="current-product-quantity" value="1">
            </div>
            <a href="" class="button test-add-to-cart">Add to cart</a>
        <?php else : ?>
            <input type="number" name="quantity-product" id="current-product-quantity" value="1">
            <a href="" class="button test-add-to-cart">Add to cart</a>
        <?php endif;?>
	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
