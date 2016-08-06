<?php
add_action( 'widgets_init', 'maia_luna_widgets_init' );
function maia_luna_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Luna Landing Area', 'theme-slug' ),
        'id' => 'sidebar-luna_landing',
        'description' => __( 'For when the lounge is open', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'maia_luna_closed_widgets_init' );
function maia_luna_closed_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Luna Closed', 'theme-slug' ),
        'id' => 'sidebar-luna_closed',
        'description' => __( 'For when the lounge is closed', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'maia_premium_widgets_init' );
function maia_premium_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Premium Landing Area', 'theme-slug' ),
        'id' => 'sidebar-premium_landing',
        'description' => __( 'Something cool', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'maia_account_widgets_init' );
function maia_account_widgets_init() {
    register_sidebar( array(
        'name' => __( 'My Account', 'theme-slug' ),
        'id' => 'sidebar-my_account',
        'description' => __( 'Something cool', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'maia_hub_widgets_init' );
function maia_hub_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Hub', 'theme-slug' ),
        'id' => 'sidebar-hub',
        'description' => __( 'Something cool', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}
add_action( 'after_setup_theme', 'oak_childtheme_setup' );

function oak_childtheme_setup() {

    // Register navigation menu
    register_nav_menus( array(
        'mobile-menu'   => 'Mobile Menu',
        'wc-menu' => 'WC Menu'
    ) );

}


/**
 * Sensei Support
 */
global $woothemes_sensei;
if( $woothemes_sensei ) {
remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );
}
add_action( 'sensei_before_main_content', 'oakwood_sensei_custom_wrapper_start', 10 );
function oakwood_sensei_custom_wrapper_start() {
	echo '<div class="container penci_sidebar right-sidebar"><div id="main"><div class="theiaStickySidebar">';
}
add_action( 'sensei_after_main_content', 'oakwood_sensei_custom_wrapper_end', 10 );
function oakwood_sensei_custom_wrapper_end() {
	echo '</div></div>';
}
add_action( 'after_setup_theme', 'oakwood_sensei_support' );
function oakwood_sensei_support() {
    add_theme_support( 'sensei' );
}

add_filter( 'body_class', 'mtoll_witchcamp_body_class' );
function mtoll_witchcamp_body_class( $classes ) {
    global $post;
    if ( 'lounge' === get_post_type( $post->ID )
        || 'premium' === get_post_type( $post->ID )
        || $post->ID == maiatoll_get_option( 'maiatoll_hub_page' ) ) {
        $classes[] = 'mtoll-witchcamp';
    }

    // return the $classes array
    return $classes;
}

function penci_comments_template( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        <div class="thecomment">
            <div class="author-img">
                <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <div class="comment-text">
                <span class="author"><?php echo get_comment_author_link(); ?></span>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><i class="icon-info-sign"></i> <?php esc_html_e( 'Your comment awaiting approval', 'soledad' ); ?></em>
                <?php endif; ?>
                <div class="comment-content"><?php comment_text(); ?></div>
                <span class="reply">
                    <?php comment_reply_link( array_merge( $args, array(
                        'reply_text' => esc_html__( 'Reply', 'soledad' ),
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                    ) ), $comment->comment_ID ); ?>
                    <?php edit_comment_link( esc_html__( 'Edit', 'soledad' ) ); ?>
                </span>
            </div>
        </div>
<?php
}

// Remove customizer output, add to css file, enqueue fonts
add_action( 'after_setup_theme', 'remove_penci_customizer' );
function remove_penci_customizer(){
    remove_action( 'wp_head', 'pencidesign_customizer_css' );
}

function is_mtoll() {
    $options = get_option( 'maiatoll_options' );
    $is = $options['where_am_i'];
    if ( 'mt' == $is ) {
        return true;
    }
    return false;
}

function is_wcamp() {
    $options = get_option( 'maiatoll_options' );
    $is = $options['where_am_i'];
    if ( 'wc' == $is ) {
        return true;
    }
    return false;
}
