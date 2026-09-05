<?php
/**
 * Example wp-config — copy to wp-config.php and fill real values.
 * NEVER commit real wp-config.php (it is gitignored).
 */

define( 'DB_NAME', 'your_database_name' );
define( 'DB_USER', 'your_database_user' );
define( 'DB_PASSWORD', 'your_database_password' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         'generate-me-at-https://api.wordpress.org/secret-key/1.1/salt/' );
define( 'SECURE_AUTH_KEY',  'generate-me' );
define( 'LOGGED_IN_KEY',    'generate-me' );
define( 'NONCE_KEY',        'generate-me' );
define( 'AUTH_SALT',        'generate-me' );
define( 'SECURE_AUTH_SALT', 'generate-me' );
define( 'LOGGED_IN_SALT',   'generate-me' );
define( 'NONCE_SALT',       'generate-me' );

$table_prefix = 'wpsd_';

define( 'WP_DEBUG', false );

/* Optional local overrides: create wp-config-local.php (gitignored) */
if ( file_exists( __DIR__ . '/wp-config-local.php' ) ) {
	require __DIR__ . '/wp-config-local.php';
}

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
