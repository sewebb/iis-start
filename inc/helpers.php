<?php

/**
 * IIS Start config helper
 *
 * @param  str $keys the key to get the value for. Use dot notation for going deeper.
 * @return mixed     The value (if found) for the given key.
 */
function iis_start_config( $keys ) {
	$iis_start_config = include 'config.php';
	$keys             = explode( '.', $keys );
	$value            = $iis_start_config;

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
 * @param  str $img image path and filename
 * @return void Nothing to return, echoes the full URL to the given image
 */
function iis_start_img( $img ) {
	echo esc_url( get_stylesheet_directory_uri() . '/assets/img/' . $img );
}
