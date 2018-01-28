<?php $product_id  = intval( $_POST['data_productid'] );
$product_object = wc_get_product( $product_id );
$image_src = get_the_post_thumbnail_url( $product_id );?>
<img class="product-image-on-shop quick-view" src="<?php echo wp_get_attachment_url( $product_object->get_image_id() );?>" alt="">
<div class="product-quick-view-info">
    <div class="product-quick-view-info-item product-shop-title"><?php echo $product_object->get_title(); ?></div>
    <div class="product-quick-view-info-price">
        <?php echo $product_object->get_price_html();?>
    </div>
    <div class="product-quick-view-info-description">
        <?php echo $product_object->get_description();?>
    </div>
</div>

