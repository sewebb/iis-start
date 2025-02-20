<?php
/**
 * IIS Start functions and definitions
 *
 * @package iis-start
 */

use Internetstiftelsen\Theme;

Theme::init();

if ( ! function_exists( 'iis_start_setup' ) ) {
	/**
	 * IIS Start theme setup
	 * Hooked into the after_setup_theme hook
	 */
	function iis_start_setup() {
		load_theme_textdomain( 'iis-start', get_template_directory() . '/resources/languages' );
	}
}

add_action( 'after_setup_theme', 'iis_start_setup' );

/**
 * Register and enqueue scripts and styles based on the mix-manifest
 * generated by webpack
 */
function iis_start_assets() {
	iis_vite();
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
}

add_action( 'wp_enqueue_scripts', 'iis_start_assets' );

/**
 * For security reasons, remove the WordPress generator meta tag
 */
function remove_generator_filter() {
	return '';
}

$types = [ 'html', 'xhtml', 'atom', 'rss2', 'comment', 'export' ];

foreach ( $types as $generator_type ) {
	add_filter( 'get_the_generator_' . $generator_type, 'remove_generator_filter' );
}

add_filter(
	'iis_blocks_puff_taxonomies',
	function () {
		return 'post_tag';
	}
);

add_filter(
	'iis_blocks_puff_post_type',
	function () {
		return [ 'post', 'page' ];
	}
);

add_filter(
	'iis_render_submenu',
	function () {
		return ! is_page_template( 'no-submenu.php' );
	}
);

function iis_configure_bugsnag(): void {
	// phpcs:disable WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
	global $bugsnagWordpress;

	if ( ! isset( $bugsnagWordpress ) ) {
		return;
	}

	$bugsnagWordpress->setNotifyReleaseStages( [ 'stage', 'production' ] );
	$bugsnagWordpress->setReleaseStage( wp_get_environment_type() );
	// phpcs:enable WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
}

iis_configure_bugsnag();
