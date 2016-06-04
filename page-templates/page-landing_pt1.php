<?php
/**
 * Template Name: Landing PT1
 *
 * @package Wordpress
 * @since 1.0
 */
?>
<?php if ( 'header_no_menu' == get_post_meta( get_the_ID(), '_maialpt_header', true ) ) : ?>
	<?php get_header( 'no_menu' ); ?>
<?php else : ?>
	<?php get_header(); ?>
<?php endif; ?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('content', 'page'); ?>
	<?php endwhile; endif; ?>

<?php if ( 'footer_ig_soc_bot' == 	get_post_meta( get_the_ID(), '_maialpt_footer', true ) ) : ?>
	<?php get_footer( 'basic' ); ?>
<?php elseif ( 'footer_soc_bot' == 	get_post_meta( get_the_ID(), '_maialpt_footer', true ) ) : ?>
	<?php get_footer( 'basic_2' ); ?>
<?php elseif ( 'footer_bot' == 		get_post_meta( get_the_ID(), '_maialpt_footer', true ) ) : ?>
	<?php get_footer( 'basic_3' ); ?>
<?php else : ?>
	<?php get_footer(); ?>
<?php endif;