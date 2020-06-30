<?php

#-------------------------------------------------#
# This file contains code for Row Shortcode   #
#-------------------------------------------------#

add_shortcode( 'row', 'shortcode_row' );

function shortcode_row( $atts, $content = null ) {

	$html = '<div class="row">'. trim(do_shortcode(shortcode_unautop($content))) .'</div>';

	return $html;

}