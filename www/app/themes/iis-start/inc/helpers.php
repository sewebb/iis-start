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
