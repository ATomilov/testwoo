<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<div class="wrap">
		<div class="content container">
			<?php woocommerce_breadcrumb(); ?>
			<?php do_action( 'woocommerce_sidebar' ); ?>
			<div class="content ">
				<h1 class="title"><span><?php woocommerce_page_title(); ?></span></h1>
				<div class="wallpapers__category">
									<?php if ( have_posts() ) : ?>
										<?php
										while ( have_posts() ) :
											the_post();
					?>
											<?php wc_get_template_part( 'content', 'product' ); ?>
										<?php endwhile; // end of the loop. ?>
									<?php endif; ?>
				</div>
			</div>
		</div>
		<?php wc_get_template( 'template-why-block.php' ); ?>
	</div>

<?php get_footer( 'shop' ); ?>
