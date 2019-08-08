<?php

$root_dir = dirname( __DIR__ );
$webroot_dir = $root_dir . '/www';
$dotenv = new Dotenv\Dotenv( dirname( __DIR__ ) );

Env::init();

if ( file_exists( dirname( __DIR__ ) . '/.env' ) ) {
	$dotenv->load();
	$dotenv->required( [ 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL' ] );
} else {
	die( 'Please create an .env file to continue' );
}

define( 'WP_DEBUG', env( 'DEBUG' ) );
define( 'WP_DEBUG_LOG', env( 'DEBUG' ) );
define( 'WP_HOME', env( 'WP_HOME' ) );
define( 'WP_SITEURL', env( 'WP_SITEURL' ) );
define( 'WP_ENV', env( 'WP_ENV' ) );

/**
 * DB settings
 */
define( 'DB_NAME', env( 'DB_NAME' ) );
define( 'DB_USER', env( 'DB_USER' ) );
define( 'DB_PASSWORD', env( 'DB_PASSWORD' ) );
define( 'DB_HOST', env( 'DB_HOST' ) ?: 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'CONTENT_DIR','/app' );
define( 'WP_CONTENT_DIR', $webroot_dir . '/app' );
define( 'WP_CONTENT_URL', WP_HOME . '/app' );

$table_prefix = env( 'DB_PREFIX' ) ?: 'wp_';

define( 'AUTH_KEY', env( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY', env( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY', env( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY', env( 'NONCE_KEY' ) );
define( 'AUTH_SALT', env( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', env( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT', env( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT', env( 'NONCE_SALT' ) );

define( 'DISALLOW_FILE_MODS', true );

/**
 * Theme specifics
 */
define( 'MAILCHIMP_USERNAME', env( 'MAILCHIMP_USERNAME' ) );
define( 'MAILCHIMP_API_KEY', env( 'MAILCHIMP_API_KEY' ) );
define( 'GRAPHTOOL_API', env( 'GRAPHTOOL_API' ) );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', $webroot_dir . '/wp/' );
}
