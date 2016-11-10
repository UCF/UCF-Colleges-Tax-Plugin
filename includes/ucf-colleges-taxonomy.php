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
			self::register_meta_fields();
		}

		public static function register_meta_fields() {
			add_action( 'colleges_add_form_fields', array( 'UCF_College_Taxonomy', 'add_alias_field' ), 10, 1 );
			add_action( 'colleges_edit_form_fields', array( 'UCF_College_Taxonomy', 'edit_alias_field' ), 10, 2 );
			add_action( 'created_colleges', array( 'UCF_College_Taxonomy', 'save_colleges_meta' ), 10, 2 );
			add_action( 'edited_colleges', array( 'UCF_College_Taxonomy', 'edited_colleges_meta' ), 10, 2 );

			add_filter( 'manage_edit-colleges_columns', array( 'UCF_College_Taxonomy', 'add_alias_column' ) );
			add_filter( 'manage_colleges_custom_column', array( 'UCF_College_Taxonomy', 'add_colleges_alias_column' ), 10, 3 );
			add_filter( 'manage_edit-colleges_sortable_columns', array( 'UCF_College_Taxonomy', 'add_alias_column_sortable' ) );
		}

		public static function add_alias_field( $taxonomy ) {
?>
			<div class="form-field term-group">
				<label for="colleges_alias"><?php _e( 'College Alias', 'ucf_colleges' ); ?></label>
				<input type="text" id="colleges_alias" name="colleges_alias">
			</div>
<?php
		}

		public static function edit_alias_field( $term, $taxonomy ) {
			$alias = get_term_meta( $term->term_id, 'colleges_alias', true );
?>
			<tr class="form-field term-group-wrap">
				<th scope="row"><label for="colleges_alias"><?php _e( 'College Alias', 'ucf_colleges' ); ?></label></th>
				<td><input type="text" id="colleges_alias" name="colleges_alias" value="<?php echo $alias; ?>">
			</tr>
<?php
		}

		public static function save_colleges_meta( $term_id, $tt_id ) {
			if ( isset( $_POST['colleges_alias'] ) && '' !== $_POST['colleges_alias'] ) {
				$alias = $_POST['colleges_alias'];
				add_term_meta( $term_id, 'colleges_alias', $alias, true );
			}
		}

		public static function edited_colleges_meta( $term_id, $tt_id ) {
			if ( isset( $_POST['colleges_alias'] ) && '' !== $_POST['colleges_alias'] ) {
				$alias = $_POST['colleges_alias'];
				update_term_meta( $term_id, 'colleges_alias', $alias );
			}
		}

		public static function add_alias_column( $columns ) {
			$columns['colleges_alias'] = __( 'Alias', 'ucf_colleges' );
			return $columns;
		}

		public static function add_colleges_alias_column( $content, $column_name, $term_id ) {
			if ( $column_name !== 'colleges_alias' ) {
				return $content;
			}

			$term_id = absint( $term_id );
			$alias = get_term_meta( $term_id, 'colleges_alias', true );

			if ( ! empty( $alias ) ) {
				$content .= esc_attr( $alias );
			}

			return $content;
		}

		public static function add_alias_column_sortable( $sortable ) {
			$sortable[ 'colleges_alias' ] = 'colleges_alias';
			return $sortable;
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
