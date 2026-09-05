<?php
/**
 * Responsive styles for RBO blog listing + single posts.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$is_blog = is_singular( 'post' ) || is_home() || is_category() || is_tag() || is_author() || is_date() || ( is_page() && get_queried_object_id() === (int) get_option( 'page_for_posts' ) );
		if ( ! $is_blog && ! is_front_page() ) {
			// Still load tiny header fix globally so CTA never clips on any page.
			$is_blog = true;
		}

		$u = wp_upload_dir();
		$f = trailingslashit( $u['basedir'] ) . 'rbo-blog-responsive.css';
		if ( ! file_exists( $f ) ) {
			return;
		}
		wp_enqueue_style(
			'rbo-blog-responsive',
			trailingslashit( $u['baseurl'] ) . 'rbo-blog-responsive.css',
			array(),
			filemtime( $f )
		);
	},
	30
);
