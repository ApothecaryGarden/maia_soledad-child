<?php
/**
 * Template Name: Lounge
 *
 * @package Wordpress
 * @since 1.0
 */
get_header();
?>
<div class="container">
	<?php if ( is_active_sidebar( 'sidebar-luna_closed' ) && 'closed' === maiatoll_get_option( 'maiatoll_luna_lounge_free_open' ) ): ?>
		<div class="sidebar-luna_closed">
			<?php dynamic_sidebar( 'sidebar-luna_closed' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-luna_landing' ) && 'open' === maiatoll_get_option( 'maiatoll_luna_lounge_free_open' ) ): ?>
		<div class="sidebar-luna_landing">
			<?php dynamic_sidebar( 'sidebar-luna_landing' ); ?>
		</div>

	<?php endif; ?>

<?php get_footer('basic');
