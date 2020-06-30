<?php

class views {

	public static function set( $ID ) {

		$key = 'post_views_count';
	    $count = get_post_meta( $ID, $key, true );

	    if( $count == '' ) :
	    	$count = 0;
	    	delete_post_meta( $ID, $key );
	        add_post_meta( $ID, $key, '0' );
		else :
			$count++;
			update_post_meta( $ID, $key, $count );
	    endif;

	}

	public static function get( $ID ) {

		$key = 'post_views_count';
	    $count = get_post_meta( $ID, $key, true );

	    if( $count == '' ) :
	    	delete_post_meta( $ID, $key );
	        add_post_meta( $ID, $key, '0' );
	        return '0';
	    endif;

	    return $count;

	}

}