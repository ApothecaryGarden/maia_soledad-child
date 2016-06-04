<?php
/**
 * Template Name: Landing Hub
 *
 * @package Wordpress
 * @since 1.0
 */
?>
<?php get_header(); ?>

<div class="container penci_sidebar left-sidebar">
	<div id="main">
		<div class="theiaStickySidebar">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'page'); ?>
			<?php endwhile; endif; ?>
			<?php

			?>
		</div>
	</div>
	<div id="sidebar">
		<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-hub' ) ) ?>
	</div>
<?php get_footer('basic');
