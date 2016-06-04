<?php
/**
 * Template Name: My Account
 *
 * @package Wordpress
 * @since 1.0
 */
$sidebar_position = 'right-sidebar';
if( get_theme_mod( "penci_left_sidebar_posts" ) ) { $sidebar_position = 'left-sidebar'; }
?>
<?php get_header(); ?>
<div class="container penci_sidebar right-sidebar">
	<div id="main">
		<div class="theiaStickySidebar">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'page'); ?>
			<?php endwhile; endif; ?>
			<?php

			?>
		</div>
	</div>
	<?php if ( is_user_logged_in() ) : ?>
		<div id="sidebar">
			<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-my_account' ) ) ?>
		</div>
	<?php endif; ?>
<?php get_footer('basic');
