<?php
/**
 * The template for displaying archive pages
 *
 * @package Wordpress
 * @since 1.0
 */
get_header();
?>
<div class="container">

	<?php if ( is_active_sidebar( 'sidebar-premium_landing' ) ): ?>
		<div class="sidebar-premium_landing">
			<?php dynamic_sidebar( 'sidebar-premium_landing' ); ?>
		</div>
	<?php endif; ?>

<?php get_footer('discussion'); ?>
