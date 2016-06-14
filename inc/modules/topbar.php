<?php
/**
 * Top bar template
 * Options for it in Customize > Top Bar Options & Colors For Top Bar
 *
 * @since 1.0
 */
?>
<div class="penci-top-bar">
	<div class="container">
		<div class="penci-headline">
			<div class="penci-topbar-social">
				<?php
					/**
					 * Display topbar menu
					 */
					wp_nav_menu( array(
						'container'      => false,
						'theme_location' => 'topbar-menu',
						'menu_class'     => 'penci-topbar-menu',
						'fallback_cb'    => 'wp_page_menu',
						'walker'         => ''
					) );
				?>
			</div>
		</div>
	</div>
</div>