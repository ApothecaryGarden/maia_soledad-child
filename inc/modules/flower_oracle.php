<?php
// WP_Query arguments
$args = array (
	'post_type'              => array( 'flower-oracle' ),
	'posts_per_page'         => '1',
	'orderby'                => 'rand',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something
		include( locate_template( 'inc/modules/content-flower_oracle.php' ) );
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
