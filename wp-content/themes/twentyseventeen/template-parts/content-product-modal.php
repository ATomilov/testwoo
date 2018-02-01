<?php
$current_post_product    = new WP_Query(array(
        'p' => intval( $_POST['data_productid'] ),
        'post_type' => 'product'
    )
);
$current_product = wc_get_product( intval( $_POST['data_productid'] ) );
?>
<?php while ( $current_post_product->have_posts() ) : $current_post_product->the_post();?>
    <?php $product_types = get_the_terms(get_the_ID(), 'product_type');
    $product_type = array_shift( $product_types );
    $product_variation = $current_product->get_available_variations();
//    var_dump($product_variation);
?>
        <img class="product-image-on-shop quick-view" src="<?php the_post_thumbnail_url();?>" alt="">
        <div class="product-quick-view-info" data-productQuickShowId="<?php the_ID();?>">
        <div class="product-quick-view-info-item product-shop-title">
            <?php the_title(); ?>
        </div>

            <div class="product-quick-view-info-price">
                <?php woocommerce_template_single_price();?>
            </div>
            <?php if ( the_content() ) : ?>
            <div class="product-quick-view-info-description">
                <?php the_content();?>
            </div>
            <?php endif;?>
            <?php if ( $product_type->slug =='variable' ) : ?>
                <select name="current-product-variations">
                    <option value="">Choose an option</option>
                    <?php foreach ( $product_variation as $key => $value ) :
                        $meta = get_post_meta($value['variation_id'], 'attribute_pa_color', true);
                        $term = get_term_by('slug', $meta, 'pa_color');?>
                        <option value="<?php echo $value['attributes']['attribute_pa_color'];?>" data-currentVariationId="<?php echo $value['variation_id'];?>"><?php echo $term->name;?></option>
                    <?php endforeach;?>
                </select>
                <input type="number" name="quantity-product" id="current-product-quantity">
                <a href="" class="button add-to-cart quick-show">Add to cart</a>
            <?php endif;?>
        </div>

<?php endwhile;?>

