<?php
/**
 * Header search endpoint.
 */

add_action( 'wp_ajax_romonet_header_search', 'romonet_header_search' );
add_action( 'wp_ajax_nopriv_romonet_header_search', 'romonet_header_search' );

function romonet_header_search() {
	check_ajax_referer( 'romonet_header_search', 'nonce' );

	$query = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';
	$query = trim( $query );

	if ( strlen( $query ) < 2 ) {
		wp_send_json_success( array( 'results' => array() ) );
	}

	$search = new WP_Query(
		array(
			'post_type'           => 'any',
			'post_status'         => 'publish',
			's'                   => $query,
			'posts_per_page'      => 8,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);

	$results = array();

	foreach ( $search->posts as $post ) {
		$results[] = array(
			'id'      => $post->ID,
			'title'   => get_the_title( $post ),
			'excerpt' => wp_trim_words( wp_strip_all_tags( get_the_excerpt( $post ) ), 18 ),
			'type'    => get_post_type_object( $post->post_type )->labels->singular_name,
			'url'     => get_permalink( $post ),
		);
	}

	wp_send_json_success( array( 'results' => $results ) );
}
