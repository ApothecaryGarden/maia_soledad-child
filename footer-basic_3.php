<?php
/**
 * This is footer template of Soledad theme
 *
 * @package Wordpress
 * @since   1.0
 */
?>
<!-- END CONTAINER -->
</div>
<div class="clear-footer"></div>

<?php if ( get_theme_mod( 'penci_sidebar_sticky' ) ): echo '<div id="penci-end-sidebar-sticky"></div>'; endif; ?>

<footer id="footer-section">
	<div class="container">
		<?php if ( ( get_theme_mod( 'penci_footer_logo' ) && ! get_theme_mod( 'penci_hide_footer_logo' ) ) || get_theme_mod( 'penci_footer_copyright' ) || ! get_theme_mod( 'penci_go_to_top' ) ) : ?>
			<div class="footer-logo-copyright<?php if ( ! get_theme_mod( 'penci_footer_logo' ) || get_theme_mod( 'penci_hide_footer_logo' ) ) : echo ' footer-not-logo'; endif; ?><?php if ( get_theme_mod( 'penci_go_to_top' ) ) : echo ' footer-not-gotop'; endif; ?>">
				<?php if ( get_theme_mod( 'penci_footer_logo' ) && ! get_theme_mod( 'penci_hide_footer_logo' ) ) : ?>
					<div id="footer-logo">
						<a href="<?php echo esc_url( home_url('/') ); ?>">
							<img src="<?php echo esc_url( get_theme_mod( 'penci_footer_logo' ) ); ?>" alt="<?php esc_html_e( 'Footer Logo', 'soledad' ); ?>" />
						</a>
					</div>
				<?php endif; ?>

				<?php if( get_theme_mod( 'penci_footer_menu' ) ): ?>
					<div class="footer-menu-wrap">
					<?php
					/**
					 * Display main navigation
					 */
					wp_nav_menu( array(
						'container'      => false,
						'theme_location' => 'footer-menu',
						'menu_class'     => 'footer-menu'
					) );
					?>
					</div>
				<?php endif; /* End check if enable footer menu */?>

				<?php if ( get_theme_mod( 'penci_footer_copyright' ) ) : ?>
					<div id="footer-copyright">
						<p><?php echo wp_kses( get_theme_mod( 'penci_footer_copyright' ), penci_allow_html() ); ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_go_to_top' ) ) : ?>
					<div class="go-to-top-parent"><a href="#" class="go-to-top"><span><i class="fa fa-angle-up"></i><br><?php esc_html_e( 'Back To Top', 'soledad' ); ?></span></a></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</footer>

</div><!-- End .wrapper-boxed -->

<div id="fb-root"></div>

<?php wp_footer(); ?>
</body>
</html>