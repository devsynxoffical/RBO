<?php
/**
 * Plugin Name: Localhost Performance Booster
 * Description: Short-circuits slow external API calls (Google, Trustindex, RankMath analytics, WordPress.org updates) to provide instant response times on localhost.
 */
add_filter( 'pre_http_request', function( $pre, $parsed_args, $url ) {
	if ( strpos( $url, 'localhost' ) !== false || strpos( $url, '127.0.0.1' ) !== false ) {
		return $pre;
	}
	return new WP_Error( 'http_request_blocked', 'External requests bypassed on localhost' );
}, 10, 3 );

// RankMath Abilities Settings Autoloader Fallback
spl_autoload_register( function( $class ) {
	$prefix = 'RankMath\\Abilities\\Settings\\';
	if ( strpos( $class, $prefix ) === 0 ) {
		$relative = substr( $class, strlen( $prefix ) );
		$file = dirname( __DIR__ ) . '/plugins/seo-by-rank-math/includes/abilities/settings/class-' . strtolower( str_replace( '_', '-', $relative ) ) . '.php';
		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
} );

