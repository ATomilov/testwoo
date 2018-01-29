<?php
$current_product    = new WP_Query(array(
        'p' => intval( $_POST['data_productid'] ),
        'post_type' => 'product'
    )
);
?>
<?php $product_id  = intval( $_POST['data_productid'] );
$product_object = wc_get_product( $product_id );
$image_src = get_the_post_thumbnail_url( $product_id );?>
<?php while ( $current_product->have_posts() ) : $current_product->the_post();?>
<!--<img class="product-image-on-shop quick-view" src="--><?php //echo wp_get_attachment_url( $product_object->get_image_id() );?><!--" alt="">-->
<!--<div class="product-quick-view-info">-->
<!--    <div class="product-quick-view-info-item product-shop-title">--><?php //the_title(); ?><!--</div>-->
<!--    --><?php //if ( wc_get_price_to_display() ) : ?>
<!--    <div class="product-quick-view-info-price">-->
<!--        --><?php //echo wc_get_price_to_display();?>
<!--    </div>-->
<!--    --><?php //endif;?>
<!--    --><?php //if ( $product_object->get_description() ) : ?>
<!--    <div class="product-quick-view-info-description">-->
<!--        --><?php //echo $product_object->get_description();?>
<!--    </div>-->
<!--    --><?php //endif;?>
<!--    --><?php //if ( $product_object->is_type( 'variable' ) ) : ?>
<!--    --><?php //$tickets = new WC_Product_Variable( $product_id);
//        $variables = $tickets->get_available_variations();
//        echo $variables;?>
<!--    --><?php //endif;?>
<!--</div>-->
<?php include('quick-show-product.php');?>
<?php endwhile;?>

