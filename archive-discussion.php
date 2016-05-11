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

	<?php if ( is_active_sidebar( 'sidebar-discussion_landing' ) ): ?>
		<div class="sidebar-discussion_landing">
			<?php dynamic_sidebar( 'sidebar-discussion_landing' ); ?>
		</div>
	<?php endif; ?>

<?php get_footer('discussion'); ?>
