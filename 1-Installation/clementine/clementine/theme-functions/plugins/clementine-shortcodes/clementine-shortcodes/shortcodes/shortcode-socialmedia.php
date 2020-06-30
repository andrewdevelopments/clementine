<?php

#------------------------------------------------------#
# This file contains code for Social Media Shortcode   #
#------------------------------------------------------#

add_shortcode( 'socialmedia', 'shortcode_socialmedia' );

function shortcode_socialmedia( $atts ) {

	global $clementine_options;

	extract(
		shortcode_atts(
			array(
				'facebook' => '',
				'twitter' => '',
				'google' => '',
				'instagram' => '',
				'behance' => '',
				'dribbble' => '',
				'linkedin' => '',
				'flickr' => '',
				'vimeo' => '',
				'soundcloud' => '',
				'deviantart' => '',
				'pinterest' => '',
				'youtube' => '',
				'rss' => '',
				'tumblr' => ''
			),
			$atts
		)
	);

	$html = '<div class="social-media large">';

		if( $clementine_options['adD_facebook'] ) :
			$html .= '<a href="'. $clementine_options['adD_facebook'] .'"><i class="fa fa-facebook"></i></a>';
		endif;

		if( $clementine_options['adD_twitter'] ) :
			$html .= '<a href="'. $clementine_options['adD_twitter'] .'"><i class="fa fa-twitter"></i></a>';
		endif;

		if( $clementine_options['adD_google'] ) :
			$html .= '<a href="'. $clementine_options['adD_google'] .'"><i class="fa fa-google-plus"></i></a>';
		endif;

		if( $clementine_options['adD_instagram'] ) :
			$html .= '<a href="'. $clementine_options['adD_instagram'] .'"><i class="fa fa-instagram"></i></a>';
		endif;

		if( $clementine_options['adD_behance'] ) :
			$html .= '<a href="'. $clementine_options['adD_behance'] .'"><i class="fa fa-behance"></i></a>';
		endif;

		if( $clementine_options['adD_dribbble'] ) :
			$html .= '<a href="'. $clementine_options['adD_dribbble'] .'"><i class="fa fa-dribbble"></i></a>';
		endif;

		if( $clementine_options['adD_linkedin'] ) :
			$html .= '<a href="'. $clementine_options['adD_linkedin'] .'"><i class="fa fa-linkedin"></i></a>';
		endif;

		if( $clementine_options['adD_flickr'] ) :
			$html .= '<a href="'. $clementine_options['adD_flickr'] .'"><i class="fa fa-flickr"></i></a>';
		endif;

		if( $clementine_options['adD_vimeo'] ) :
			$html .= '<a href="'. $clementine_options['adD_vimeo'] .'"><i class="fa fa-vimeo"></i></a>';
		endif;

		if( $clementine_options['adD_soundcloud'] ) :
			$html .= '<a href="'. $clementine_options['adD_soundcloud'] .'"><i class="fa fa-soundcloud"></i></a>';
		endif;

		if( $clementine_options['adD_deviantart'] ) :
			$html .= '<a href="'. $clementine_options['adD_deviantart'] .'"><i class="fa fa-deviantart"></i></a>';
		endif;

		if( $clementine_options['adD_pinterest'] ) :
			$html .= '<a href="'. $clementine_options['adD_pinterest'] .'"><i class="fa fa-pinterest-p"></i></a>';
		endif;

		if( $clementine_options['adD_youtube'] ) :
			$html .= '<a href="'. $clementine_options['adD_youtube'] .'"><i class="fa fa-youtube"></i></a>';
		endif;

		if( $clementine_options['adD_rss'] ) :
			$html .= '<a href="'. $clementine_options['adD_rss'] .'"><i class="fa fa-rss"></i></a>';
		endif;

		if( $clementine_options['adD_tumblr'] ) :
			$html .= '<a href="'. $clementine_options['adD_tumblr'] .'"><i class="fa fa-tumblr"></i></a>';
		endif;

	$html .= '</div>';

	return $html;

}