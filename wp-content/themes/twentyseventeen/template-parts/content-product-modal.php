<?php
$current_post_product    = new WP_Query(array(
        'p' => intval( $_POST['data_productid'] ),
        'post_type' => 'product'
    )
);
$current_product = wc_get_product( intval( $_POST['data_productid'] ) );
//var_dump( $current_product->get_attributes() );
$current_product_attributes = $current_product->get_attributes();
$variation_attributes =  $current_product->get_variation_attributes();
$product_variations = $current_product->get_available_variations();
//var_dump($product_variations);

//foreach ( $current_product_attributes as $key_attr => $value_attr ) : ?>
<?php //echo wc_attribute_label( $value_attr['name']) . " "; ?>
<?php //$attribute_values = get_the_terms( $current_product->get_id(), $value_attr['name'] ); ?>
<!--<select class="options-of-product" name="options-of-product">-->
<!--    --><?php //foreach ( $attribute_values as $attribute_value ) : ?>
<!--        --><?php //foreach ( $product_variations as $key_variation => $value_variation ) : ?>
<!--            --><?php //if ( in_array( $attribute_value->slug, $value_variation['attributes'] ) ) : ?>
<!--                --><?php //if ( ! in_array( $value_variation['variation_id'], $available_variations_ids ) ) : ?>
<!--                    --><?php //$available_variations_ids[] = $value_variation['variation_id'];?>
<!--                --><?php //endif;?>
<!--            --><?php //endif;?>
<!--        --><?php //endforeach;?>
<!--        <option value="--><?php //echo $attribute_value->slug;?><!--" variationId="--><?php //echo $attribute_value->term_id;?><!--">--><?php //echo $attribute_value->name;?><!--</option>-->
<!--    --><?php //endforeach; ?>
<!--</select>-->
<?php //endforeach;?>
<?php ////var_dump($available_variations_ids);?>

<?php while ( $current_post_product->have_posts() ) : $current_post_product->the_post();?>

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
            <?php if ( $current_product->is_type( 'variable' ) ) : ?>
<!--                <div class="options-and-quantity on-quick-show">-->
<!--                    --><?php //foreach ( $current_product->get_attributes() as $key_attr => $value_attr ) :?>
<!--                    <select name="current-product-variations">-->
<!--                        <option value="">Choose an option</option>-->
<!--                        --><?php //foreach ( $product_variation as $key_opt => $value_opt ) :
//                            $meta = get_post_meta($value_opt['variation_id'], 'attribute_'.$value_attr['name'], true);
//                            $term = get_term_by('slug', $meta, $value_attr['name']);?>
<!--                            <option value="--><?php //echo $value_opt['attributes']['attribute'.$value_attr['name']];?><!--" data-currentVariationId="--><?php //echo $value_opt['variation_id'];?><!--">--><?php //echo $term->name ." ". $value_opt['price_html'];?><!--</option>-->
<!--                        --><?php //endforeach;?>
<!--                    </select>-->
<!--                    --><?php //endforeach;?>
<!--                    <input type="number" name="quantity-product" id="current-product-quantity" value="1">-->
<!--                </div>-->
<!--                <a href="" class="button test-add-to-cart">Add to cart</a>-->
            <?php endif;?>
        </div>

<?php endwhile;?>

