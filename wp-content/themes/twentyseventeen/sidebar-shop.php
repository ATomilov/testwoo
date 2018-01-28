<?php
/**
 * The Shop Sidebar containing Widget areas for Shop Page.
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */
?>
<?php if ( is_active_sidebar( 'custom-left-side-bar' ) && is_archive() ) : ?>

    <div id="custom-left-side-bar" class="sidebar">

		<?php dynamic_sidebar( 'custom-left-side-bar' ); ?>

    </div>

<?php endif; ?>