<?php



#

# Remove version(?ver) from static files

#



add_action( 'init', 'clementine_cleaner', 5 );

function clementine_cleaner() {



	if( _clementine_get_option_('adD_remove_static_parameters') )	:

		add_filter( 'the_generator', 'clementine_remove_version_info' );

		add_filter( 'script_loader_src', 'clementine_remove_version', 15, 1 );

		add_filter( 'style_loader_src', 'clementine_remove_version', 15, 1 );

	endif;



}



function clementine_remove_version_info() {

	return '';

}



function clementine_remove_version( $src ) {

	

	$parts = parse_url( $src );

	$url = '';



	if (!empty($parts['scheme'])) :

		$url .= $parts['scheme'] . '://';

	endif;



	if ( !empty($parts['host']) ) :

		$url .= $parts['host'];

	endif;



	if ( !empty($parts['path']) ) :

		$url .= $parts['path'];

	endif;



	if ( !empty($parts['query']) ) :

		$params = array();

		parse_str( $parts['query'], $params );



		if ( isset( $params['ver'] ) ) :

			unset( $params['ver'] );

		endif;



		$queryString = http_build_query( $params );



		if ( ! empty( $queryString ) ) :

			$url .= '?' . $queryString;

		endif;

	endif;



	return $url;

}