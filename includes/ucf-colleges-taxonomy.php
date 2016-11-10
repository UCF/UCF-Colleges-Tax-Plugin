<?php
/**
 * Handles the registration of the colleges custom taxonomy.
 * @author Jim Barnes
 * @since 0.0.1
 **/

if ( ! class_exists( 'UCF_College_Taxonomy' ) ) {
	class UCF_College_Taxonomy {
		public static function register_colleges() {
			register_taxonomy( 'colleges', array(), self::args() );
		}

		public static function labels() {
			return array(
				'name'                       => _x( 'Colleges', 'Taxonomy General Name', 'ucf_colleges' ),
				'singular_name'              => _x( 'College', 'Taxonomy Singular Name', 'ucf_colleges' ),
				'menu_name'                  => __( 'Colleges', 'ucf_colleges' ),
				'all_items'                  => __( 'All Colleges', 'ucf_colleges' ),
				'parent_item'                => __( 'Parent College', 'ucf_colleges' ),
				'parent_item_colon'          => __( 'Parent College:', 'ucf_colleges' ),
				'new_item_name'              => __( 'New College Name', 'ucf_colleges' ),
				'add_new_item'               => __( 'Add New College', 'ucf_colleges' ),
				'edit_item'                  => __( 'Edit College', 'ucf_colleges' ),
				'update_item'                => __( 'Update College', 'ucf_colleges' ),
				'view_item'                  => __( 'View College', 'ucf_colleges' ),
				'separate_items_with_commas' => __( 'Separate colleges with commas', 'ucf_colleges' ),
				'add_or_remove_items'        => __( 'Add or remove colleges', 'ucf_colleges' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_colleges' ),
				'popular_items'              => __( 'Popular Colleges', 'ucf_colleges' ),
				'search_items'               => __( 'Search Colleges', 'ucf_colleges' ),
				'not_found'                  => __( 'Not Found', 'ucf_colleges' ),
				'no_terms'                   => __( 'No colleges', 'ucf_colleges' ),
				'items_list'                 => __( 'Colleges list', 'ucf_colleges' ),
				'items_list_navigation'      => __( 'Colleges list navigation', 'ucf_colleges' ),
			);
		}

		public static function args() {
			return array(
				'labels'                     => self::labels(),
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			);
		}
	}
}

?>
