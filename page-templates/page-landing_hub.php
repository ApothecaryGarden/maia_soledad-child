<?php
/**
 * Template Name: Landing Hub
 *
 * @package Wordpress
 * @since 1.0
 */
?>
<?php get_header(); ?>

<div class="container">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('content', 'page'); ?>
	<?php endwhile; endif; ?>

	<?php $custom_footer = get_post_meta( get_the_ID(), '_maialpt_footer', true ); ?>
	<?php if ( 'footer_ig_soc_bot' == 	$custom_footer ) : ?>
		<?php get_footer( 'basic' ); ?>
	<?php elseif ( 'footer_soc_bot' == 	$custom_footer ) : ?>
		<?php get_footer( 'basic_2' ); ?>
	<?php elseif ( 'footer_bot' == 		$custom_footer ) : ?>
		<?php get_footer( 'basic_3' ); ?>
	<?php else : ?>
		<?php get_footer(); ?>
	<?php endif;
