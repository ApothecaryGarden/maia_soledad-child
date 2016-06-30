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
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '367652926691662');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=367652926691662&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
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
<a id="close-sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>"><i class="fa fa-close"></i></a>

<nav id="sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>">

		<div id="sidebar-nav-logo">
			<?php if ( $wcl ) : ?>
				<a href="<?php echo esc_url( get_permalink( maiatoll_get_option( 'maiatoll_hub_page' ) ) ); ?>"><?php echo wp_get_attachment_image( maiatoll_get_option( 'wc_sidebar_logo_id' ), 'full' ); ?></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_mobile_nav_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php endif; ?>
		</div>

		<div class="header-social sidebar-nav-social">
			<?php include( trailingslashit( get_template_directory() ). 'inc/modules/socials.php' ); ?>
		</div>

	<?php
	/**
	 * Display main navigation
	 */
	if ( $wcl ) {
		wp_nav_menu( array(
			'container'      => false,
			'theme_location' => 'wc-menu',
			'menu_class'     => 'menu',
			'fallback_cb'    => 'penci_menu_fallback',
			'walker'         => new penci_menu_walker_nav_menu()
		) );
	} else {
		wp_nav_menu( array(
			'container'      => false,
			'theme_location' => 'mobile-menu',
			'menu_class'     => 'menu',
			'fallback_cb'    => 'penci_menu_fallback',
			'walker'         => new penci_menu_walker_nav_menu()
		) );
	}
	?>
</nav>

<!-- .wrapper-boxed -->
<div class="wrapper-boxed header-style-<?php echo esc_attr( $header_layout ); ?><?php if ( get_theme_mod( 'penci_body_boxed_layout' ) ) : echo ' enable-boxed'; endif;?>">

<!-- Top Bar -->
<?php if( get_theme_mod( 'penci_top_bar_show' ) ): ?>
	<?php get_template_part( 'inc/modules/topbar' ); ?>
<?php endif; ?>

<header id="header" class="header-<?php echo esc_attr( $header_layout ); ?><?php if( ( ( ! is_home() || ! is_front_page() ) && ! get_theme_mod( 'penci_featured_slider_all_page' ) ) || ( ( is_home() || is_front_page() ) && ! get_theme_mod( 'penci_featured_slider' ) ) ): ?> has-bottom-line<?php endif;?>"><!-- #header -->
	<div class="inner-header">
		<div class="container<?php if( !$wcl ): if( $header_layout == 'header-3' ): echo ' align-left-logo'; if( get_theme_mod( 'penci_header_3_banner' ) || get_theme_mod( 'penci_header_3_adsense' ) ): echo ' has-banner'; endif; endif; endif; ?>">

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
			<div class="button-menu-mobile <?php echo esc_attr( $header_layout ); ?>"><i class="fa fa-bars"></i></div>
			<?php
			/**
			 * Display main navigation
			 */
			if ( $wcl ) {
				wp_nav_menu( array(
					'container'      => false,
					'theme_location' => 'wc-menu',
					'menu_class'     => 'menu',
					'fallback_cb'    => 'penci_menu_fallback',
					'walker'         => new penci_menu_walker_nav_menu()
				) );
			} else {
				wp_nav_menu( array(
					'container'      => false,
					'theme_location' => 'main-menu',
					'menu_class'     => 'menu',
					'fallback_cb'    => 'penci_menu_fallback',
					'walker'         => new penci_menu_walker_nav_menu()
				) );
			}
			?>

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

			<div id="top-search">
				<a class="search-click"><i class="fa fa-search"></i></a>
				<div class="show-search">
					<?php get_search_form(); ?>
					<a class="search-click close-search"><i class="fa fa-close"></i></a>
				</div>
			</div>
		</div>
	</nav><!-- End Navigation -->
</header>
<!-- end #header -->

<?php
/**
 * Get feature slider
 */
/*
if( is_home() || is_front_page() || get_theme_mod( 'penci_featured_slider_all_page' ) ) {
	if( get_theme_mod( 'penci_enable_featured_video_bg' ) && get_theme_mod( 'penci_featured_video_url' ) ) {
			get_template_part( 'inc/featured_slider/featured_video' );
	} else {
		if ( get_theme_mod( 'penci_featured_slider' ) == true ) :
			if( get_theme_mod( 'penci_featured_slider_style' ) == 'style-6' ) {
				get_template_part( 'inc/featured_slider/magazine_slider' );
			} elseif ( get_theme_mod( 'penci_featured_slider_style' ) == 'style-8' ) {
				get_template_part( 'inc/featured_slider/magazine_slider_2' );
			} elseif ( get_theme_mod( 'penci_featured_slider_style' ) == 'style-9' ) {
				get_template_part( 'inc/featured_slider/magazine_slider_3' );
			} elseif( get_theme_mod( 'penci_featured_slider_style' ) == 'style-4' || get_theme_mod( 'penci_featured_slider_style' ) == 'style-5' ) {
				get_template_part( 'inc/featured_slider/featured_penci_slider' );
			} else {
				get_template_part( 'inc/featured_slider/featured_slider' );
			}
		endif;
	}
}
*/
if( is_home() || is_front_page() || get_theme_mod( 'penci_featured_slider_all_page' ) ) : ?>
<div class="home-jumbo">
	<div class="jumbo-content">
	<h2 class="jumbo-title"><a href="//maiatoll.com/take-the-quiz/">
	<span>The world is noisy. </span>Your inner-voice is not.</a></h2>
	<p class="jumbo-caption">Listen. Learn. Declare self-sovereignty.</p>
	<div class="jumbo-button"><a class="pencislider-button" href="//maiatoll.com/take-the-quiz/">get started now! &gt;</a></div>
	</div>
</div>
<?php endif;
