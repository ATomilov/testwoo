<?php
$first_block_title = get_field( 'firs_block_title', 'option' );
?>
<div class="why">
	<div class="container">
		<?php if ( $first_block_title ) : ?>
		<div class="why__item"><?php echo $first_block_title; ?></div>
		<?php endif; ?>
		<?php if ( have_rows( 'other_blocks', 'option' ) ) : ?>
		<?php
		while ( have_rows( 'other_blocks', 'option' ) ) :
			the_row();
			$title_block     = get_sub_field( 'title_block', 'option' );
			$main_text_block = get_sub_field( 'main_text_block', 'option' );
			$image_block     = get_sub_field( 'image_block', 'option' );
			if ( $title_block && $main_text_block && $image_block ) :
				?>
			<div class="why__item">
				<div class="why__col"><img src="<?php echo $image_block; ?>"></div>
  			<div class="why__col">
  				<div class="why__title"><?php echo $title_block; ?></div>
  				<di class="why__content"><?php echo $main_text_block; ?></di >
  			</div>
			</div>
			<?php
		  endif;
      endwhile;
      endif;
?>
	</div>
</div>
