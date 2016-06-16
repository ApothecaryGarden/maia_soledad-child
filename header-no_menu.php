<?php
/**
 * The Header for our theme
 *
 * @package    WordPress
 * @since      1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( get_theme_mod( 'penci_favicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'penci_favicon' ) ); ?>" type="image/x-icon" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<style type="text/css">
		.featured-carousel .item { opacity: 1; }
	</style>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
/**
 * Get header layout in your customizer to change header layout
 *
 * @author PenciDesign
 */
$header_layout = get_theme_mod( 'penci_header_layout' );
if ( ! isset( $header_layout ) || empty( $header_layout ) ) {
	$header_layout = 'header-1';
}
global $post;
if ( 'lounge' === get_post_type( $post->ID )
	|| 'premium' === get_post_type( $post->ID )
	|| $post->ID == maiatoll_get_option( 'maiatoll_hub_page' ) ) {
	$wcl = true;
} else {
	$wcl = false;
}
?>
<!-- .wrapper-boxed -->
<div class="wrapper-boxed header-style-<?php echo esc_attr( $header_layout ); ?><?php if ( get_theme_mod( 'penci_body_boxed_layout' ) ) : echo ' enable-boxed'; endif;?>">
<header id="header" class="header-<?php echo esc_attr( $header_layout ); ?><?php if( ( ( ! is_home() || ! is_front_page() ) && ! get_theme_mod( 'penci_featured_slider_all_page' ) ) || ( ( is_home() || is_front_page() ) && ! get_theme_mod( 'penci_featured_slider' ) ) ): ?> has-bottom-line<?php endif;?>"><!-- #header -->
	<div class="inner-header">
		<div class="container<?php if( !$wcl): if( $header_layout == 'header-3' ): echo ' align-left-logo'; if( get_theme_mod( 'penci_header_3_banner' ) || get_theme_mod( 'penci_header_3_adsense' ) ): echo ' has-banner'; endif; endif; endif; ?>">

			<div id="logo">
				<?php if ( is_home() || is_front_page() ) : ?>
					<h1>
						<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					</h1>
				<?php else : ?>
					<h2>
					<?php if ( $wcl ) : ?>
						<a href="<?php echo esc_url( get_permalink( maiatoll_get_option( 'maiatoll_hub_page' ) ) ); ?>"><?php echo wp_get_attachment_image( maiatoll_get_option( 'wc_left_logo_id' ), 'full' ); ?></a>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php endif; ?>
					</h2>
				<?php endif; ?>
			</div>
			<?php if( ( get_theme_mod( 'penci_header_3_adsense' ) || get_theme_mod( 'penci_header_3_banner' ) ) && $header_layout == 'header-3' ): ?>
				<?php
				$banner_img = get_theme_mod( 'penci_header_3_banner' );
				$open_banner_url = '';
				$close_banner_url = '';
				if( get_theme_mod( 'penci_header_3_banner_url' ) ):
					$banner_url = get_theme_mod( 'penci_header_3_banner_url' );
					$open_banner_url = '<a href="'. esc_url( $banner_url ) .'" target="_blank">';
					$close_banner_url = '</a>';
				endif;
				?>
				<div class="header-banner header-style-3">
					<?php if( get_theme_mod( 'penci_header_3_adsense' ) ):  echo get_theme_mod( 'penci_header_3_adsense' ); endif; ?>
					<?php if( get_theme_mod( 'penci_header_3_banner' ) && ! get_theme_mod( 'penci_header_3_adsense' ) ): ?>
						<?php if ( $wcl ) : ?>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo wp_get_attachment_image( maiatoll_get_option( 'wc_right_logo_id' ), 'full' ); ?></a>
						<?php else : ?>
							<?php echo wp_kses( $open_banner_url, penci_allow_html() ); ?><img src="<?php echo esc_url( $banner_img ); ?>" alt="Banner" /><?php echo wp_kses( $close_banner_url, penci_allow_html() ); ?>
						<?php endif; ?>

					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- Navigation -->
	<nav id="navigation" class="header-layout-bottom <?php echo esc_attr( $header_layout ); ?>">
		<div class="container">
			<div id="mobile-logo">
				<?php if ( is_home() || is_front_page() ) : ?>
					<h1>
						<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					</h1>
				<?php else : ?>
					<?php if ( $wcl ) : ?>
						<a href="<?php echo esc_url( get_permalink( maiatoll_get_option( 'maiatoll_hub_page' ) ) ); ?>"><?php echo wp_get_attachment_image( maiatoll_get_option( 'wc_mobile_logo_id' ), array('0','58') ); ?></a>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php endif; ?>

				<?php endif; ?>
			</div>
		</div>
	</nav><!-- End Navigation -->
</header>
<!-- end #header -->

<?php
