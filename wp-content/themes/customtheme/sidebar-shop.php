<?php
$product_categories = get_terms(
	'product_cat',
	array(
		'hide_empty' => false,
	)
);
$current_cat        = get_term_by( 'name', single_cat_title( '', false ), 'product_cat' );

if ( $product_categories ) :?>
<div class="sidebar sidebar-menu">
	<h4 class="sidebar-menu__title"><a href="/shop">ФОТООБОИ</a></h4>
	<ul>
		<?php foreach ( $product_categories as $product_category ) : ?>
		<li
		<?php
		if ( ( $current_cat->slug === $product_category->slug ) ) :
			echo 'class="current-cat"';
		endif;
?>>
			<a href="<?php echo get_term_link( $product_category ); ?>"><?php echo $product_category->name; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php
endif;
?>
