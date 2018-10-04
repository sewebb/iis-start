<?php

/**
 * IIS Start config helper
 *
 * @param  string $keys the key to get the value for. Use dot notation for going deeper.
 * @return mixed     The value (if found) for the given key.
 */
function iis_start_config( $keys ) {
	$keys  = explode( '.', $keys );
	$value = include get_template_directory() . '/config.php';

	foreach ( $keys as $key ) {
		if ( isset( $value[ $key ] ) ) {
			$value = $value[ $key ];
		} else {
			$value = null;
			break;
		}
	}

	return $value;
}

/**
 * IIS Start img helper
 *
 * @param  string $img image path and filename
 * @return void Nothing to return, echoes the full URL to the given image
 */
function iis_start_img( $img ) {
	echo esc_url( get_stylesheet_directory_uri() . '/assets/img/' . $img );
}

/**
 * Cache return value of callback if not already cached and return the contents
 *
 * @param string   $cache_key  The name of the cached content
 * @param int      $cache_time How long the content should be cached
 * @param callable $callback   The callback that returns the content that should be cached
 * @return mixed|null
 */
function iis_start_remember( $cache_key, $cache_time, $callback ) {
	$content = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? false : get_transient( $cache_key );

	if ( ! $content ) {
		$content = $callback();
		set_transient( $cache_key, $content, $cache_time );
	}

	return $content;
}
