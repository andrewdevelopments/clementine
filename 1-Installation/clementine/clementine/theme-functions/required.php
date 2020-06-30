<?php



// No direct access

if ( !defined('ABSPATH') ) exit;



require_once( trailingslashit( get_template_directory() ) . '/theme-functions/theme-constants.php' );



if( !class_exists('ReduxFramework' ) && file_exists( THEME_DIR . '/theme-functions/core/framework.php' ) ) {

	require_once( trailingslashit( THEME_DIR ) . '/theme-functions/core/framework.php' );

}



if( !isset( $redux_demo ) && file_exists( THEME_DIR . '/theme-functions/theme-options.php' ) ) {

	require_once( trailingslashit( THEME_DIR ) . '/theme-functions/theme-options.php' );

}



require_once( trailingslashit( THEME_DIR ) . '/theme-functions/theme-functions.php' );



require_once( trailingslashit( THEME_DIR ) . '/theme-functions/views.php' );



require_once( trailingslashit( THEME_DIR ) . '/theme-functions/inc/class-tgm-plugin-activation.php' );



// Cleaner

require_once( trailingslashit( THEME_DIR ) . '/theme-functions/cleaner.php' );



// Meta Box

require_once( trailingslashit( THEME_DIR ) . '/theme-functions/meta.php' );



// Widgets

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/about.php' );

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/social-icons.php' );

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/facebook.php' );

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/latest-posts.php' );

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/popular-stories.php' );

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/banner.php' );

require_once( trailingslashit( THEME_DIR ) . '/theme-partials/widgets/category-banner.php' );



add_action( 'widgets_init', 'clementine_widgets_load' );

function clementine_widgets_load() {

	register_widget( 'clementine_about_wdg' );

	register_widget( 'clementine_banner_wdg' );

	register_widget( 'clementine_facebook_wdg' );

	register_widget( 'clementine_ps_wdg' );

	register_widget( 'clementine_lp_wdg' );

	register_widget( 'clementine_si_wdg' );

	register_widget( 'clementine_cb_wdg' );

}



// Likes

require_once( THEME_DIR . '/theme-functions/likes.php' );