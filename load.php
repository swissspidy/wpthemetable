<?php

date_default_timezone_set( 'Europe/Zurich' );
error_reporting( 0 );

function sort_by_downloads( $a, $b ) {
	$a = (object) $a;
	$b = (object) $b;

	if ( $a->downloaded == $b->downloaded ) {
		return 0;
	}

	return ( $a->downloaded > $b->downloaded ) ? - 1 : 1;
}

function get_themes() {
	$today        = new DateTime( 'today', new DateTimeZone( 'Europe/Zurich' ) );
	$last_updated = DateTime::createFromFormat( 'Y-m-d', date( 'Y-m-d', filemtime( '_themes.json' ) ), new DateTimeZone( 'Europe/Zurich' ) );
	$themes       = file_get_contents( './_themes.json' );

	if ( $last_updated < $today || '' === $themes || ! file_exists( '_themes.json' ) ) {
		remote_get_themes();
	}

	return get_themes_from_cache();
}

function remote_get_themes() {
	$data = array(
		'action'  => 'query_themes',
		'request' => serialize( (object) array(
			'browse'   => 'popular',
			'per_page' => 108,
			'fields'   => array(
				'description'   => true,
				'compatibility' => false,
				'rating'        => true,
				'downloaded'    => true,
				'downloadlink'  => false,
				'last_updated'  => false,
				'homepage'      => false,
			)
		) )
	);

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, "http://api.wordpress.org/themes/info/1.0/" );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	$result = curl_exec( $ch );

	$data = unserialize( $result );

	foreach ( $data->themes as &$theme ) {
		$theme = array_map( function ( $data ) {
			return utf8_encode( $data );
		}, (array) $theme );
	}

	if ( $data !== false ) {
		file_put_contents( '_themes.json', json_encode( $data->themes ) );
	}

	curl_close( $ch );
}

remote_get_themes();

function get_themes_from_cache() {
	$wpdotorg    = file_get_contents( './_themes.json' );
	$themeforest = file_get_contents( './_themeforest.json' );

	$wpdotorg    = json_decode( $wpdotorg, true );
	$themeforest = json_decode( $themeforest, true );

	$both = array_merge(
		$wpdotorg ?? [],
		$themeforest ?? []
	);

	usort( $both, "sort_by_downloads" );

	return array_slice( $both, 0, 108 );
}

function get_element_name( $name ) {
	static $elements = array();

	// Remove unnecessary characters
	$name = trim( str_replace( array(
		'"',
		'&',
		'(',
		')',
		'/',
		'\\',
		'WP',
		'|',
		'®',
		'*'
	), '', html_entity_decode( $name ) ), ' -–' );

	// Retrieve word parts
	$parts = preg_split( "/[-– ]/", $name ); // Jetpack | by | WordPress.com

	/**
	 * First attempt
	 * Result: Jb
	 */
	foreach ( $parts as $part ) {
		// First letter of every part
		$letters[] = substr( $part, 0, 1 );

		// If only 1 part, get 2nd letter
		if ( 1 === count( $parts ) ) {
			$letters[] = substr( $part, 1, 1 );
		}
	}
	// Put element name together
	$element = ucfirst( strtolower( $letters[0] . $letters[1] ) );

	// If already used, try most simple: "J"
	if ( isset( $elements[ $element ] ) ) {
		$element = ucfirst( strtolower( $letters[0] ) );
	}

	/**
	 * If Jb is already used, try:
	 * - Jt
	 * - Jp
	 * - Jb
	 * - Jy
	 */
	$x    = 1;
	$part = 0;
	while ( isset( $elements[ $element ] ) && isset( $parts[ $part ] ) ) {
		if ( strlen( $parts[ $part ] ) == $x ) {
			$x = 0;
			$part ++;
		}
		$element = ucfirst( strtolower( $letters[0] . substr( $parts[ $part ], $x, 1 ) ) );
		$x ++;
	}


	/**
	 * Reserved names
	 */
	switch ( $name ) {
		case 'Twenty Ten':
			$element = 'Te';
			break;
		case 'Twenty Eleven':
			$element = 'El';
			break;
		case 'Twenty Twelve':
			$element = 'Tw';
			break;
		case 'Twenty Thirteen':
			$element = 'Th';
			break;
		case 'Twenty Fourteen':
			$element = 'Fo';
			break;
		case 'Twenty Fifteen':
			$element = 'Fi';
			break;
		case 'Tempera':
			$element = 'Tm';
			break;
		case 'Tracks':
			$element = 'Tk';
			break;
		case 'The7':
			$element = 'T';
			break;
		case 'iFeature':
			$element = 'Fe';
			break;
		case 'iRibbon':
			$element = 'Rib';
			break;
		case 'Custom Community':
			$element = 'Cus';
			break;
		case 'Portfolio Press':
			$element = 'Pr';
			break;
		case 'Point':
			$element = 'Pn';
			break;
		case 'Simple Catch':
			$element = 'Si';
			break;
		case 'Dusk To Dawn':
			$element = 'Dk';
			break;
		case 'Next Saturday':
			$element = 'Ne';
			break;
		case 'MH Magazine lite':
			$element = 'Ml';
			break;
		case 'MH Purity lite':
			$element = 'Pu';
			break;
		case 'Zerif Lite':
			$element = 'Zi';
			break;
	}

	// Slug definitely already in use
	if ( isset( $elements[ $element ] ) ) {
		$element = 'XX' . $element;
	}

	$elements[ $element ] = $name;

	return $element;
}

function get_theme_name( $name, $words = 3, $short = false ) {
	if ( true === $short ) {
		switch ( $name ) {
			case 'Avada | Responsive Multi-Purpose Theme':
				return 'Avada';
				break;
			case 'The7 — Responsive Multi-Purpose WordPress Theme':
				return 'The7';
				break;
			case 'Flat Responsive WooCommerce Theme':
				return 'Flat';
				break;
			case 'WPLMS Learning Management System':
				return 'WPLMS';
				break;
			case 'X | The Theme':
				return 'X Theme';
				break;
			case 'GeneratePress':
				return 'Generate&shy;Press';
				break;
			case 'SKT Full Width':
				return 'Full Width';
				break;
		}
	}

	$name = trim( $name );

	$pos = strpos( $name, ' - ' );
	if ( $pos !== false && $pos !== 0 ) {
		$name = substr( $name, 0, $pos );
	}
	$pos2 = strpos( $name, ' – ' );
	if ( $pos2 !== false && $pos2 !== 0 ) {
		$name = substr( $name, 0, $pos2 );
	}

	$array = explode( ' ', $name );

	$array = array_chunk( $array, $words );

	if ( empty( $array[1] ) ) {
		return $name;
	}


	return rtrim( implode( ' ', $array[0] ), ',;()-–' );
}

function get_theme_url( $theme ) {
	$theme = (object) $theme;

	if ( isset( $theme->url ) ) {
		return $theme->url . '?ref=swissspidy';
	} else {
		return 'https://wordpress.org/themes/' . $theme->slug;
	}
}

function get_theme_additional_info( $theme ) {
	$theme = (object) $theme;

	if ( isset( $theme->commercial ) ) {
		return 'Commercial Theme on ThemeForest';
	} else {
		return sprintf( 'Version: %s', $theme->version );
	}
}
