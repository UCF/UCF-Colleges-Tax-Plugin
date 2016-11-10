<?php
/*
Plugin Name: UCF College Custom Taxonomy
Description: Provides a college taxonomy and related meta fields.
Version: 0.0.1
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

	add_action( 'init', array( 'UCF_College_Taxonomy', 'register_colleges' ), 0 );

} );

?>
