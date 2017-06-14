<?php
/*
Plugin Name: UCF College Custom Taxonomy
Description: Provides a college taxonomy and related meta fields.
Version: 1.0.0
Author: UCF Web Communications
License: GPL3
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'plugins_loaded', function() {
	define( 'UCF_COLLEGES__PLUGIN_URL', plugins_url( basename( dirname( __FILE__ ) ) ) );
	define( 'UCF_COLLEGES__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

	include_once 'includes/ucf-colleges-taxonomy.php';
	include_once 'includes/ucf-colleges-api.php';

	add_action( 'init', array( 'UCF_College_Taxonomy', 'register_colleges' ), 10, 0 );
	add_action( 'rest_api_init', array( 'UCF_College_API', 'register_rest_routes' ), 10, 0 );
} );

?>
