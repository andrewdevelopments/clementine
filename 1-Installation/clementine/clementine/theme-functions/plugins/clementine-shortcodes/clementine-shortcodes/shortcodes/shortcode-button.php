<?php

#-------------------------------------------------#
# This file contains code for Button Shortcode    #
#-------------------------------------------------#

add_shortcode( 'button', 'shortcode_button' );

function shortcode_button( $atts, $content ) {

	extract(
		shortcode_atts(
			array(
				'class' => '',
				'target' => '',
			),
			$atts
		)
	);

	$html = '<a href="'. $target .'" class="btn button '. $class .'">'. $content .'</a>';

	return $html;

}