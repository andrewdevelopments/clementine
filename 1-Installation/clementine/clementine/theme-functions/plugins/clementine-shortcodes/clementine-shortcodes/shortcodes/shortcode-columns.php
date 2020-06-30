<?php

#-------------------------------------------------#
# This file contains code for Columns Shortcode   #
#-------------------------------------------------#

add_shortcode( 'column', 'shortcode_columns' );

function shortcode_columns( $atts, $content ) {

	extract(
		shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		)
	);

	$html = '<div class="c-'. $class .'"><p>'. trim(do_shortcode(shortcode_unautop($content))) .'</p></div>';

	return $html;

}