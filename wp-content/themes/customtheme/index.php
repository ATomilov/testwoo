<?php get_header( 'shop' );
$posts                 = get_posts(
	array(
		'numberposts' => 6,
		'post_type'   => 'product',
		'meta_query'  => array(
			array(
				'key'     => 'popular_product',
				'value'   => '1',
				'compare' => '==',
			),
		),
	)
);
?>
  <div class="wrap">
		<?php
		$slider_images = get_field( 'slider_on_home_page', 'option' );
		if ( $slider_images ) :
	?>
			<div class="owl-carousel owl-theme">
			<?php foreach ( $slider_images as $slider_image ) : ?>
		  <div class="item"><img src="<?php echo $slider_image['url']; ?>"alt="slide"></div>
	    <?php endforeach; ?>
			</div>
	<?php endif; ?>
	<?php if ( $posts ) : ?>
		<h1 class="title"><span>популярные фотообои</span></h1>
		<div class="wallpapers container">
		<?php
		foreach ( $posts as $post ) :
			setup_postdata( $post );
				?>
				<div class="wallpapers__item">
					 <img src="<?php the_post_thumbnail_url(); ?>" alt="">
					 <div class="wallpapers__info">
							 <div class="wallpapers__info-item wallpapers__title"><?php echo the_title(); ?></div>
							 <div class="wallpapers__info-item">
									 <a class="wallpapers__link" href="<?php the_permalink(); ?>" target="_blank">Посмотреть</a>
							 </div>
					 </div>
				</div>
				<?php endforeach; ?>
		</div>
	<?php endif; ?>
  <div class="wallpapers container">
    <a class="go-directory" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">Перейти в каталог</a>
  </div>
		<?php wc_get_template( 'template-why-block.php' ); ?>
	</div>
<?php get_footer( 'shop' ); ?>
