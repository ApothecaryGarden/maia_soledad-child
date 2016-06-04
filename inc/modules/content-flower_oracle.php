<?php
/**
 * Template loop for overlay style
 */
?>
<section class="grid-style grid-overlay flower-oracle-home">
	<div class="flower-oracle-home-left">
		<div class="fohl-inner">
		<?php
			echo wpautop( maiatoll_get_option( 'flower_oracle_home_left' ) );
		?>
		</div>
	</div>
	<article id="post-<?php the_ID(); ?>" class="item overlay-layout flower-oracle-home-right">
		<div class="penci-overlay-over">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="thumbnail">
					<?php the_post_thumbnail( 'penci-magazine-slider' ); ?>
				</div>
			<?php endif; ?>

			<a class="overlay-border" href="<?php the_permalink() ?>"></a>

			<div class="overlay-header-box">
				<?php if ( ! get_theme_mod( 'penci_grid_cat' ) ) : ?>
					<span class="cat"><?php penci_category( '' ); ?></span>
				<?php endif; ?>

				<h2 class="overlay-title"><?php the_title(); ?></h2>

				<div class="overlay-author"><span class="author-italic"><?php the_excerpt(); ?></span></div>
				<a href="<?php the_permalink(); ?>">Continue reading &#8594;</a>
			</div>
		</div>
	</article>
</section>