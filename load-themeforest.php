<?php

get_themeforest_themes();

function get_themeforest_themes() {

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/popular:themeforest.json" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_USERAGENT, 'WordPress/wpthemetable' );

	$result = curl_exec( $ch );
	$data   = json_decode( $result );

	if ( $data ) {
		get_each_themeforest_theme( $data->popular->items_last_week );
	}

	curl_close( $ch );
}

function get_each_themeforest_theme( $popular_themes ) {

	$urls   = array();
	$themes = array();

	foreach ( $popular_themes as $theme ) {
		$urls[] = array(
			'url' => 'http://marketplace.envato.com/api/edge/item:' . $theme->id . '.json'
		);
	}

	$responses = multi( $urls, array( CURLOPT_USERAGENT => 'WordPress/wpthemetable' ) );

	foreach ( $responses as $response ) {
		if ( $response['error'] || $response['data'] === null ) {
			continue;
		}

		$theme = json_decode( $response['data'] );
		$theme = $theme->item;

		$themes[] = array(
			'name'       => $theme->item,
			'slug'       => $theme->id,
			'version'    => '',
			'author'     => $theme->user,
			'url'        => $theme->url,
			'downloaded' => $theme->sales,
			'commercial' => true,
			'platform'   => 'themeforest',
		);
	}

	file_put_contents( '_themeforest.json', json_encode( $themes ) );
}

/**
 * Simple wrapper function for concurrent request processing with PHP's cURL functions (i.e., using curl_multi* functions.)
 *
 * @see http://adamjonrichardson.com/2013/09/23/making-concurrent-curl-requests-using-phps-curl_multi-functions/
 *
 * @param array $requests Array containing request url, post_data, and settings.
 * @param array $opts     Optional array containing general options for all requests.
 *
 * @return array Array containing keys from requests array and values of arrays each containing data (response, null if response empty or error), info (curl info, null if error), and error (error string if there was an error, otherwise null).
 */
function multi( array $requests, array $opts = [ ] ) {
	// create array for curl handles
	$chs = [ ];
	// merge general curl options args with defaults
	$opts += [ CURLOPT_CONNECTTIMEOUT => 3, CURLOPT_TIMEOUT => 3, CURLOPT_RETURNTRANSFER => 1 ];
	// create array for responses
	$responses = [ ];
	// init curl multi handle
	$mh = curl_multi_init();
	// create running flag
	$running = null;
	// cycle through requests and set up
	foreach ( $requests as $key => $request ) {
		// init individual curl handle
		$chs[ $key ] = curl_init();
		// set url
		curl_setopt( $chs[ $key ], CURLOPT_URL, $request['url'] );
		// check for post data and handle if present
		if ( isset( $request['post_data'] ) ) {
			curl_setopt( $chs[ $key ], CURLOPT_POST, 1 );
			curl_setopt( $chs[ $key ], CURLOPT_POSTFIELDS, $request['post_array'] );
		}
		// set opts
		curl_setopt_array( $chs[ $key ], ( isset( $request['opts'] ) ? $request['opts'] + $opts : $opts ) );
		curl_multi_add_handle( $mh, $chs[ $key ] );
	}
	do {
		// execute curl requests
		curl_multi_exec( $mh, $running );
		// block to avoid needless cycling until change in status
		curl_multi_select( $mh );
		// check flag to see if we're done
	} while ( $running > 0 );
	// cycle through requests
	foreach ( $chs as $key => $ch ) {
		// handle error
		if ( curl_errno( $ch ) ) {
			$responses[ $key ] = [ 'data' => null, 'info' => null, 'error' => curl_error( $ch ) ];
		} else {
			// save successful response
			$responses[ $key ] = [
				'data'  => curl_multi_getcontent( $ch ),
				'info'  => curl_getinfo( $ch ),
				'error' => null
			];
		}
		// close individual handle
		curl_multi_remove_handle( $mh, $ch );
	}
	// close multi handle
	curl_multi_close( $mh );

	// return response
	return $responses;
}
