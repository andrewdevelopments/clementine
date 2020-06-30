<?php
/**
* Plugin Name: Clementine Shortcodes
* Description: Shortcodes for Clementine - Wordpress Blog Theme
* Version: 1.0
* Author: andrewdevelopments
* Author URI: http://themeforest.net/user/andrewdevelopments
*/

class Clementine_Shortcodes {

	public function __construct() {

		// Shortcodes
		require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/shortcode-button.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/shortcode-columns.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/shortcode-row.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/shortcode-socialmedia.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'shortcodes/shortcode-dropcap.php' );

		// Load some styles for our button
		add_action( 'init', array($this, 'shortcode_init') );
		
		add_action( 'admin_enqueue_scripts', array($this, 'shortcode_button_style') );

	}

	public function shortcode_button_style() {
		wp_enqueue_style( 'fasc-buttons-style', plugins_url( 'button-style.css' , __FILE__ ), array(), '1.0' );
	}

	public function tiny_mce( $plugin_array ) {
		$plugin_array['clementine'] = plugins_url( 'shortcodes.js', __FILE__ );
		return $plugin_array;
	}

	public function register_button( $buttons ) {
	    array_push( $buttons, 'clementine' );
	    return $buttons;
	}

	public function shortcode_init() {

		// check user permissions
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) :
			return;
		endif;

		// check if is admin @
		if ( is_admin() ) :
			add_filter( 'mce_external_plugins', array($this, 'tiny_mce') );
			add_filter( 'mce_buttons', array($this, 'register_button') );
		endif;

	}

}

if ( class_exists( 'Clementine_Shortcodes' ) ) :
	new Clementine_Shortcodes();
endif;
?>