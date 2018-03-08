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
$i = 0;
$product_current_options = json_decode( stripslashes($_POST['data_valuesSelectOptions']) );
foreach ( $product_variations as $key_variation => $value_variation ) :
        if ( in_array( $product_current_options, $value_variation['attributes'] ) ) :
            echo $current_product_variation_id = $value_variation['variation_id']."<br>";
        endif;
endforeach;
var_dump($product_current_options);
//foreach ( $product_variations as $key_variation => $value_variation ) :
//        if ( in_array( $product_current_options, $value_variation['attributes'] ) ) :
//            echo $current_product_variation_id = $value_variation['variation_id'];
//        endif;
//endforeach;
?>



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
                <?php foreach ( $current_product_attributes as $key_attr => $value_attr ) : ?>
                    <?php echo wc_attribute_label( $value_attr['name']) . " "; ?>
                    <?php $attribute_values = get_the_terms( $current_product->get_id(), $value_attr['name'] ); ?>
                    <select class="available-options-of-product" id="option-of-product-<?php echo ++$i;?>">
                        <?php foreach ( $attribute_values as $attribute_value ) : ?>
                            <?php foreach ( $product_variations as $key_variation => $value_variation ) : ?>
                                <?php if ( in_array( $attribute_value->slug, $value_variation['attributes'] ) ) : ?>
                                    <?php if ( ! in_array( $value_variation['variation_id'], $available_variations_ids ) ) : ?>
                                        <?php $available_variations_ids[] = $value_variation['variation_id'];?>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach;?>
                            <option value="<?php echo $attribute_value->slug;?>" variationId="<?php echo $attribute_value->term_id;?>"><?php echo $attribute_value->name;?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endforeach;?>
<!--                    --><?php //var_dump($available_variations_ids);?>
                <a href="" class="button test-add-to-cart">Add to cart</a>
            <?php endif;?>
        </div>

<?php endwhile;?>

