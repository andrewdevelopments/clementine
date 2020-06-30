<?php

#------------------------------------------------------#
# This file contains code for Dropcap Shortcode        #
#------------------------------------------------------#

add_shortcode( 'dropcap', 'shortcode_dropcap' );

function shortcode_dropcap( $atts, $content ) {

	$html = '<span class="dropcap">'. $content .'</span>';

	return $html;

}